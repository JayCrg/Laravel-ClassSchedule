<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 align-items-center">
        <h2>Nuevo Asignaturas</h2><br><br>
        <form action="/asignaturas-crear" method ="POST">
            @csrf
            <label>Nombre Asignatura:</label>
            <input type="text" name="nombreAs" placeholder="Nombre" value="{{ old('nombreAs')}}">
            @error('nombreAs')
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <label>Nombre Corto As</label>
            <input type="text" name="nombreCortoAs" placeholder="Abreviacion" value="{{ old('nombreCortoAs')}}">
            @error('nombreCortoAs')
            <br><br>
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <label>Profesor</label>
            <input type="text" name="profesorAs" placeholder="Profesor" value="{{ old('profesorAs')}}">
            @error('profesorAs')
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <label>Color</label>
            <input type="text" name="colorAs" placeholder="Color" value="{{ old('colorAs')}}">
            @error('colorAs')
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="submit" value="Guardar">
        </form>
    </div>
    </div>
</x-app-layout>