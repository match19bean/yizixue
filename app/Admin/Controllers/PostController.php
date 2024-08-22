<?php

namespace App\Admin\Controllers;

use App\Post;
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
        $grid->column('uid', __('Uid'));
        $grid->column('image_path', __('Image path'));
        $grid->column('body', __('Body'));
        $grid->column('state', __('State'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->model()->orderBy('id', 'desc');

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

        $form->text('uuid', __('Uuid'));
        $form->text('title', __('Title'));
        $form->text('uid', __('Uid'));
        $form->text('image_path', __('Image path'));
        $form->tinymce('body', __('Body'));
        $form->text('state', __('State'))->default('approve');

        return $form;
    }
}
