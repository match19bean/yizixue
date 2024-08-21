<?php

namespace App\Admin\Controllers;

use App\YizixueFaq;
use App\YizixueFaqCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class YizixueFaqController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'YizixueFaq';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new YizixueFaq());

        $grid->column('id', __('Id'));
        $grid->column('yizixueFaqCategory.name', __('Yizixue faq category id'));
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(YizixueFaq::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('yizixue_faq_category_id', __('Yizixue faq category id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
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
        $form = new Form(new YizixueFaq());

        $form->select('yizixue_faq_category_id', __('Yizixue faq category id'))->options(YizixueFaqCategory::all()->pluck('name', 'id'));
        $form->text('title', __('Title'));
        $form->tinymce('content', __('Content'));

        return $form;
    }
}
