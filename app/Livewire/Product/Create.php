<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public ProductForm $form;
    public $categoriesOptions;

    public function mount()
    {
        $this->categoriesOptions = Categoria::all(['id', 'nombre'])->toArray();
    }

    public function save()
    {
        $this->form->store();
        return redirect()->route('product.index')->with('flash.banner', 'Producto creado correctamente');
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
