<?php

namespace App\Livewire\Ordering;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;


class Menus extends Component
{
    public Collection $menus;
    public ?string $table = null;

    protected $queryString = ['table'];

    public function mount()
    {
        Log::info('Livewire mount called with table=' . $this->table);
        $this->menus = Menu::orderBy('category')->get();
    }

    public function render()
    {
        return view('livewire.ordering.menus', [
            'menus' => $this->menus,
        ]);
    }
}

