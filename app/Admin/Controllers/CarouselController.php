<?php

namespace App\Admin\Controllers;

use App\Carousel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CarouselController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Carousel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Carousel());

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
        $show = new Show(Carousel::findOrFail($id));

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
        $form = new Form(new Carousel());

        $form->image('image_path', __('Image path'))->removable();
        $form->text('description1', __('Carousels Descripition1'))->rules('nullable|max:10');
        $form->text('description2', __('Carousels Descripition2'))->rules('nullable|max:10');
        $form->switch('is_active', __('Is active'));
        $form->number('sort', __('Sort'));

        return $form;
    }
}
