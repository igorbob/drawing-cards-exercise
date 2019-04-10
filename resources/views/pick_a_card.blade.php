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
                margin: 0;
            }
            .card {
              width: 125px;
              height: 188px;
            }
        </style>
    </head>
    <body>
      <h1> Pick a card: </h1>

      <form action="{{ route('initialize_game',['chosen_card' => $_POST['suit'] . $_POST['value']]) }}" method="post">
        <p> suit </p>
        <select name="suit">
            <option selected="selected">C</option>
            <option>D</option>
            <option>H</option>
            <option>S</option>
        </select>
        <p> value </p>
        <select name="value">
            <option selected="selected">A</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>J</option>
            <option>Q</option>
            <option>K</option>
        </select>
        <input type="submit">
      <input type="submit" value="Submit">

      @foreach( $card_options as $card => $card_src )
        <span class=card>
          <a href="{{ route('initialize_game', ['chosen_card' => $card]) }}" >
            <img src = "{{ asset($card_src) }}" />
          </a>
        </span>
      @endforeach
    </body>
</html>
