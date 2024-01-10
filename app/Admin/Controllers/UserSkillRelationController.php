<?php

namespace App\Admin\Controllers;

use App\UserSkillRelation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserSkillRelationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserSkillRelation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserSkillRelation());

        $grid->column('id', __('Id'));
        $grid->column('skill_id', __('Skill id'));
        $grid->column('user_id', __('User id'));
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
        $show = new Show(UserSkillRelation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('skill_id', __('Skill id'));
        $show->field('user_id', __('User id'));
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
        $form = new Form(new UserSkillRelation());

        $form->text('skill_id', __('Skill id'));
        $form->text('user_id', __('User id'));

        return $form;
    }
}
