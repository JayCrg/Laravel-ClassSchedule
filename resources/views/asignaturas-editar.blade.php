<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>Editar Asignatura</h2><br><br>
            <form action="/asignaturas-editar/{{ $asignatura->codAs }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <label>Nombre:</label>
                <input type="text" name="nombreAs" placeholder="Nombre" value="{{ $asignatura->nombreAs }}">
                <br><br>
                <label>Nombre Corto:</label>
                <input type="text" name="nombreCortoAs" placeholder="Abreviacion" value="{{ $asignatura->nombreCortoAs }}">
                <br><br>
                <label>Profesor:</label>
                <input type="text" name="profesorAs" placeholder="Profesor" value="{{ $asignatura->profesorAs }}">
                <br><br>
                <label>Color:</label>
                <td>
                    <div style="background-color: {{{$asignatura->colorAs }}}; width: 50px; height: 50px; border-radius: 50%;"></div>
                </td>
                <input type="text" name="colorAs" placeholder="Color" value="{{ $asignatura->colorAs }}">
                <br><br>
                <input type="hidden" name="codAs" value="{{ $asignatura->codAs }}">
                <input type="submit" value="Guardar">
            </form>
</div>
        </div>
</x-app-layout>