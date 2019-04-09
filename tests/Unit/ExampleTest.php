<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\GameController;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProbabilityCalculation()
    {
       $g_c = new GameController;
        $turn_1 = $g_c->get_probability(1); // probability 1 in 52: 2%
        $turn_51 = $g_c->get_probability(51);// probability 1 in 2: 50%
        $turn_52 = $g_c->get_probability(52);// probability 1 in 1: 100%
        $this->assertEquals($turn_1, 1.9);
        $this->assertEquals($turn_51, 50.0);
        $this->assertEquals($turn_52, 100.0);
    }
}
