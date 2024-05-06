<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FriendSuggestions extends Component
{
    public $suggestions;

    public function mount()
    {
        $this->getSuggestions();
    }

    public function getSuggestions()
    {
        $this->suggestions = User::where('id', '!=', Auth::user()->id)
            ->get()
            ->reject(function (User $user) {
                return Auth::user()->isFriendWith($user) || Auth::user()->hasSentFriendRequestTo($user);
            });
    }

    public function sendFriendRequest(User $user)
    {
        Auth::user()->befriend($user);
        $this->getSuggestions();
    }

    public function removeFriendSuggestion(User $user)
    {

    }

    public function render()
    {
        return view('livewire.friend-suggestions');
    }
}
