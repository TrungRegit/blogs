@extends('layouts.master')

@section('title', __('message.title_management_blog'))

@section('content')

@section('class', 'header-static')

@php
    use App\Models\Blog;
@endphp

<div id="data" like-route="{{ route('api.like') }}" comment-create-route="{{ route('api.comment.store') }}"
    comment-update-route="{{ route('api.comment.update') }}" comment-destroy-route="{{ route('api.comment.destroy') }}"
    comment-index-route="{{ route('api.comment.index', ['blogId' => $blog->id]) }}" blog-id={{ $blog->id }}
    login-route="{{ route('auth.sign-in') }}" reply-index-route="{{ route('api.comment.reply') }}">
</div>

<div class="page-approve-blog">
    <div class='breadcrumb'>
        <a href="{{ route('index') }}">{{ __('message.home') }} &nbsp;>&nbsp; </a>
        <span>{{ __('message.detail') }}</span>
    </div>
    <div class="content">
        <h3>{{ $blog->title }}</h3>
        <div class="author-action">
            <div class="author">
                <img class="author-image" src="{{ $blog->author->link_avatar }}" alt="{{ $blog->author->username }}">
                <div class="detail">
                    <span class="author-name">{{ $blog->author->username }}</span>
                    <span class="create-at">{{ $blog->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
            <div class="action">
                <form action="{{ route('admin.blog.change-status', ['id' => $blog->id]) }}" method="post"
                    class="d-none" id="changeStatus">
                    @csrf
                    @method('PUT')
                </form>
                <button class="btn {{ $blog->status == Blog::STATUS_PENDING ? 'btn-approved' : 'btn-not-approved' }}"
                    onclick="document.getElementById('changeStatus').submit();">
                    {{ $blog->status == Blog::STATUS_PENDING ? __('message.approved') : __('message.not_approved') }}
                </button>
                <button class="btn-warning"
                    onclick="window.location.href='{{ route('admin.blog.edit', ['id' => $blog->id]) }}'">
                    {{ __('message.update_blog') }}
                </button>
                <button class="btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    {{ __('message.delete_blog') }}
                </button>
            </div>
        </div>
        @if ($blog->link_image)
            <img class="blog-image" src="{{ $blog->link_image }}" alt="{{ $blog->author->username }}">
        @endif

        <div class="blog-content">

            {!! nl2br($blog->content) !!}

            <div class="like-comment mt-4">
                @if ($user)
                    <div id="like"
                        class="{{ $user->likes()->where('blog_id', $blog->id)->exists()? 'liked': 'unliked' }}"></div>
                @else
                    <div id="like" class="unliked"></div>
                @endif
                <span id="totalLike">{{ $blog->likes()->count() }}</span>
                <img src="{{ Vite::asset('resources/images/comment.png') }}" />
                <span id="totalComment">{{ $blog->comments()->count() }}</span>
            </div>
        </div>

        @if ($blog->comments->count())
            <div class='title d-flex justify-content-center'>
                <div>
                    <div>
                        <h6>{{ __('message.comment') }}</h6>
                    </div>
                    <div class="d-flex justify-content-center">
                        <hr>
                    </div>
                </div>
            </div>
        @endif

        <div class="comment" id="commentAjax">

            <div class="my-comment">
                <img class="author-picture" src="{{ $user->link_avatar }}" alt="{{ $user->username }}">
                <form method="post" id="store" class="d-flex">
                    <input type="text" id="comment" required>
                    <div>
                        <button type="submit" class="d-none" id="createComment"></button>
                        <label for="createComment">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-send" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                            </svg>
                        </label>
                    </div>
                </form>
            </div>

            <div class="list-comment" id="comments">
            </div>

        </div>

    </div>

</div>

@include ('layouts.modal')

@include('layouts.footer')

@endsection
