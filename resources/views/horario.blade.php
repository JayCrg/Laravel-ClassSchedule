<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <tr>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                        </tr>
                        @foreach ($Horas as $hora)
                        <tr>
                            <td>{{ $hora->codAs }}</td>
                            <td>{{ $hora->codAs }}</td>
                            <td>{{ $hora->codAs }}</td>
                            <td>{{ $hora->codAs }}</td>
                            <td>
                                <a href="/asignatura/ver/{{$alumno->id}}">Ver</a>
                                <a href="/asignatura/editar/{{$alumno->id}}">Editar</a>
                                <a href="/asignatura/eliminar/{{$alumno->id}}" onclick="return eliminarAlumno('Eliminar Alumno')"> Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


