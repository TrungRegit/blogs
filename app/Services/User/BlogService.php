<?php

namespace App\Services\User;

use App\Models\Blog;
use Exception;
use Faker\Core\Blood;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogService
{

    public function createBlog(array $blog, bool $hasFile): RedirectResponse
    {
        try {
            $user = Auth::user();

            $blog = [
                ...$blog,
                'user_id' => $user->id,
                'status' => Blog::STATUS_PENDING,
                'link_image' => null,
            ];

            if ($hasFile) {
                $file = $blog['image'];
                $fileName = time() . '.' . $file->extension();
                $imagePath = $file->storeAs('public/images', $fileName);
                $linkImage = Storage::url($imagePath);
                $blog['link_image']  = $linkImage;
            }

            Blog::create($blog);

            return back()->with('notification', trans('message.create_blog_success'));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
}
