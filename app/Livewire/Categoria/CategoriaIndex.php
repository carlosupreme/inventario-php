<?php

namespace App\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoriaIndex extends Component
{
    public $search;
    public $queryString = ['search' => ['except' => '', 'as' => 's']];

    public function edit($categoriaId)
    {
        $this->dispatch('editCategoria', $categoriaId);
    }

    #[On('deleteCategoria')]
    public function deleteCategoria($id)
    {
        Categoria::destroy($id);
        $this->dispatch('actionCompleted');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('selectItem', $id);
    }

    #[On('actionCompleted')]
    #[On('categoriaCreated')]
    #[On('categoriaUpdated')]
    public function render()
    {
        $total = Categoria::count();
        $categorias = Categoria::matching($this->search, 'nombre', 'id')
            ->withCount('productos')
            ->latest()
            ->paginate();

        return view('livewire.categoria.categoria-index', [
            'categorias' => $categorias,
            'total' => $total,
        ]);
    }
}
