<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{

    public $activeLink;



    public function render()
    {
        return view('livewire.sidebar');
    }
}