<?php

namespace App\Admin\Controllers;

use App\Invite;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InviteController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Invite';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Invite());

        $grid->column('id', __('Id'));
        $grid->column('from_uid', __('From uid'));
        $grid->column('to_uid', __('To uid'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Invite::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('from_uid', __('From uid'));
        $show->field('to_uid', __('To uid'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Invite());

        $form->text('from_uid', __('From uid'));
        $form->text('to_uid', __('To uid'));
        $form->text('status', __('Status'));

        return $form;
    }
}
