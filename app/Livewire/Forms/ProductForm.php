<?php

namespace App\Livewire\Forms;

use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProductForm extends Form
{
    use WithFileUploads;

    public ?Producto $product;

    #[Validate('required|string|max:255|min:3')]
    public $nombre = '';

    #[Validate]
    public $codigo_barras = '';

    #[Validate('required|exists:categorias,id')]
    public $categoria_id;

    public $descripcion = '';
    public $costo;

    #[Validate('required|numeric|min:0.01')]
    public $precio;

    public $precio_mayoreo;
    public $cantidad_mayoreo;

    #[Validate('required|string|max:255|min:1')]
    public $unidad_medida = '';

    #[Validate('required|integer|min:1')]
    public $stock_minimo;

    #[Validate('required|integer|min:1')]
    public $stock_tienda;

    #[Validate('required|integer|min:1')]
    public $stock_bodega;

    #[Validate('nullable|image')]
    public $foto;

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255|min:3',
            'codigo_barras' => ['required'],
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0.01',
            'unidad_medida' => 'required|string|max:255|min:1',
            'stock_minimo' => 'required|integer|min:1',
            'stock_tienda' => 'required|integer|min:1',
            'stock_bodega' => 'required|integer|min:1',
            'foto' => 'nullable|image'
        ];
    }

    public function setProduct(Producto $product)
    {
        $this->product = $product;

        $this->nombre = $product->nombre;
        $this->codigo_barras = $product->codigo_barras;
        $this->categoria_id = $product->categoria_id;
        $this->descripcion = $product->descripcion;
        $this->costo = $product->costo;
        $this->precio = $product->precio;
        $this->precio_mayoreo = $product->precio_mayoreo;
        $this->cantidad_mayoreo = $product->cantidad_mayoreo;
        $this->unidad_medida = $product->unidad_medida;
        $this->stock_minimo = $product->stock_minimo;
        $this->stock_tienda = $product->stock_tienda;
        $this->stock_bodega = $product->stock_bodega;
    }

    public function update()
    {
        $this->validate();
        $this->product->update($this->except('foto'));

        if ($this->foto) {
            if ($this->product->foto) {
                Storage::delete($this->product->foto);
            }

            $path = Storage::url($this->foto->store('productos'));
            $this->product->update(['foto' => $path]);
        }
    }

    public function store()
    {
        $this->validate();
        $this->product = Producto::create($this->except('foto'));

        if ($this->foto) {
            $path = Storage::url($this->foto->store('productos'));
            $this->product->update(['foto' => $path]);
        }

    }
}
