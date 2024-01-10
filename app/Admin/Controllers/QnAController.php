<?php

namespace App\Admin\Controllers;

use App\QnA;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QnAController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'QnA';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new QnA());

        $grid->column('id', __('Id'));
        $grid->column('uuid', __('Uuid'));
        $grid->column('uid', __('Uid'));
        $grid->column('nickname', __('Nickname'));
        $grid->column('title', __('Title'));
        $grid->column('body', __('Body'));
        $grid->column('state', __('State'));
        $grid->column('contact_time', __('Contact time'));
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
        $show = new Show(QnA::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uuid', __('Uuid'));
        $show->field('uid', __('Uid'));
        $show->field('nickname', __('Nickname'));
        $show->field('title', __('Title'));
        $show->field('body', __('Body'));
        $show->field('state', __('State'));
        $show->field('contact_time', __('Contact time'));
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
        $form = new Form(new QnA());

        $form->text('uuid', __('Uuid'));
        $form->text('uid', __('Uid'));
        $form->text('nickname', __('Nickname'));
        $form->text('title', __('Title'));
        $form->textarea('body', __('Body'));
        $form->text('state', __('State'))->default('approve');
        $form->text('contact_time', __('Contact time'));

        return $form;
    }
}
