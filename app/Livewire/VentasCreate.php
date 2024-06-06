<?php

namespace App\Livewire;

use App\Models\Producto;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class VentasCreate extends Component
{

    #[Validate('required|min:1')]
    public $busqueda = '';

    public $producto;

    public $cantidad = 1;

    public $productos = [];

    public $total = 0;

    public function agregarProducto()
    {
        $this->productos[] = [$this->producto, $this->cantidad];
        $this->total += $this->producto->precio * $this->cantidad;

        $this->producto = null;
        $this->cantidad = 1;
    }

    public function buscar()
    {
        $this->validate();
        $this->producto = Producto::where('codigo_barras', 'like', "%{$this->busqueda}%")->first();
        debug($this->producto);
    }

    public function cobrar()
    {
        if(!$this->productos) {
            return;
        }

        $ticket = Ticket::create([
            'total' => $this->total,
            'user_id' => Auth::user()->id
        ]);

        foreach ($this->productos as $producto) {
            $ticket->productos()->attach($producto[0]->id, ['cantidad' => $producto[1]]);
        }

        return redirect()->route('ventas.index')->with('flash.banner', 'Venta realizada correctamente');
    }

    public function render()
    {
        return view('livewire.ventas-create');
    }
}
