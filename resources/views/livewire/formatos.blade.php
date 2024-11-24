<!DOCTYPE html>
<html lang="en">
<body>
    <div>
        <h1>Gestión de Formatos</h1>

        @if(session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <!-- Formulario -->
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
            <input wire:model="for_nombre" type="text" placeholder="Nombre del Formato">
            @error('for_nombre') <span class="error">{{ $message }}</span> @enderror
            <button type="submit">{{ $updateMode ? 'Actualizar' : 'Guardar' }}</button>
        </form>

        <!-- Lista de formatos -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formatos as $formato)
                    <tr>
                        <td>{{ $formato->for_id }}</td>
                        <td>{{ $formato->for_nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $formato->for_id }})">Editar</button>
                            <button wire:click="delete({{ $formato->for_id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $formatos->links() }}
    </div>
</body>
</html>