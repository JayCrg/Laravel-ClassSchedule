<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hours') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="/horas/crear">Crear Hora</a>
                    <table>
                        <tr>
                            <th>Asignatura</th>
                            <th>Dia hora</th>
                            <th>Tramo horario</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach ($horas as $hora)
                        <tr>
                            <td>{{ $hora->codAs }}</td>
                            <td>{{ $hora->diaH }}</td>
                            <td>{{ $hora->horaH }}</td>
                            <td>
                                <a href="/horas/editar/{{$hora->codAs}}">Editar</a>
                                <a href="/horas/borrar/{{$hora->codAs}}" onclick="return eliminarHora('Eliminar Hora')"> Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>   
                </div>
            </div>
        </div>
    </div>
    <script>
        function eliminarHora() {
            return confirm("¿Estás seguro de que quieres eliminar esta hora?");
        }
    </script>
</x-app-layout>
