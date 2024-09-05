<?php

namespace App\Admin\Controllers;

use App\PayOrder;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PayOrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PayOrder';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PayOrder());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('user_id', __('User id'))->using(User::pluck('name', 'id')->toArray())->filter(User::whereIn('id', PayOrder::pluck('user_id'))->pluck('name', 'id')->toArray());
        $grid->column('product.name', __('Pay product id'));
        $grid->column('order_status', __('Order status'))->using([1=>"新訂單", 2=>'已取消', 3=>'確認ERROR', 4=>'<span class="text-red">已完成</span>'])->filter([
            1=>"新訂單", 2=>'已取消', 3=>'確認ERROR', 4=>'已完成'
        ]);
        $grid->column('transactionId', __('TransactionId'));
        $grid->column('remark', __('Remark'));
        $grid->column('is_sandbox', __('Is sandbox'))->using([1=>'測試環境', 0=>'正式環境'])->filter([1=>'測試環境', 0=>'正式環境']);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->disableActions();
        $grid->disableCreateButton();
        $grid->disableColumnSelector();
        $grid->disableFilter();

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
        $show = new Show(PayOrder::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('pay_product_id', __('Pay product id'));
        $show->field('order_status', __('Order status'));
        $show->field('transactionId', __('TransactionId'));
        $show->field('remark', __('Remark'));
        $show->field('is_sandbox', __('Is sandbox'));
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
        $form = new Form(new PayOrder());

        $form->number('user_id', __('User id'));
        $form->number('pay_product_id', __('Pay product id'));
        $form->number('order_status', __('Order status'))->default(1);
        $form->text('transactionId', __('TransactionId'));
        $form->text('remark', __('Remark'));
        $form->switch('is_sandbox', __('Is sandbox'));

        return $form;
    }
}
