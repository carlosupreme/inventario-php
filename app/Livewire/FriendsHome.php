<?php

namespace App\Livewire;

use App\Helpers\FriendsViews;
use Livewire\Component;

class FriendsHome extends Component
{
    public $view;

    public function mount()
    {
        $this->view = FriendsViews::friends;
    }

    public function changeView($view)
    {
        $this->view = FriendsViews::from($view);
    }

    public function render()
    {
        return view('livewire.friends-home');
    }
}
