<!DOCTYPE>
<html>
<body>

@if(isset($record))
    <div style="background:green; color:white"> Sėkmingai įrašyta!</div>
@endif

@if(isset($error))

    @foreach($error as $err)
        <div style="background:red; color:white"> {{$err}}!</div>
        @endforeach

@endif



{!! Form::open(['url' => route('make-pizza')]) !!}
<br>
{{ Form::label('type_id','Pasirinkite picos padą') }}
{{ Form::select('type_id',$type) }}<br>
<br>
{{ Form::label('cheese_id','Pasirinkite sūrio pagardą') }}
{{ Form::select('cheese_id',['default'=>'Pasirinkite..']+$cheese) }}<br><br>


{{ Form::label('ingridient','Išsirinkite iki TRIJŲ ingridientų') }}<br>

@foreach($ingridient as $key => $oneingridient)
    <label>
        {{ Form::checkbox('ingridient[]', $key) }}
        {{$oneingridient}}
    </label><br>
@endforeach

<br>
<br>
{{ Form::label('contacts', 'Nurodykite kontaktinę informaciją')}}<br>
{{Form::text('contacts')}}

<br>
<br>


{{ Form::submit('Patvirtinti') }}

{!! Form::close() !!}



</body>
</html>