<!DOCTYPE>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<html>
<body>

<table>
    <tr>Picų sąrašas <tr/>
    <tr><th>
            Užsakymo numeris
        </th>
        <th>
            Kontaktiniai duomenys
        </th>
        <th>
            Picos padas
        </th>
        <th>
            Picos sūris
        </th>
        <th>
            Picos ingridientai
        </th>
        <th>
            Viso kalorijų
        </th>
        <th></th>
    </tr>
    @foreach($list as $pizza)
        <tr>
            <td>{{$pizza['count']}}</td>
            <td>{{$pizza['contacts']}}</td>
            <td>{{$pizza['type']['name']}}</td>
            <td>{{$pizza['cheese']['name']}}</td>
            <td>
                @foreach ($pizza['conn_pizza_ingridients'] as $ingredient)
                    {{$ingredient['ingridient']['name']}}<br/>
                @endforeach
            </td>
            <td>Viso kaloriju...</td>
            <td><a href="{{ action('PizzaController@edit',$pizza['id']) }}"><button>Peržiūrėti</button></a></td>
        </tr>
    @endforeach
</table>
</body>
</html>