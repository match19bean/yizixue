<?php

namespace App\Admin\Controllers;

use App\Post;
use App\User;
use App\GeneralCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        $grid->column('id', __('Id'));
        $grid->column('uuid', __('Uuid'));
        $grid->column('title', __('Title'));
        $grid->column('uid', __('Uid'))->display(function($uid) {
            $user = User::where('id', $uid)->first();
            return $user->name;
        });
        $grid->column('image_path', __('Image path'))->display(function($image_path){
            return '<img src="'.env('APP_URL').'/uploads/'.$image_path.'" style="width:auto;height:auto;max-width:100%;max-height:100%;">';
        });
        $grid->column('body', __('Body'));
        $grid->column('category', __('Category'));
        $grid->column('tag', __('Tag'));
        $grid->column('state', __('State'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uuid', __('Uuid'));
        $show->field('title', __('Title'));
        $show->field('uid', __('Uid'));
        $show->field('image_path', __('Image path'));
        $show->field('body', __('Body'));
        $show->field('category', __('Category'));
        $show->field('tag', __('Tag'));
        $show->field('state', __('State'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());

        $_users = User::all();
        $_usersMap = array();
        foreach($_users as $item)
        {
            $_usersMap[$item->id] = $item->name . "(". $item->id .")";
        }

        $_categories = GeneralCategory::all();
        $_categoriesMap = array();
        foreach($_categories as $item)
        {
            $_categoriesMap[$item->id] = $item->name . "(". $item->slug .")";
        }

        $form->text('uuid', __('Uuid'))->default('post-'.uniqid());
        $form->text('title', __('Title'));
        $form->select('uid', __('Uid'))->options($_usersMap);
        $form->image('image_path', __('Image path'));
        $form->textarea('body', __('Body'));
        $form->select('category', __('Category'))->options($_categoriesMap);
        $form->text('tag', __('Tag'));
        $form->select('state', __('State'))->options([
            'approve'=>'已通過驗證',
            'banned'=>'未通過驗證',
            'pending'=>'尚未驗證',
        ])->default('pending');
        return $form;
    }
}
