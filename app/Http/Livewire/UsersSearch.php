<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UsersSearch extends Component
{
    public $users;
    public $search;

    public function mount()
    {
        $this->users = User::all();
    }

    public function updatedSearch()
    {
        $this->users = User::where('name', 'like',  '%' . $this->search . '%')->get();
    }

    public function render()
    {
        return view('livewire.users-search', ['users' => $this->users]);
    }
}
