<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CouponCode;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CouponCodesController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('优惠券列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('优惠券详情')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑优惠券')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增优惠券')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponCode);
        // 默认按创建时间倒序排序
        $grid->model()->orderBy('created_at', 'desc');
        $grid->id('ID')->sortable();
        $grid->name('名称');
        $grid->code('优惠码');
        $grid->description('描述');
        //虚拟出来的一个字段
        $grid->column('usage', '用量')->display(function ($value) {
            return "{$this->used} / {$this->total}";
        });
        $grid->enabled('是否启用')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->created_at('创建时间');

        $grid->actions(function ($actions) {
            $actions->disableView();
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
        $show = new Show(CouponCode::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->code('Code');
        $show->type('Type');
        $show->value('Value');
        $show->total('Total');
        $show->used('Used');
        $show->min_amount('Min amount');
        $show->not_before('Not before');
        $show->not_after('Not after');
        $show->enabled('Enabled');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CouponCode);

        $form->display('id', 'ID');
        $form->text('name', '名称')->rules('required');
        $form->text('code', '优惠码')->rules(function ($form) {
            if ($id = $form->model()->id) {
                return 'nullable|unique:coupon_codes,code,'.$id.',id';
            } else {
                return 'nullable|unique:coupon_codes';
            }
        });
        $form->radio('type', '类型')->options(CouponCode::$typeMap)->rules('required');
        $form->text('value', '折扣')->rules(function ($form) {
            if ($form->model()->type === CouponCode::TYPE_PERCENT) {
                return 'required|numeric|between:1,99';
            } else {
                return 'required|numeric|min:0.01';
            }
        });
        $form->text('total', '总量')->rules('required|numeric|min:0');
        $form->text('min_amount', '最低金额')->rules(function ($form) {
            if ($form->model()->type === CouponCode::TYPE_FIXED) {
                $minVal = $form->model()->value + 0.01;
                return 'required|numeric|min:'.$minVal;
            } else {
                return 'required|numeric|min:0';
            }
        });
        $form->datetime('not_before', '开始时间');
        $form->datetime('not_after', '结束时间');
        $form->radio('enabled', '启用')->options(['1' => '是', '0' => '否']);

        $form->saving(function (Form $form) {
            if ( !$form->code) {
                $form->code = CouponCode::findAvailableCode();
            }
        });

        return $form;
    }
}
