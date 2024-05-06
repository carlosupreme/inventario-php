<?php

namespace App\Livewire;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public $search;
    public $queryString = ['search' => ['except' => '', 'as' => 's']];
    protected $listeners = ['userCreated' => '$refresh', 'deleteUser'];
    public $deletingUser;

    public function render()
    {
        $users = User::matching($this->search, 'name', 'email')->orderBy('id')->get();

        debug($users);
        return view('livewire.user-index', compact('users'));
    }

    public function edit($userId)
    {
        $this->dispatch('editUser', $userId);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        (new DeleteUser())->delete($user);
        $this->dispatch('actionCompleted');

        return redirect()->route('user.index')->with('flash.banner', 'Usuario eliminado');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('selectItem', $id);
    }
}
