<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Alquileres</h1>
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Socio</th>
                    <th class="border border-gray-300 px-4 py-2">Película</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha Inicio</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha Fin</th>
                    <th class="border border-gray-300 px-4 py-2">Valor</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha Entrega</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alquileres as $alquiler)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $alquiler->socio->soc_nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $alquiler->pelicula->pel_nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $alquiler->fecha_alquiler_inicio }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $alquiler->fecha_alquiler_final }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $alquiler->valor_alquiler }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $alquiler->fecha_entrega }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

