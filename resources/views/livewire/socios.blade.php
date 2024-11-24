<!DOCTYPE html>
<html lang="en">
<body>
    <div>
        <h1>Gestión de Socios</h1>

        @if(session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <!-- Formulario -->
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
            <input wire:model="soc_cedula" type="text" placeholder="Cédula">
            <input wire:model="soc_nombre" type="text" placeholder="Nombre">
            <input wire:model="soc_direccion" type="text" placeholder="Dirección">
            <input wire:model="soc_telefono" type="text" placeholder="Teléfono">
            <input wire:model="soc_correo" type="email" placeholder="Correo">
            <button type="submit">{{ $updateMode ? 'Actualizar' : 'Guardar' }}</button>
        </form>

        <!-- Lista de socios -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($socios as $socio)
                    <tr>
                        <td>{{ $socio->soc_id }}</td>
                        <td>{{ $socio->soc_cedula }}</td>
                        <td>{{ $socio->soc_nombre }}</td>
                        <td>{{ $socio->soc_direccion }}</td>
                        <td>{{ $socio->soc_telefono }}</td>
                        <td>{{ $socio->soc_correo }}</td>
                        <td>
                            <button wire:click="edit({{ $socio->soc_id }})">Editar</button>
                            <button wire:click="delete({{ $socio->soc_id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>