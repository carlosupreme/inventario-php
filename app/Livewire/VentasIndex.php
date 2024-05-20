<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class VentasIndex extends Component
{
    use WithPagination;

    #[On('ticketCreated')]
    public function render()
    {
        $tickets = Ticket::with('productos', 'user')
            ->latest('created_at')
            ->paginate(10);

        $total = Ticket::sum('total');
        return view('livewire.ventas-index', compact('tickets', 'total'));
    }
}
