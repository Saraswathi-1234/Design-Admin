<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Illuminate\Http\Request;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use App\Models\DE_Users;

class UsersController extends AdminController
{
        /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Users';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DE_Users);

        $grid->column('id', __('Id'));
        $grid->column('name', __('User Name'));
        $grid->column('email', __('User Email'));


        $grid->disableExport();
        // $grid->actions(function ($actions) {
        //     $actions->disableView();
        //     $actions->disableDelete();
        // });
        $grid->disableCreateButton();
        // $grid->disableRowSelector();
        // $grid->filter(function ($filter) {
        //     $filter->disableIdFilter();


        // });
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();
        });

        return $grid;
    }
}
