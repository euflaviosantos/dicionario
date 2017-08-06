<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dicio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/estilo.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
        <script src="/js/jqcloud/jqcloud.min.js"></script>
        <link rel="stylesheet" href="/css/jqcloud/jqcloud.min.css">

        <script>
            $(function(){
                $('#corpo').jQCloud([
                    @foreach(App\Palavra::all() as $cada)
                    {text:"{{$cada->palavra}}", weight: {{$cada->relevancia}}, link: "{{action('PalavraController@traduzir', ['palavra'=>$cada->palavra])}}"},
                    @endforeach
]);
            });
        </script>
    </head>
    
    <body>
        <div class="box topo">
            <form id="formulario" class="formulario" method="get" action="{{action('PalavraController@traduzir')}}">
                <input class="palavra" value="{{$palavra->palavra or ''}}" type="text" name="palavra" placeholder="En" onfocus="limpa()"></input>
                <input id="significado" class="palavra" value=""  type="text" name="significado" placeholder="{{$palavra->significado or 'Pt'}}"></input>
                <input class="palavra" type="submit" value="Go!">
            </form>
        </div>
        <div id="corpo" class="box corpo">

        </div>
    </body>
</html>
