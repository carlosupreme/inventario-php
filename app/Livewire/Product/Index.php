<?php

namespace App\Livewire\Product;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public int $total;

    public function mount()
    {
        $this->total = Producto::count();
    }

    public function render()
    {
        return view('livewire.product.index', [
            'productos' => Producto::with('categoria')
                ->orderBy('created_at', 'desc')
                ->paginate(10)
        ]);
    }
}
