<?php

namespace App\Providers;

use App\Services\Common\CategoryService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Services\Mail\MailService;
use App\Services\User\BlogService as BlogUserService;
use App\Services\Admin\BlogService as BlogAdminService;
use App\Services\Common\BlogService as BlogCommonService;
use App\Services\Common\CommentService;
use App\Services\Common\ImageService;
use App\Services\Common\LikeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!app()->isProduction());

        $this->app->bind(
            UserService::class,
            function ($app) {
                return new UserService();
            }
        );

        $this->app->bind(
            MailService::class,
            function ($app) {
                return new MailService();
            }
        );

        $this->app->bind(
            CategoryService::class,
            function ($app) {
                return new CategoryService();
            }
        );

        $this->app->bind(
            BlogUserService::class,
            function ($app) {
                return new BlogUserService(new ImageService());
            }
        );

        $this->app->bind(
            BlogAdminService::class,
            function ($app) {
                return new BlogAdminService(new ImageService());
            }
        );

        $this->app->bind(
            BlogCommonService::class,
            function ($app) {
                return new BlogCommonService(new ImageService());
            }
        );

        $this->app->bind(
            LikeService::class,
            function ($app) {
                return new LikeService();
            }
        );

        $this->app->bind(
            CommentService::class,
            function ($app) {
                return new CommentService();
            }
        );
    }
}
