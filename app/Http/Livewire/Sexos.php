<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sexo;

class Sexos extends Component
{
    public $sex_id, $sex_nombre;
    public $isEditMode = false;

    protected $rules = [
        'sex_nombre' => 'required|string|max:60',
    ];

    public function resetFields()
    {
        $this->sex_id = null;
        $this->sex_nombre = '';
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        Sexo::create([
            'sex_nombre' => $this->sex_nombre,
        ]);

        session()->flash('message', 'Sexo creado exitosamente.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $sexo = Sexo::findOrFail($id);
        $this->sex_id = $sexo->sex_id;
        $this->sex_nombre = $sexo->sex_nombre;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();

        $sexo = Sexo::findOrFail($this->sex_id);
        $sexo->update([
            'sex_nombre' => $this->sex_nombre,
        ]);

        session()->flash('message', 'Sexo actualizado exitosamente.');
        $this->resetFields();
    }

    public function delete($id)
    {
        Sexo::destroy($id);
        session()->flash('message', 'Sexo eliminado exitosamente.');
    }

    public function render()
    {
        return view('livewire.sexos', [
            'sexos' => Sexo::all(),
        ]);
    }
}