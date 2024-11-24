<!DOCTYPE html>
<html lang="en">
<body>
    <div>
        <h1>Gestión de Directores</h1>

        @if(session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <!-- Formulario -->
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
            <input wire:model="dir_nombre" type="text" placeholder="Nombre del Director">
            @error('dir_nombre') <span class="error">{{ $message }}</span> @enderror
            <button type="submit">{{ $updateMode ? 'Actualizar' : 'Guardar' }}</button>
        </form>

        <!-- Lista de directores -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($directores as $director)
                    <tr>
                        <td>{{ $director->dir_id }}</td>
                        <td>{{ $director->dir_nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $director->dir_id }})">Editar</button>
                            <button wire:click="delete({{ $director->dir_id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $directores->links() }}
    </div>
</body>
</html>