<?php

namespace App\Admin\Controllers;

use App\Reserva;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReservaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Reserva';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reserva());

        $grid->column('id', __('Id'));
        $grid->column('fecha_recogida', __('Fecha recogida'));
        $grid->column('fecha_devolucion', __('Fecha devolucion'));
        // $grid->column('user->DNI', __('User'));
        $grid->column('user_id')->display(function () {
            return $this->user->DNI;    //sustituyo el id por el nombre con eloquent
        });
        $grid->column('n_dias', __('Dias'));
        $grid->column('total', __('Total'));
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
        $show = new Show(Reserva::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('fecha_recogida', __('Fecha recogida'));
        $show->field('fecha_devolucion', __('Fecha devolucion'));
        $show->field('user_id', __('User id'));
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
        $form = new Form(new Reserva());

        $form->date('fecha_recogida', __('Fecha recogida'))->default(date('Y-m-d'));
        $form->date('fecha_devolucion', __('Fecha devolucion'))->default(date('Y-m-d'));
        
        // $form->number('user_id', __('User id'));

        $form->select('user_id', __('User'))->options(
            User::all()->pluck('DNI', 'id') //retorna todos los nombres de las marcas como options
         );

        return $form;
    }
}
