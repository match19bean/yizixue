<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('posts', PostController::class);
    $router->resource('collect-posts', CollectPostController::class);
    $router->resource('users', UserController::class);
    $router->resource('post-categories', PostCategoryController::class);
    $router->resource('post-tags', PostTagController::class);
    $router->resource('bulletin-boards', BulletinBoardController::class);
    $router->resource('qn-as', QnAController::class);
});
