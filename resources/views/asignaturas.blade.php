<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- tabla de asignaturas del usuario -->
                <div class="p-6 text-gray-900">
                    <a href="/asignaturas-crear">Crear asignatura</a>
                    <table>
                        <tr>
                            <th>Código de asignatura</th>
                            <th>Nombre</th>
                            <th>Nombre Corto</th>
                            <th>Profesor</th>
                            <th>Color</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach ($asignaturas as $asignatura)
                        <tr>
                            <td>{{ $asignatura->codAs }}</td>
                            <td>{{ $asignatura->nombreAs }}</td>
                            <td>{{ $asignatura->nombreCortoAs }}</td>
                            <td>{{ $asignatura->profesorAs }}</td>
                            <td>
                                <div style="background-color: {{{$asignatura->colorAs }}}; width: 50px; height: 50px; border-radius: 50%;"></div>
                            </td>
                            <td>
                                <a href="/asignaturas-editar/{{$asignatura->codAs}}">Editar</a>
                                <a href="/asignaturas-borrar/{{$asignatura->codAs}}" onclick="return eliminarAsignatura('Eliminar Asignatura')"> Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function eliminarAsignatura() {
            return confirm("¿Estás seguro de que quieres eliminar esta asignatura?");
        }
    </script>
</x-app-layout>