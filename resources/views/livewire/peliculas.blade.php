<!DOCTYPE html>
<html lang="en">
<body>
    <div class="p-4">
        <div class="mb-4 flex justify-between">
            <h1 class="text-2xl font-bold">Gestión de Películas</h1>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                wire:click="openModal"
            >
                Nueva Película
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
                    <th class="border border-gray-300 px-4 py-2">Director</th>
                    <th class="border border-gray-300 px-4 py-2">Formato</th>
                    <th class="border border-gray-300 px-4 py-2">Costo</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha Estreno</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peliculas as $pelicula)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $pelicula->pel_id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $pelicula->director->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $pelicula->formato->descripcion }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $pelicula->costo }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $pelicula->fecha_estreno }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button
                                class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded"
                                wire:click="edit({{ $pelicula->pel_id }})"
                            >
                                Editar
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded"
                                wire:click="delete({{ $pelicula->pel_id }})"
                            >
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No se encontraron películas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $peliculas->links() }}

        @if ($isOpen)
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded shadow-lg w-1/3">
                    <h2 class="text-xl font-bold mb-4">{{ $peliculaId ? 'Editar Película' : 'Nueva Película' }}</h2>
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label class="block text-gray-700">Director</label>
                            <select wire:model="dir_id" class="w-full border border-gray-300 rounded px-4 py-2">
                                <option value="">Seleccione un director</option>
                                @foreach ($directores as $director)
                                    <option value="{{ $director->dir_id }}">{{ $director->nombre }}</option>
                                @endforeach
                            </select>
                            @error('dir_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Formato</label>
                            <select wire:model="for_id" class="w-full border border-gray-300 rounded px-4 py-2">
                                <option value="">Seleccione un formato</option>
                                @foreach ($formatos as $formato)
                                    <option value="{{ $formato->for_id }}">{{ $formato->descripcion }}</option>
                                @endforeach
                            </select>
                            @error('for_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Costo</label>
                            <input type="text" wire:model="costo" class="w-full border border-gray-300 rounded px-4 py-2">
                            @error('costo') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Fecha de Estreno</label>
                            <input type="date" wire:model="fecha_estreno" class="w-full border border-gray-300 rounded px-4 py-2">
                            @error('fecha_estreno') <span class="text-red-500">{{ $message }}</span> @enderror
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