<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ProductForm $form;
    public $categoriesOptions;

    public function mount(Producto $product)
    {
        $this->categoriesOptions = Categoria::all(['id', 'nombre'])->toArray();
        $this->form->setProduct($product);
    }

    public function save()
    {
        $this->form->update();
        return redirect()->route('product.index')->with('flash.banner', 'Producto actualizado correctamente');
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}
