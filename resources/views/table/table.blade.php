
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" type="text/css" href="/tablet/style.css">
    <title>Таблица</title>
    <style>

        body {

            margin:15px;
            padding: 0;
        }

        table {
            width: 60%; /*Ширина таблицы*/
            margin-bottom: 18px; /*Отступ снизу от таблицы*/
            padding: 0; /*Отступы внутри таблицы*/
            font-size: 14px; /*Размер шрифта*/
            border: 1px solid black; /*Граница таблицы*/
            border-spacing: 0; /*Отступы между границами ячеек*/
            border-collapse: separate; /*Границы ячеек не склеиваются*/
            -webkit-border-radius: 5px; /*Радиус скругления углов у таблицы Safari, Chrome*/
            -moz-border-radius: 5px; /*Радиус скругления углов у таблицы Mozilla*/
            border-radius: 5px; /*Радиус скругления углов у таблицы*/
            color: black; /*Цвет текста в таблице*/
            font-family: Arial; /*Семейство шрифтов*/
        }




        table thead { border: solid 1px black;}
        table tbody { border: solid 1px black;}


        table tr:hover {
            background-color: #f2f2f2; /*Цвет строки при наведении курсора мыши*/
            border: solid 1px black;

        }
        .container {
            min-height: 150px;
            padding: 10px;
        }
        table td,th { border: solid 1px black;
        }




        /*Подсветка нечетных строк в таблице*/
        /*table tbody tr:nth-child(odd) td  {
            background-color: #f8f8f8;
        }
        */
    </style>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

</head>
<script language="JavaScript">
    if (top.location.search=="") {
        pass = prompt('Введите пароль');
        if (pass=='123456qqww') // Ваш пароль акивации
        {  } else {top.location.href="errorpas.htm" }//Адрес страниц на которую перейдет пользователь при ошибке
    };
</script>

<body>
<form>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<table>
    <thead>
    <tr>
        @foreach($tableEx as $tablica)
        <td align="center" width="94" height="30" bgcolor="#bdb7b7"> {{$tablica}}</td>
        @endforeach
    </tr>
    </thead>

    <tbody>
    @foreach($tableEc as $tablicaExcel)
    <tr>
        @foreach($tablicaExcel as $key=>$excelTable)
            @if($key != 'id' && $key != 'created_at' && $key != 'updated_at	')
        <th width="94" height="30">  <input name="{{$key}}[{{$tablicaExcel['id']}}]" value="{{$excelTable}}" onchange="saveTable(this)"></th>
            @endif
        @endforeach
    </tr>
    @endforeach

    </tbody>
    <script>
        function saveTable(object){
            var nameTab = object.name;
            var data = {
                "_token": $('#token').val()
            };
            data [nameTab] = object.value;
            $.ajax({
                type:'POST',
                url:'{{route('table_save_complete')}}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:data,
                success:function(data){
                    console.log(data);
                }
            });
        }
    </script>
</table>

    </form>
</body>
</html>

