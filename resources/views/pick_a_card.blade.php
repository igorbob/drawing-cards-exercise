<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pick a card</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('/img/bg.png');
                background-color: #1E640F;
                color: #f2fcef;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
            }
            .card {
              width: 125px;
              height: 188px;
            }
        </style>
    </head>
    <body>
      <h1> Pick a card: </h1>
      @foreach( $card_options as $card => $card_src )
        <span class=card>
          <a href="{{ route('initialize_game', ['chosen_card' => $card]) }}" >
            <img src = "{{ asset($card_src) }}" />
          </a>
        </span>
      @endforeach
    </body>
</html>
