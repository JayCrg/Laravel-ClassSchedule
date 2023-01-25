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
            <form action="/horas/editar/{{ $hora->codAs }}/{{ $hora->diaH }}/{{ $hora->horaH }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <label>Dia de la semana:</label>
            <select name="diaH" id="diaH">
                <option value="Lunes" {{$hora->diaH =="Lunes"?'selected':''}}>Lunes</option>
                <option value="Martes" {{$hora->diaH =="Martes"?'selected':''}}>Martes</option>
                <option value="Miercoles" {{$hora->diaH =="Miercoles"?'selected':''}}>Miercoles</option>
                <option value="Jueves" {{$hora->diaH =="Jueves"?'selected':''}}>Jueves</option>
                <option value="Viernes" {{$hora->diaH =="Viernes"?'selected':''}}>Viernes</option>
            </select>
            @error('diaH')
            <p style="color:red">{{ $message }}</p>
            @enderror
            <br><br>
            <label>Tramo horario</label>
            <select name="horaH" id="horaH">
                <option value="8:15-9:15" {{$hora->horaH =="8:15-9:15"?'selected':''}}>8:15-9:15</option>
                <option value="9:15-10:15" {{$hora->horaH=='10:15-11:15'?'selected':''}}>9:15-10:15</option>
                <option value="10:15-11:15" {{$hora->horaH=='10:15-11:15'?'selected':''}}>10:15-11:15</option>
                <option value="11:15-12:45" {{$hora->horaH=='11:15-12:45'?'selected':''}}>11:45-12:45</option>
                <option value="12:45-13:45" {{$hora->horaH=='12:45-13:45'?'selected':''}}>12:45-13:45</option>
                <option value="13:15-14:45" {{$hora->horaH=='13:15-14:45'?'selected':''}}>13:45-14:45</option>
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
                    <option value="{{ $asignatura->codAs }}" {{$hora->codAs ==$asignatura->codAs?'selected':''}}>{{ $asignatura->nombreAs }}</option>
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