<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
      @isset($card)
        <img src = "{{ asset($img_src) }}" />
        <p> {{$card->suit.$card->value}} </p>
      @endisset
      <a href="{{ route('draw_a_card', ['game_id' => $game->id]) }}" >
        draw a card
      </a>
      <p> {{round($probability)}}% chance of getting {{$game->selected_card}} </p>

    </body>
</html>
