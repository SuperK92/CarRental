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
    protected $title = 'App\User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('apellido', __('Apellido'));
        $grid->column('fecha_nacimiento', __('Fecha nacimiento'));
        $grid->column('DNI', __('DNI'));
        $grid->column('permiso_conducir', __('Permiso conducir'));
        $grid->column('nacionalidad', __('Nacionalidad'));
        $grid->column('telefono', __('Telefono'));
        $grid->column('direccion', __('Direccion'));

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
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('apellido', __('Apellido'));
        $show->field('fecha_nacimiento', __('Fecha nacimiento'));
        $show->field('DNI', __('DNI'));
        $show->field('permiso_conducir', __('Permiso conducir'));
        $show->field('nacionalidad', __('Nacionalidad'));
        $show->field('telefono', __('Telefono'));
        $show->field('direccion', __('Direccion'));

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
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));
        $form->text('apellido', __('Apellido'));
        $form->date('fecha_nacimiento', __('Fecha nacimiento'))->default(date('Y-m-d'));
        $form->text('DNI', __('DNI'));
        $form->text('permiso_conducir', __('Permiso conducir'));
        $form->text('nacionalidad', __('Nacionalidad'));
        $form->text('telefono', __('Telefono'));
        $form->text('direccion', __('Direccion'));

        return $form;
    }
}
