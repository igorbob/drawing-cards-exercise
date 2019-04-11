<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PlayingCard;

class Deck extends Model
{
	protected $primaryKey = 'id';

	private $suits = array('C', 'D', 'H', 'S');
	private $values = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');

	public function cards() {
		return $this->hasMany('App\PlayingCard');
	}

	public function initializeDeck() {
		$order = range(1,52);
		shuffle($order);
		foreach($this->suits as $Suit) {
			foreach($this->values as $Value) {
				$card = new PlayingCard();
				$card->suit = $Suit;
				$card->value = $Value;
				$card->deck_id = $this->id;
				$card->position = array_pop($order);
				$card->save();
			}
		}
	}
}
