<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alquiler;

class AlquileresIndex extends Component
{
    public function render()
    {
        return view('livewire.alquileres-index', [
            'alquileres' => Alquiler::with('socio', 'pelicula')->get(),
        ]);
    }
}
