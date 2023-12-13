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

    $router->resource('users', UserController::class);
    $router->resource('skills', SkillController::class);
    $router->resource('posts', PostController::class);
    $router->resource('collect-posts', CollectPostController::class);
    $router->resource('post-categories', PostCategoryController::class);
    $router->resource('post-category-relations', PostCategoryRelationController::class);
    $router->resource('q-a-categories', QACategoryController::class);
    $router->resource('q-a-category-relations', QACategoryRelationController::class);
    
    $router->resource('bulletin-boards', BulletinBoardController::class);
    $router->resource('qn-as', QnAController::class);
});
