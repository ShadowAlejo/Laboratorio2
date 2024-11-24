<?php

namespace App\Http\Livewire;

use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class Socios extends Component
{
    use WithPagination;

    public $soc_id, $soc_cedula, $soc_nombre, $soc_direccion, $soc_telefono, $soc_correo;
    public $updateMode = false;

    protected $rules = [
        'soc_cedula' => 'required|max:10|unique:socios,soc_cedula',
        'soc_nombre' => 'required|max:60',
        'soc_direccion' => 'nullable|max:60',
        'soc_telefono' => 'nullable|max:10',
        'soc_correo' => 'nullable|email|max:60',
    ];

    public function render()
    {
        return view('livewire.socios', ['socios' => Socio::paginate(10)]);
    }

    public function resetInputFields()
    {
        $this->soc_id = null;
        $this->soc_cedula = null;
        $this->soc_nombre = null;
        $this->soc_direccion = null;
        $this->soc_telefono = null;
        $this->soc_correo = null;
    }

    public function store()
    {
        $this->validate();
        Socio::create($this->validate());
        session()->flash('message', 'Socio creado con éxito.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $socio = Socio::findOrFail($id);
        $this->soc_id = $socio->soc_id;
        $this->soc_cedula = $socio->soc_cedula;
        $this->soc_nombre = $socio->soc_nombre;
        $this->soc_direccion = $socio->soc_direccion;
        $this->soc_telefono = $socio->soc_telefono;
        $this->soc_correo = $socio->soc_correo;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();
        $socio = Socio::findOrFail($this->soc_id);
        $socio->update($this->validate());
        session()->flash('message', 'Socio actualizado con éxito.');
        $this->resetInputFields();
        $this->updateMode = false;
    }

    public function delete($id)
    {
        Socio::findOrFail($id)->delete();
        session()->flash('message', 'Socio eliminado con éxito.');
    }
}
