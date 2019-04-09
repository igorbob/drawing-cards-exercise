<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Game has an id, a SelectedPlayingCard and a deck

class Game extends Model
{
  protected $fillable = ['turn'];

  protected $primaryKey = 'id';

  public function deck() {
    return $this->hasOne('App\Deck');
  }
  public function selected_card() {
    return $this->hasOne('App\PlayingCard');
  }
}
