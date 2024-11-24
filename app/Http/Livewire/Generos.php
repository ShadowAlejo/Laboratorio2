<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Genero;

class Generos extends Component
{
    public $gen_id, $gen_nombre;
    public $isEditMode = false;

    protected $rules = [
        'gen_nombre' => 'required|string|max:100',
    ];

    public function resetFields()
    {
        $this->gen_id = null;
        $this->gen_nombre = '';
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        Genero::create([
            'gen_nombre' => $this->gen_nombre,
        ]);

        session()->flash('message', 'Género creado exitosamente.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $genero = Genero::findOrFail($id);
        $this->gen_id = $genero->gen_id;
        $this->gen_nombre = $genero->gen_nombre;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();

        $genero = Genero::findOrFail($this->gen_id);
        $genero->update([
            'gen_nombre' => $this->gen_nombre,
        ]);

        session()->flash('message', 'Género actualizado exitosamente.');
        $this->resetFields();
    }

    public function delete($id)
    {
        Genero::destroy($id);
        session()->flash('message', 'Género eliminado exitosamente.');
    }

    public function render()
    {
        return view('livewire.generos', [
            'generos' => Genero::all(),
        ]);
    }
}