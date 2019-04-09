<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Draw a card</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('/img/bg.png');
                background-color: #1E640F;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .cards {
              display: flex;
              justify-content: center;
              align-items: flex-end;
              height: 66vh;
            }
            .stack {
              display: flex;
              flex-direction: column;
              width: 125px;
              margin: 30px;
            }
        </style>
    </head>
    <body>
      <div class=cards>
        <div class=stack>
          <div class=card>
            <img src = "{{ asset('/img/back.png') }}" />
          </div>
          @for ( $i = 0; $i < 54 - $game->turn; $i++)
            <img src = "{{ asset('/img/strip.png') }}" />
          @endfor
        </div>
        <div class=stack>
          <div class=card>
            @isset($card)
              <img src = "{{ asset($img_src) }}" />
            @endisset
          </div>
          @for ( $i = 0; $i < $game->turn - 2; $i++)
            <img src = "{{ asset('/img/strip.png') }}" />
          @endfor
        </div>
        <div class=stack>
          <div class=card>
            <img src = "{{ asset('/img/back.png') }}" />
          </div>
        </div>
      </div>
      <a href="{{ route('draw_a_card', ['game_id' => $game->id]) }}" >
        draw a card
      </a>
      <p> {{$probability}}% chance of getting {{$game->selected_card}} </p>

    </body>
</html>
