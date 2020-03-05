<?php

namespace App\Admin\Controllers;

use App\Categoria;
use App\Combustible;
use App\EstadoVehiculo;
use App\Modelo;
use App\Transmision;
use App\Vehiculo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VehiculoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Vehiculo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vehiculo());

        $grid->column('id', __('Id'));
        $grid->column('matricula', __('Matricula'));
        $grid->column('modelo_id', __('Modelo id'));
        $grid->column('categoria_id', __('Categoria id'));
        $grid->column('estado_vehiculo_id', __('Estado id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('imagen', __('Imagen'));

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
        $show = new Show(Vehiculo::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('matricula', __('Matricula'));
        $show->field('modelo_id', __('Modelo id'));
        $show->field('transmision_id', __('Transmision id'));
        $show->field('combustible_id', __('Combustible id'));
        $show->field('categoria_id', __('Categoria id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('imagen', __('Imagen'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Vehiculo());

        $form->text('matricula', __('Matricula')); //__('string) -> retorna una traduccion de admin
        // $form->number('modelo_id', __('Modelo id'));
        $form->select('modelo_id', __('Modelo'))->options(
            Modelo::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );

        // $form->number('transmision_id', __('Transmision'));
        // $form->select('	transmision_id', __('Transmision'))->options(
        //     Transmision::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
        //  );
        // $form->number('combustible_id', __('Combustible id'));
        $form->select('combustible_id', __('Combustible'))->options(
            Combustible::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );

         $form->select('transmision_id', __('Transmision'))->options(
            Transmision::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );

        // $form->number('categoria_id', __('Categoria id'));
        $form->select('categoria_id', __('Categoria'))->options(
            Categoria::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );
        $form->select('estado_vehiculo_id', __('Estado'))->options(
            EstadoVehiculo::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );
         
        $form->image('imagen', __('Imagen'));

        return $form;
    }
}
