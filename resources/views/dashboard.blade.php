<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-100 min-h-screen">
        <h1 class="text-4xl font-bold text-center mb-8">Dashboard de Administración</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Alquileres -->
            <a href="{{ route('alquileres.index') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Alquileres</h2>
                <p class="text-gray-600">Gestión de alquileres de películas.</p>
            </a>

            <!-- Películas -->
            <a href="{{ route('peliculas') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Películas</h2>
                <p class="text-gray-600">Gestión de películas disponibles.</p>
            </a>

            <!-- Actor Película -->
            <a href="{{ route('actor-pelicula') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Actor - Película</h2>
                <p class="text-gray-600">Relaciones entre actores y películas.</p>
            </a>

            <!-- Socios -->
            <a href="{{ route('socios') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Socios</h2>
                <p class="text-gray-600">Gestión de socios del sistema.</p>
            </a>

            <!-- Directores -->
            <a href="{{ route('directores') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Directores</h2>
                <p class="text-gray-600">Gestión de directores de películas.</p>
            </a>

            <!-- Formatos -->
            <a href="{{ route('formatos') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Formatos</h2>
                <p class="text-gray-600">Gestión de formatos de películas.</p>
            </a>

            <!-- Géneros -->
            <a href="{{ route('generos') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Géneros</h2>
                <p class="text-gray-600">Gestión de géneros cinematográficos.</p>
            </a>

            <!-- Sexos -->
            <a href="{{ route('sexos') }}"
                class="block p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-600">Sexos</h2>
                <p class="text-gray-600">Gestión de sexos.</p>
            </a>
        </div>
    </div>
</x-app-layout>
