<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }


    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <form action="/picture/store" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <p>
            <label>Descrição:</label>
            <input type="text" name="description" id="descripton">
        </p>
        <p>
            <label>Imagem:</label>
            <input type="file" name="img" id="img">
        </p>
        <button>Criar</button>
    </form>
    <br />
    <br style="clear: inherit" />
    @foreach($model as $item)
        <div>
            <img src="/picture/view/{{$item->id}}" border="0" width="100px" height="100px;">
        </div>
    @endforeach
</div>
</body>
</html>
