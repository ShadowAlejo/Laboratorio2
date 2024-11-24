<?php

namespace App\Http\Livewire;

use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ActorPelicula as ActorPeliculaModel; // Alias para evitar conflicto
use App\Models\Actor;

class ActorPeliculaComponent extends Component
{
    use WithPagination;

    public $actorPeliculaId, $actor_id, $pel_id, $actor_papel;
    public $isOpen = false;

    protected $rules = [
        'actor_id' => 'required|exists:actores,actor_id',
        'pel_id' => 'required|exists:peliculas,pel_id',
        'actor_papel' => 'required|string|max:60',
    ];

    public function render()
    {
        return view('livewire.actor-pelicula-component', [
            'actorPeliculas' => ActorPeliculaModel::with(['actor', 'pelicula'])->paginate(5),
            'actores' => Actor::all(),
            'peliculas' => Pelicula::all(),
        ]);
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->reset(['actorPeliculaId', 'actor_id', 'pel_id', 'actor_papel']);
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        ActorPeliculaModel::updateOrCreate(
            ['id' => $this->actorPeliculaId],
            [
                'actor_id' => $this->actor_id,
                'pel_id' => $this->pel_id,
                'actor_papel' => $this->actor_papel,
            ]
        );

        session()->flash('message', $this->actorPeliculaId ? 'Relación actualizada correctamente.' : 'Relación creada correctamente.');

        $this->closeModal();
    }

    public function edit($id)
    {
        $actorPelicula = ActorPeliculaModel::findOrFail($id);

        $this->actorPeliculaId = $actorPelicula->id;
        $this->actor_id = $actorPelicula->actor_id;
        $this->pel_id = $actorPelicula->pel_id;
        $this->actor_papel = $actorPelicula->actor_papel;

        $this->openModal();
    }

    public function delete($id)
    {
        ActorPeliculaModel::findOrFail($id)->delete();
        session()->flash('message', 'Relación eliminada correctamente.');
    }
}
