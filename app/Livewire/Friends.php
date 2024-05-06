<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Friends extends Component
{
    public $friends;
    public $countFriends;
    public $search = '';

    public function render()
    {
        debug($this->search);
        $this->friends = Auth::user()->getFriends();
        $this->countFriends = count($this->friends);
        return view('livewire.friends');
    }
}
