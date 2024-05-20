<?php

namespace App\Livewire\Product;

use App\Livewire\DeleteModal;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search' => ['except' => '', 'as' => 's']];

    public function confirmDelete($id)
    {
        $this->dispatch('selectItem', $id)->to(DeleteModal::class);
    }

    #[On('deleteProducto')]
    public function deleteProducto($id)
    {
        $p = Producto::find($id);

        if ($p->foto) {
            Storage::delete(str_replace("/storage/", "", $p->foto));
        }

        $p->delete();

        $this->dispatch('actionCompleted')->to(DeleteModal::class);
    }

    #[On('actionCompleted')]
    public function render()
    {
        $productos = Producto::matching($this->search, 'nombre', 'codigo_barras', 'descripcion')
            ->with('categoria')
            ->latest('created_at')
            ->paginate(10);

        $total = Producto::count();

        return view('livewire.product.index', compact('total', 'productos'));
    }
}
