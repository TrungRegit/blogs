<div class="content">
    <div class="row">
        @if (count($blogs) == 0)
            <h1 class='text-success'>{{ __('message.empty_list') }}</h1>
        @endif
        @foreach ($blogs as $blog)
            <div class="col-md-12 col-lg-4 col-sm-12 col-sx-12">
                <a href="{{ route('blog.show', ['id' => $blog->id]) }}">
                    <div class="blog">
                        @if ($blog->link_image)
                            <img src={{ $blog->link_image }} class="card-img-top" alt="Image blog">
                        @endif
                        <div class="card-body">
                            <div class="name-and-time">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.8445 21.1569C8.15273 21.1569 5 20.5824 5 18.2817C5 15.9809 8.13273 13.3569 11.8445 13.3569C15.5364 13.3569 18.6891 15.9603 18.6891 18.2611C18.6891 20.5609 15.5564 21.1569 11.8445 21.1569Z"
                                            stroke="#858383" stroke-width="1.7" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.8373 11.1737C14.26 11.1737 16.2236 9.21003 16.2236 6.7873C16.2236 4.36457 14.26 2.40002 11.8373 2.40002C9.41455 2.40002 7.44998 4.36457 7.44998 6.7873C7.44182 9.20184 9.39182 11.1655 11.8064 11.1737C11.8173 11.1737 11.8273 11.1737 11.8373 11.1737Z"
                                            stroke="#858383" stroke-width="1.7" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span class="name">
                                        {{ $blog->author->username }}
                                    </span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M12 22.5C9.9233 22.5 7.89323 21.8842 6.16652 20.7304C4.4398 19.5767 3.09399 17.9368 2.29927 16.0182C1.50455 14.0996 1.29661 11.9884 1.70176 9.95156C2.1069 7.91476 3.10693 6.04383 4.57538 4.57538C6.04383 3.10693 7.91476 2.1069 9.95156 1.70176C11.9884 1.29661 14.0996 1.50455 16.0182 2.29927C17.9368 3.09399 19.5767 4.4398 20.7304 6.16652C21.8842 7.89323 22.5 9.9233 22.5 12C22.5 14.7848 21.3938 17.4555 19.4246 19.4246C17.4555 21.3938 14.7848 22.5 12 22.5ZM12 3C10.22 3 8.47992 3.52785 6.99987 4.51678C5.51983 5.50571 4.36628 6.91132 3.68509 8.55585C3.0039 10.2004 2.82567 12.01 3.17294 13.7558C3.5202 15.5016 4.37737 17.1053 5.63604 18.364C6.89472 19.6226 8.49836 20.4798 10.2442 20.8271C11.99 21.1743 13.7996 20.9961 15.4442 20.3149C17.0887 19.6337 18.4943 18.4802 19.4832 17.0001C20.4722 15.5201 21 13.78 21 12C21 9.61306 20.0518 7.32387 18.364 5.63604C16.6761 3.94822 14.387 3 12 3Z"
                                            fill="#858383" stroke="#858383" stroke-width="0.5" />
                                        <path
                                            d="M15.4425 16.5L11.25 12.3075V5.25H12.75V11.685L16.5 15.4425L15.4425 16.5Z"
                                            fill="#858383" stroke="#858383" stroke-width="0.5" />
                                    </svg>
                                    <span class="time">
                                        {{ $blog->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                            <h5 class="card-title single-line">{{ $blog->title }}</h5>
                            <p class="card-text single-line">{{ $blog->content }}</p>
                            <button class="read-more">{{ __('message.read_more') }} &nbsp;&nbsp;&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10"
                                    viewBox="0 0 20 10" fill="none">
                                    <path d="M19 5H1M19 5L15 9M19 5L15 1" stroke="#C40000" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
