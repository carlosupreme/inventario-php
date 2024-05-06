<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FriendRequests extends Component
{
    public $requests;

    public function mount()
    {
        $this->getFriendRequests();
    }

    public function getFriendRequests(): void
    {
        $this->requests = Auth::user()->getFriendRequests()->map(fn($friendship) => $friendship->sender);
    }

    public function acceptFriendRequest(User $user): void
    {
        Auth::user()->acceptFriendRequest($user);
        $this->getFriendRequests();
    }

    public function rejectFriendRequest(User $user): void
    {
        Auth::user()->denyFriendRequest($user);
        $this->getFriendRequests();
    }

    public function render()
    {
        return view('livewire.friend-requests');
    }
}
