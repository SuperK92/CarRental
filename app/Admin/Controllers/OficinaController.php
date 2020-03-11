<?php

namespace App\Admin\Controllers;

use App\Oficina;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OficinaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Oficina';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Oficina());

        $grid->column('id', __('Id'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('direccion', __('Direccion'));
        $grid->column('telefono', __('Telefono'));
        $grid->column('email', __('Email'));
        $grid->column('municipio', __('Municipio'));
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
        $show = new Show(Oficina::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('direccion', __('Direccion'));
        $show->field('telefono', __('Telefono'));
        $show->field('email', __('Email'));
        $show->field('municipio', __('Municipio'));
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
        $form = new Form(new Oficina());

        $form->text('nombre', __('Nombre'));
        $form->text('direccion', __('Direccion'));
        $form->text('telefono', __('Telefono'));
        $form->email('email', __('Email'));
        $form->text('municipio', __('Municipio'));

        return $form;
    }
}
