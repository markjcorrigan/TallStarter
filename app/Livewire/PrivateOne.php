<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PrivateOne extends Component
{
    public function mount(): void
    {
        //
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.private-one');
    }
}
