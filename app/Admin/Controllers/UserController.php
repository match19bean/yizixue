<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('uuid', __('Uuid'));
        $grid->column('name', __('Name'));
        $grid->column('nickname', __('Nickname'));
        $grid->column('role', __('Role'));
        $grid->column('student_proof', __('Student proof'));
        $grid->column('school_id', __('School id'));
        $grid->column('avatar', __('Avatar'));
        $grid->column('birth_day', __('Birth day'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('line', __('Line'));
        $grid->column('address', __('Address'));
        $grid->column('password', __('Password'));
        $grid->column('description', __('Description'));
        $grid->column('skill_tags', __('Skill tags'));
        $grid->column('rate', __('Rate'));
        $grid->column('ispaied', __('Ispaied'));
        $grid->column('expired', __('Expired'));
        $grid->column('state', __('State'));
        $grid->column('remember_token', __('Remember token'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uuid', __('Uuid'));
        $show->field('name', __('Name'));
        $show->field('nickname', __('Nickname'));
        $show->field('role', __('Role'));
        $show->field('student_proof', __('Student proof'));
        $show->field('school_id', __('School id'));
        $show->field('avatar', __('Avatar'));
        $show->field('birth_day', __('Birth day'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('line', __('Line'));
        $show->field('address', __('Address'));
        $show->field('password', __('Password'));
        $show->field('description', __('Description'));
        $show->field('skill_tags', __('Skill tags'));
        $show->field('rate', __('Rate'));
        $show->field('ispaied', __('Ispaied'));
        $show->field('expired', __('Expired'));
        $show->field('state', __('State'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User());

        $form->text('uuid', __('Uuid'))->default('usr-'.uniqid());
        $form->text('name', '名字');
        $form->text('nickname', '綽號');
        $form->select('role', '身分')->options([
            'normal'=>'學弟妹',
            'vip'=>'學長姐',
        ])->default('normal');
        $form->select('student_proof', '學生身驗證')->options([
            'approve'=>'已通過驗證',
            'banned'=>'未通過驗證',
            'pending'=>'尚未驗證',
        ])->default('pending');
        $form->text('school_id', '學校資料');
        $form->image('avatar', '頭像');
        $form->datetime('birth_day', '生日')->default(date('Y-m-d H:i:s'));
        $form->email('email', 'Email');
        $form->mobile('phone', '電話');
        $form->text('line', 'Line');
        $form->text('address', '聯絡地址');
        $form->password('password', '密碼');
        $form->textarea('description', '簡介');
        $form->text('skill_tags', '專長標籤');
        $form->number('rate', '評價')->default(3);
        $form->switch('ispaied', '是否到期');
        $form->datetime('expired', '到期日')->default(date('Y-m-d H:i:s'));
        $form->select('state', '狀態')->options([
            'approve'=>'已開通',
            'banned'=>'未開通',
            'pending'=>'審核中',
        ])->default('approve');
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
