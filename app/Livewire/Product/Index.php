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

    public function confirmDelete($id)
    {
        $this->dispatch('selectItem', $id)->to(DeleteModal::class);
    }

    #[On('deleteProducto')]
    public function deleteProducto($id)
    {
        $p = Producto::find($id);

        if($p->foto){
            Storage::delete(str_replace("/storage/", "", $p->foto));
        }

        $p->delete();

        $this->dispatch('actionCompleted')->to(DeleteModal::class);
    }

    #[On('actionCompleted')]
    public function render()
    {
        return view('livewire.product.index', [
            'total' => Producto::count(),
            'productos' => Producto::with('categoria')
                ->latest('created_at')
                ->paginate(10)
        ]);
    }
}
