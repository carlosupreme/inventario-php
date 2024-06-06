<?php

namespace App\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoriaCreate extends Component
{
    #[Validate('required|unique:categorias,nombre')]
    public $nombre;

    public $open = false;

    public function store()
    {
        $this->validate();

        Categoria::create([
            'nombre' => $this->nombre
        ]);

        $this->dispatch('categoriaCreated');
        $this->reset();
    }

    public function resetValues(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.categoria.categoria-create');
    }
}

