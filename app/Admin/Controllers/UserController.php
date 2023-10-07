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
        // $grid->column('portfolio_id', __('Portfolio Id'));
        $grid->column('name', __('Name'));
        $grid->column('avatar', __('Avatar'))->display(function($image_path){
            return '<img src="'.env('APP_URL').'/uploads/'.$image_path.'" style="width:90px;">';
        });
        $grid->column('role', __('Role'));
        $grid->column('birth_day', __('Birth day'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('line', __('Line'));
        $grid->column('address', __('Address'));
        //$grid->column('password', __('Password'));
        $grid->column('ispaied', __('Ispaied'));
        $grid->column('expired', __('Expired'));
        $grid->column('state', __('State'));
        $grid->column('rate', __('Rate'));
        //$grid->column('description', __('Description'));
        //$grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));

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
        $show->field('name', __('Name'));
        $show->field('role', __('Role'));
        $show->field('birth_day', __('Birth day'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('line', __('Line'));
        $show->field('address', __('Address'));
        $show->field('password', __('Password'));
        $show->field('ispaied', __('Ispaied'));
        $show->field('expired', __('Expired'));
        $show->field('state', __('State'));
        $show->field('description', __('Description'));
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

        $form->text('name', __('Name'));
        $form->image('avatar', __('Avatar'));
        $form->text('portfolio_id', __('Portfolio'));
        $form->select('role', __('Role'))->options([
            'normal'=>'學弟妹',
            'vip'=>'學長姐',
        ]);
        $form->date('birth_day', __('Birth day'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'))->options(['mask' => '09 9999 9999']);
        $form->text('line', __('Line'));
        $form->text('address', __('Address'));
        $form->password('password', __('Password'));
        $form->text('ispaied', __('Ispaied'))->default('false');
        $form->datetime('expired', __('Expired'))->default(date('Y-m-d H:i:s'));
        $form->select('state', __('State'))->options([
            'pending'=>'審核中',
            'approve'=>'已審核',
        ]);
        $form->textarea('description', __('Description'));
        //$form->text('remember_token', __('Remember token'));

        $form->saving(function (Form $form) {
            if ($form->password == null)
            {
                $form->password = $form->model()->password;
            }
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });

        return $form;
    }
}
