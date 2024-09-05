<?php

namespace App\Admin\Controllers;

use App\University;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UniversityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'University';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new University());

        $grid->column('id', __('Id'));
        $grid->column('slug', __('Slug'));
        $grid->column('image_path', __('Image Path'))->display(function($image_path){
            return url($image_path);
        })->image();
        $grid->column('name', __('Name'));
        $grid->column('english_name', __('English Name'));
        $grid->column('country', __('Country'));
        $grid->column('area', __('Area'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function($action){
            $action->disableDelete();
        });

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
        $show = new Show(University::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('slug', __('Slug'));
        $show->field('name', __('Name'));
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
        $form = new Form(new University());
        $form->hidden('slug');
        $form->text('name', __('Name'))->creationRules(['required', 'unique:university,name'])
            ->updateRules(['required', 'unique:university,name,{{id}}'])->placeholder('學校中文名稱');
        $form->text('english_name', __('English Name'))->creationRules(['required', 'unique:university,english_name'])
            ->updateRules(['required', 'unique:university,english_name,{{id}}'])->placeholder('學校英文名稱');

        $form->select('country', __('Country'))->options(
            [
                'USA' => 'USA',
                'CANADA' => 'CANADA',
                'UK' => 'UK',
                'AUSTRALIA' => 'AUSTRALIA',
                'NEW ZEALAND' => 'NEW ZEALAND',
                'GERMANY' => 'GERMANY',
                'FRANCE' => 'FRANCE',
                'JAPAN' => 'JAPAN',
                'KOREA' => 'KOREA',
                'SINGAPORE' => 'SINGAPORE',
                'HONG KONG' => 'HONG KONG',
                'MACAU' => 'MACAU',
                'TAIWAN' => 'TAIWAN',
                'CHINA' => 'CHINA',
                'ASIA' => 'ASIA',
                'EUROPE' => 'EUROPE',
            ]
        )->when('=', 'USA', function (Form $form) {
            $form->select('area', __('Area'))->options([
                'NORTHEAST' => 'NORTHEAST',
                'WEST' => 'WEST',
                'SOUTH' => 'SOUTH',
                'MIDWEST' => 'MIDWEST',
            ]);
        })->when('=', 'TAIWAN', function (Form $form) {
            $form->select('area', __('Area'))->options([
                'INTERNATIONAL' => 'INTERNATIONAL',
                'HIGHSCHOOL' => 'HIGHSCHOOL',
                'COLLEGE' => 'COLLEGE'
            ]);
        });

        $form->image('image_path', __('Image'))->disk('university')->move('university/'.request()->input('country'))->uniqueName();
        $form->hidden('chinese_name');
        $form->saving(function (Form $form) {
            if(request()->isMethod('POST')){
                if($form->slug === null) {
                    $form->slug = Str::slug(Str::lower(request()->input('english_name')));
                }

            }
            $form->chinese_name = request()->input('name');
        });

        return $form;
    }
}
