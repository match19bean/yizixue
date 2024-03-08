<?php

namespace App\Admin\Controllers;

use App\PayProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PayProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PayProduct';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PayProduct());

        $grid->column('id', __('Id'));
        $grid->column('name', __('付費加值名稱'));
        $grid->column('description', __('付費加值說明'));
        $grid->column('pay_time', __('付費加值單位(月)'));
        $grid->column('price', __('付費加值金額'));
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
        $show = new Show(PayProduct::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('付費加值名稱'));
        $show->field('description', __('付費加值說明'));
        $show->field('pay_time', __('付費加值單位(月)'));
        $show->field('price', __('付費加值金額'));
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
        $form = new Form(new PayProduct());

        $form->text('name', __('付費加值名稱'));
        $form->text('description', __('付費加值說明'));
        $form->number('pay_time', __('付費加值單位(月)'));
        $form->number('price', __('付費加值金額'));

        return $form;
    }
}
