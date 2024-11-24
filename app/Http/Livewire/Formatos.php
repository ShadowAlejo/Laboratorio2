<?php

namespace App\Http\Livewire;

use App\Models\Formato;
use Livewire\Component;
use Livewire\WithPagination;

class Formatos extends Component
{
    use WithPagination;

    public $for_id, $for_nombre;
    public $updateMode = false;

    protected $rules = [
        'for_nombre' => 'required|max:60',
    ];

    public function render()
    {
        return view('livewire.formatos', [
            'formatos' => Formato::paginate(10),
        ]);
    }

    public function resetInputFields()
    {
        $this->for_id = null;
        $this->for_nombre = null;
    }

    public function store()
    {
        $this->validate();
        Formato::create([
            'for_nombre' => $this->for_nombre,
        ]);
        session()->flash('message', 'Formato creado con éxito.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $formato = Formato::findOrFail($id);
        $this->for_id = $formato->for_id;
        $this->for_nombre = $formato->for_nombre;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();
        $formato = Formato::findOrFail($this->for_id);
        $formato->update([
            'for_nombre' => $this->for_nombre,
        ]);
        session()->flash('message', 'Formato actualizado con éxito.');
        $this->resetInputFields();
        $this->updateMode = false;
    }

    public function delete($id)
    {
        Formato::findOrFail($id)->delete();
        session()->flash('message', 'Formato eliminado con éxito.');
    }
}
