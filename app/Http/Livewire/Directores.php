<?php

namespace App\Http\Livewire;

use App\Models\Director;
use Livewire\Component;
use Livewire\WithPagination;

class Directores extends Component
{
    use WithPagination;

    public $dir_id, $dir_nombre;
    public $updateMode = false;

    protected $rules = [
        'dir_nombre' => 'required|max:80',
    ];

    public function render()
    {
        return view('livewire.directores', [
            'directores' => Director::paginate(10),
        ]);
    }

    public function resetInputFields()
    {
        $this->dir_id = null;
        $this->dir_nombre = null;
    }

    public function store()
    {
        $this->validate();
        Director::create([
            'dir_nombre' => $this->dir_nombre,
        ]);
        session()->flash('message', 'Director creado con éxito.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $director = Director::findOrFail($id);
        $this->dir_id = $director->dir_id;
        $this->dir_nombre = $director->dir_nombre;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();
        $director = Director::findOrFail($this->dir_id);
        $director->update([
            'dir_nombre' => $this->dir_nombre,
        ]);
        session()->flash('message', 'Director actualizado con éxito.');
        $this->resetInputFields();
        $this->updateMode = false;
    }

    public function delete($id)
    {
        Director::findOrFail($id)->delete();
        session()->flash('message', 'Director eliminado con éxito.');
    }
}
