<!DOCTYPE html>
<html lang="en">
<body>
    <div class="p-4">
        <div class="mb-4 flex justify-between">
            <h1 class="text-2xl font-bold">Gestión de Actores en Películas</h1>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                wire:click="openModal"
            >
                Nuevo Registro
            </button>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Actor</th>
                    <th class="border border-gray-300 px-4 py-2">Película</th>
                    <th class="border border-gray-300 px-4 py-2">Papel</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($actorPeliculas as $relacion)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $relacion->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $relacion->actor->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $relacion->pelicula->titulo }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $relacion->actor_papel }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded"
                                wire:click="edit({{ $relacion->id }})"
                            >
                                Editar
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded"
                                wire:click="delete({{ $relacion->id }})"
                            >
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No se encontraron registros.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $actorPeliculas->links() }}

        @if ($isOpen)
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded shadow-lg w-1/3">
                    <h2 class="text-xl font-bold mb-4">{{ $actorPeliculaId ? 'Editar Relación' : 'Nueva Relación' }}</h2>
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label class="block text-gray-700">Actor</label>
                            <select wire:model="actor_id" class="w-full border border-gray-300 rounded px-4 py-2">
                                <option value="">Seleccione un actor</option>
                                @foreach ($actores as $actor)
                                    <option value="{{ $actor->actor_id }}">{{ $actor->nombre }}</option>
                                @endforeach
                            </select>
                            @error('actor_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Película</label>
                            <select wire:model="pel_id" class="w-full border border-gray-300 rounded px-4 py-2">
                                <option value="">Seleccione una película</option>
                                @foreach ($peliculas as $pelicula)
                                    <option value="{{ $pelicula->pel_id }}">{{ $pelicula->titulo }}</option>
                                @endforeach
                            </select>
                            @error('pel_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Papel</label>
                            <input type="text" wire:model="actor_papel" class="w-full border border-gray-300 rounded px-4 py-2">
                            @error('actor_papel') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="button" wire:click="closeModal" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded mr-2">
                                Cancelar
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>

</body>
</html>