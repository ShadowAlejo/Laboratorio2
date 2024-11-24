<?php

namespace App\Http\Livewire;

use App\Models\Pelicula;
use App\Models\Director;
use App\Models\Formato;
use Livewire\Component;
use Livewire\WithPagination;

class Peliculas extends Component
{
    use WithPagination;

    public $peliculaId, $dir_id, $for_id, $costo, $fecha_estreno;
    public $isOpen = false;

    protected $rules = [
        'dir_id' => 'required|exists:directores,dir_id',
        'for_id' => 'required|exists:formatos,for_id',
        'costo' => 'required|numeric|min:0',
        'fecha_estreno' => 'required|date',
    ];

    public function render()
    {
        return view('livewire.peliculas', [
            'peliculas' => Pelicula::with(['director', 'formato'])->paginate(5),
            'directores' => Director::all(),
            'formatos' => Formato::all(),
        ]);
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        Pelicula::updateOrCreate(
            ['pel_id' => $this->peliculaId],
            [
                'dir_id' => $this->dir_id,
                'for_id' => $this->for_id,
                'costo' => $this->costo,
                'fecha_estreno' => $this->fecha_estreno,
            ]
        );

        session()->flash('message', $this->peliculaId ? 'Película actualizada correctamente.' : 'Película creada correctamente.');

        $this->closeModal();
    }

    public function edit($id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $this->peliculaId = $pelicula->pel_id;
        $this->dir_id = $pelicula->dir_id;
        $this->for_id = $pelicula->for_id;
        $this->costo = $pelicula->costo;
        $this->fecha_estreno = $pelicula->fecha_estreno;

        $this->openModal();
    }

    public function delete($id)
    {
        Pelicula::findOrFail($id)->delete();
        session()->flash('message', 'Película eliminada correctamente.');
    }
}
