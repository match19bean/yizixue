<?php

namespace App\Admin\Controllers;

use App\AdColumn;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AdController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AdColumn';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AdColumn());
        $grid->column('ad_description', __('Ad_description'));
        $grid->column('button_text', __('Button_text'));
        $grid->column('button_url', __('Button_url'));
        $grid->column('image_path', __('Ad_image'));

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
        $show = new Show(AdColumn::findOrFail($id));
        $show->field('ad_description', __('Ad_description'));
        $show->field('button_text', __('Button_text'));
        $show->field('button_url', __('Button_url'));
        $show->field('image_path', __('Image_path'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AdColumn());
        $form->text('ad_description', __('Ad_description'));
        $form->text('button_text', __('Button_text'));
        $form->text('button_url', __('Button_url'));
        $form->image('image_path', __('Ad_image'));

        return $form;
    }
}
