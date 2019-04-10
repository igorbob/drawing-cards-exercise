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
            .card {
              height: 182px;
            }
            #info p {
              text-align: center;
              color: white;
              font-size: 14pt;
            }
        </style>
    </head>
    <body>
      <div class=cards>
        <div class=stack>
          <div class=card>
            <a href="{{ route('draw_a_card', ['game_id' => $game->id]) }}" >
              <img src = "{{ asset('/img/back.png') }}" />
            </a>
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
            <img src = "{{ asset($game->selected_card_img_src) }}" />
          </div>
        </div>
      </div>
      <div id=info>
        @if ($is_match)
          <script> alert("Got it, the chance was {{$probability}}%") </script>
          <a href="{{ route('pick_a_card')}}" >
            Back to picking a card.
          </a>
        @else
          <a href="{{ route('draw_a_card', ['game_id' => $game->id]) }}" >
            draw a card
          </a>
          <p> {{$probability}}% chance of getting {{$game->selected_card}} </p>
        @endif
      </div>
    </body>
</html>
