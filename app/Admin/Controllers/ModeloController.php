<?php

namespace App\Admin\Controllers;

use App\Marca;
use App\Modelo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ModeloController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Modelo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Modelo());

        $grid->column('id', __('Id'));
        $grid->column('marca_id')->display(function () {
            return $this->marca->nombre;    //sustituyo el id por el nombre con eloquent
        });
        $grid->column('nombre', __('Nombre'));
        // $grid->column('marca_id', __('Marca id'));  //por defecto
       
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
        $show = new Show(Modelo::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('marca_id', __('Marca id'));
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
        $form = new Form(new Modelo());

        $form->select('marca_id', __('Marca id'))->options(
            Marca::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );
        $form->text('nombre', __('Nombre'));
        // $form->number('marca_id', __('Marca id'));
       
        return $form;
    }
}
