<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 align-items-center">
        <h2>Nuevo Asignaturas</h2><br><br>
        <form action="/horas/crear" method ="POST">
            @csrf
            <label>Dia de la semana:</label>
            <select name="diaH" id="diaH">
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miercoles">Miercoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
            </select>
            @error('diaH')
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <label>Tramo horario</label>
            <select name="horaH" id="horaH">
                <option value="8:15-9:15">8:15-9:15</option>
                <option value="9:15-10:15">9:15-10:15</option>
                <option value="10:15-11:15">10:15-11:15</option>
                <option value="11:15-12:45">11:45-12:45</option>
                <option value="12:45-13:45">12:45-13:45</option>
                <option value="13:15-14:45">13:45-14:45</option>
            </select>
            @error('horaH')
            <br><br>
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <label>Asignatura</label>
            <!-- select con las asignaturas del usuario -->
            <select name="codAs" id="codAs">
                @foreach ($asignaturas as $asignatura)
                    <option value="{{ $asignatura->codAs }}">{{ $asignatura->nombreAs }}</option>
                @endforeach
            @error('codAs')
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="submit" value="Guardar">
        </form>
    </div>
    </div>
</x-app-layout>