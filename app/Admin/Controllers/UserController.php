<?php

namespace App\Admin\Controllers;

use App\University;
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

        $grid->column('id', __('Id'))->sortable();
//        $grid->column('uuid', __('Uuid'));
        $grid->column('name', __('Name'))->sortable();
        $grid->column('nickname', __('Nickname'));
        $grid->column('role', __('Role'));
        $grid->column('student_proof', __('Student proof'));
        $grid->column('avatar', __('Avatar'))->image();
        $grid->column('birth_day', __('Birth day'));
        $grid->column('universityItem.name', __('University'));
        $grid->column('is_study', __('Is Study'))->bool();
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('line', __('Line'));
        $grid->column('address', __('Address'));
//        $grid->column('profile_video', __('Profile video'));
//        $grid->column('profile_voice', __('Profile voice'));
//        $grid->column('password', __('Password'));
        $grid->column('description', __('Description'))->style('max-width:500px;overflow-wrap: break-word;word-break: auto-phrase;');
//        $grid->column('rate', __('Rate'));
        $grid->column('ispaied', __('Ispaied'));
        $grid->column('expired', __('Expired'));
        $grid->column('is_manager', __('Is Manager'));
        $grid->column('state', __('State'));
//        $grid->column('remember_token', __('Remember token'));
        $grid->column('verified', __('verified'))->bool();
        $grid->column('created_at', __('Created at'))->sortable();
//        $grid->column('updated_at', __('Updated at'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uuid', __('Uuid'));
        $show->field('name', __('Name'));
        $show->field('nickname', __('Nickname'));
        $show->field('role', __('Role'));
        $show->field('student_proof', __('Student proof'));
        $show->field('avatar', __('Avatar'));
        $show->field('birth_day', __('Birth day'));
        $show->field('university', __('University'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('line', __('Line'));
        $show->field('address', __('Address'));
        $show->field('profile_video', __('Profile video'));
        $show->field('profile_voice', __('Profile voice'));
        $show->field('password', __('Password'));
        $show->field('description', __('Description'));
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

        $form->text('uuid', __('Uuid'))->default('post-'.uniqid());
        $form->text('name', __('Name'));
        $form->text('nickname', __('Nickname'));
        $form->select('role', __('Role'))->options([
            'normal'=>'學弟妹',
            'vip'=>'學長姐',
        ])->default('normal');
        $form->select('student_proof', __('Student proof'))->options([
            'approve'=>'已通過驗證',
            'banned'=>'未通過驗證',
            'pending'=>'尚未驗證',
        ])->default('pending');
        $form->image('avatar', __('Avatar'));
        $form->datetime('birth_day', __('Birth day'))->default(date('Y-m-d'));
        $form->text('university', __('University'))->datalist(University::all()->transform(function ($item, $key) {
            return [
                'id' => $item->id,
                'name' => $item->chinese_name. $item->english_name
            ];
        })->pluck('name', 'id'));
        $form->switch('is_study', __('Is study'))->states(['在學中'=>true, '已畢業'=>false]);
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('line', __('Line'));
        $form->text('fb', __('Facebook'));
        $form->text('ig', __('Ig'));
        $form->text('linkedin', __('LinkedIn'));
        $form->text('address', __('Address'));
        $form->text('profile_video', __('Profile video'));
        $form->text('profile_voice', __('Profile voice'));
        $form->password('password', __('Password'));
        $form->textarea('description', __('Description'));
        $form->number('rate', __('Rate'))->default(3);
        $form->switch('ispaied', __('Ispaied'));
        $form->datetime('expired', __('Expired'))->default(date('Y-m-d'));
        $form->switch('is_manager', __('is_manager'))->states([
            '是' => true,
            '否' => false
        ]);
        $form->switch('verified', __('verified'))->states([
            '是' => true,
            '否' => false
        ]);
        $form->select('state', __('State'))->options([
            'approve'=>'已開通',
            'banned'=>'未開通',
            'pending'=>'審核中',
        ])->default('approve');
        //$form->text('remember_token', __('Remember token'));

        $form->saving(function (Form $form) {
            if ($form->password == null)
            {
                $form->password = $form->model()->password;
            }
            else
            {
                $form->password = bcrypt($form->password);
            }
        });

        return $form;
    }
}
