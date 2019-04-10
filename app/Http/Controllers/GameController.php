<?php

namespace App\Http\Controllers;

use App\Deck;
use App\PlayingCard;
use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private $suits = array('C', 'D', 'H', 'S');
    private $values = array('A','2','3','4','5','6','7','8','9','10','J','Q','K');

    public function pick_a_card() // return
    {
      $card_options = array();
      foreach($this->suits as $Suit) {
        foreach ($this->values as $Value) {
          $card_options[$Suit.$Value] = $this->card_img_src($Suit, $Value);
        }
      }
      return view('pick_a_card', ['card_options' => $card_options]);
    }

    public function initialize_game($selected_card,$selected_card_img) //
    {
      $game = new Game();
      $game->selected_card = $selected_card;
      $suit_value = $this->suit_and_value($selected_card);
      $game->selected_card = $this->card_img_src();

      $deck = new Deck();
      $deck->save();
      $deck->initializeDeck();
      $game->deck_id = $deck->id;
      $game->turn = 1;
      $game->save();
      $probability = $this->get_probability($game->turn);

      return view('draw_a_card', ['game' => $game,
                                  'probability' => $probability ]);
    }

    public function draw_a_card(Request $request)
    {
        $game = Game::find($request->game_id);
        $deck = Deck::find($game->deck_id);
        $card = $deck->cards()->where('position', $game->turn)->first();


        if( $card->toString() == $game->selected_card ) {
          $probability = $this->get_probability($game->turn);
          return view('found_it', [ 'probability' => $probability,
                                    'card' => $card ]);
        }
        $img_src = $this->card_img_src($card->suit, $card->value);

        $game->turn = $game->turn + 1;
        $probability = $this->get_probability($game->turn);
        $game->save();

        return view('draw_a_card', [ 'game' => $game,
                                     'card' => $card,
                                     'img_src' => $img_src,
                                     'probability' => $probability ]); // + add probability !
    }

    public function get_probability($turn) {
        $probability = (1 / (53 - $turn)) * 100;
        return round($probability, 1);
    }

    public function suit_and_value($card)
    {
      $suit = substr($card, 0,1);
      $value = substr($card, 1);
      return [ 'suit' => $suit, 'value' => $value ];
    }

    public function card_img_src($suit, $value)
    {
      $suit_name = 'spades';
      $value_name = $value;
      switch( $suit ) {
        case 'C': $suit_name = 'clubs'; break;
        case 'D': $suit_name = 'diamonds'; break;
        case 'H': $suit_name = 'hearts'; break;
      };
      switch( $value ) {
        case 'A': $value_name = 'ace'; break;
        case 'J': $value_name = 'jack'; break;
        case 'Q': $value_name = 'queen'; break;
        case 'K': $value_name = 'king'; break;
      }
      return '/img/' . $value_name . '_of_' . $suit_name . '.png';
    }
  }
