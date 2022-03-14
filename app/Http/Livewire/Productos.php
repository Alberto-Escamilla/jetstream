<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    // SE DEFINEN VARIABLES
    public $productos, $descripcion, $cantidad, $id_producto;
    public $modal = false;
    public function render()
    {
        $this->productos = Producto::all(); //Variable creada para mandar a llamar todos los registros dentro de productos.
        return view('livewire.productos');
    }
    // FUNCION PARA CREAR REGISTROS
    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function abrirModal(){
        $this->modal = true; //LA FUNCIÓN CONFIGURADA EN TRUE ES PARA ABRIRLO
    }
    public function cerrarModal(){
        $this->modal = false; //LA FUNCIÓN CONFIGURADA EN FALSE ES PARA CERRARLO
    }
    public function limpiarCampos(){
        $this->descripcion = '';
        $this->cantidad = '';
        $this->id_producto = ''; //DEJANDOLOS VACIOS LOS LIMPIARA AUTOMATICAMENTE
    }
    // SE CREA LA FUNCIÓN PARA EDITAR DATOS.
    public function editar($id){
        $producto = Producto::findOrFail($id); //aqui se le dice que se conecte al modelo producto y busque por id
        $this->id_producto = $id;
        $this->descripcion = $producto->descripcion;
        $this->cantidad = $producto->cantidad;
        $this->abrirModal(); //CON ESTA FUNCION ABRIMOS EL MODAL RECIBIENDO LOS DATOS DE LA FILA SELCCIONADA
    }
    public function borrar($id){
        Producto::find($id)->delete(); //con este metodo eliminamos los registros deseados.
       
    }
    public function guardar(){
        Producto::updateOrCreate(['id'=>$this->id_producto],
        [
            'descripcion'=> $this->descripcion,
            'cantidad'=> $this->cantidad

        ]);
        $this->cerrarModal();
        $this->limpiarCampos();       
    }
}