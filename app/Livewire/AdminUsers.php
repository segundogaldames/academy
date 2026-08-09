<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function updatingSearch()
    {
        $this->resetPage(); // Trait WithPagination
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')->orWhere('email', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.admin-users', compact('users'));
    }

    public function reset_page()
    {
        $this->reset('page');
    }
}
