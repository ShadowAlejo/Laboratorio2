<!DOCTYPE html>
<html lang="en">
<body>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Gestión de Géneros</h2>

        <!-- Formulario -->
        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="mb-4">
            <div class="mb-4">
                <label for="gen_nombre" class="block text-sm font-medium text-gray-700">Nombre del Género</label>
                <input type="text" id="gen_nombre" wire:model="gen_nombre"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('gen_nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                {{ $isEditMode ? 'Actualizar' : 'Crear' }}
            </button>
            @if($isEditMode)
            <button type="button" wire:click="resetFields"
                class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 ml-2">Cancelar</button>
            @endif
        </form>

        <!-- Tabla -->
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($generos as $genero)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $genero->gen_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $genero->gen_nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button wire:click="edit({{ $genero->gen_id }})"
                            class="text-indigo-600 hover:text-indigo-900">Editar</button>
                        <button wire:click="delete({{ $genero->gen_id }})"
                            class="text-red-600 hover:text-red-900 ml-2">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
        @endif
    </div>
</body>
</html>