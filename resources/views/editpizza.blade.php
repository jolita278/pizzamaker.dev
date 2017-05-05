<!DOCTYPE>
<html>
<body>

@if(isset($success_message))

    @foreach($success_message as $message)
        <div style="background:green; color:white"> {{$message}}!</div>
    @endforeach
@endif

@if(isset($error))

    @foreach($error as $err)
        <div style="background:red; color:white"> {{$err}}!</div>
    @endforeach

@endif

{!! Form::open(['url' => route('store-pizza')]) !!}
<br>

{{ Form::label('type_id','Pasirinkite picos padą') }}
{{ Form::select('type_id',$type,['id' => $item['type']['id']]) }}<br>
<br>
{{ Form::label('cheese_id','Pasirinkite sūrio pagardą') }}
{{ Form::select('cheese_id',['default'=>'Pasirinkite..']+$cheese, ['id' => $item['cheese']['id']]) }}<br><br>


{{ Form::label('ingridient','Išsirinkite iki TRIJŲ ingridientų') }}<br>

@foreach($ingridient as $key => $oneingridient)

    @if(in_array($key, $ingridientsItems))
        {{ Form::checkbox('ingridient[]', $key, true)}}
    @else()
        {{ Form::checkbox('ingridient[]', $key)}}
    @endif()
    {{$oneingridient}}<br>
        
@endforeach

<br>
<br>
{{ Form::label('contacts', 'Nurodykite kontaktinę informaciją')}}<br>
{{ Form::text('contacts',$item['contacts'])}}

<br>
<br>

{{ Form::submit('Patvirtinti') }}

{!! Form::close() !!}

</body>
</html>