<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class TicketEdit extends Component
{
    public $ticket;
    public $open = false;
    #[On('editTicket')]
    public function editTicket($id): void
    {
        $this->ticket = Ticket::with('productos', 'user')
            ->findOrFail($id);
        debug($this->ticket);
        $this->open = true;
    }

    public function render()
    {
        $productos = $this->ticket?->productos ?: [];
        $total = $this->ticket?->total ?: 0;
        return view('livewire.ticket-edit', compact('productos', 'total'));
    }
}
