<?php

namespace App\Admin\Controllers;

use App\AboutUsCarousel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AboutUsCarouselController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AboutUsCarousel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AboutUsCarousel());

        $grid->column('id', __('Id'));
        $grid->column('image_path', __('Image path'))->image();
        $grid->column('is_active', __('Is active'));
        $grid->column('sort', __('Sort'));
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
        $show = new Show(AboutUsCarousel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image_path', __('Image path'));
        $show->field('is_active', __('Is active'));
        $show->field('sort', __('Sort'));
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
        $form = new Form(new AboutUsCarousel());

        $form->image('image_path', __('Image path'));
        $form->switch('is_active', __('Is active'));
        $form->number('sort', __('Sort'));

        return $form;
    }
}
