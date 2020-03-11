<?php

namespace App\Admin\Controllers;

use App\EstadoVehiculo;
use App\Oficina;
use App\Vehiculo;
use App\Vehiculo_Historico;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VehiculoHistoricoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Vehiculo_Historico';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vehiculo_Historico());

        // $grid->column('id', __('Id'));
        // $grid->column('vehiculo_id', __('Vehiculo id'));
        $grid->column('vehiculo_id')->display(function () {
            return $this->vehiculo->matricula;    
        });
        // $grid->column('oficina_id', __('Oficina id'));
        $grid->column('oficina_id')->display(function () {
            return $this->oficina->nombre;    
        });
        $grid->column('fecha_inicio', __('Fecha inicio'));
        $grid->column('fecha_fin', __('Fecha fin'));
        $grid->column('estado_vehiculo_id', __('Estado vehiculo id'));
      
        $grid->column('reserva_id', __('Reserva id'));
        
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
        $show = new Show(Vehiculo_Historico::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('vehiculo_id', __('Vehiculo id'));
        $show->field('oficina_id', __('Oficina id'));
        $show->field('fecha_inicio', __('Fecha inicio'));
        $show->field('fecha_fin', __('Fecha fin'));
        $show->field('estado_vehiculo_id', __('Estado vehiculo id'));
        
        $show->field('reserva_id', __('Reserva id'));
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
        $form = new Form(new Vehiculo_Historico());

        // $form->number('vehiculo_id', __('Vehiculo id'));
        $form->select('vehiculo_id', __('Vehiculo'))->options(
            Vehiculo::all()->pluck('matricula', 'id') //retorna todos los nombres de las marcas como options
         );
        // $form->number('oficina_id', __('Oficina id'));
        $form->select('oficina_id', __('Oficina'))->options(
            Oficina::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );
        $form->date('fecha_inicio', __('Fecha inicio'))->default(date('Y-m-d'));
        if($form->isCreating()){
            $form->date('fecha_fin', __('Fecha fin'))->default(null);
        } else {
            $form->date('fecha_fin', __('Fecha fin'))->default(date('Y-m-d'));
        }
        
        // $form->number('estado_vehiculo_id', __('Estado vehiculo id'));
        $form->select('estado_vehiculo_id', __('Estado'))->options(
            EstadoVehiculo::all()->pluck('nombre', 'id') //retorna todos los nombres de las marcas como options
         );
         
        $form->text('reserva_id', __('Reserva id'));

        return $form;
    }
}
