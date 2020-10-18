<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DistributeCardRequest;


class PlayCardsController extends Controller
{
	/*
	Distribute card to a number of player
	$request number_of_player rules = required|numeric|min:1
	*/
    public function DistributeCards(DistributeCardRequest $request){

    	$decksOfCard = $this->DecksOfCard();
    	$numberOfPlayer = $request->number_of_player;

    	// chunk the deskOfCard array by number of player
    	$distributedCards = array_chunk($decksOfCard, floor(count($decksOfCard) / $numberOfPlayer) > 0? floor(count($decksOfCard) / $numberOfPlayer) : 1);

    	$response = array();

    	for($i = 0; $i < $numberOfPlayer; $i ++){ // process the distributed card with comma separated for each play
    		$player = $i + 1;
    		if(array_key_exists($i,$distributedCards)){
    			$response["player"][$player] = implode (",", $distributedCards[$i]);
    			unset($distributedCards[$i]);
    		}else{// if no more card
    			$response["player"][$player] = "No card given";
    		}
    	}

    	// to count the remainder after the card has been distributed evenly
    	$remainder = array();
    	foreach($distributedCards as $extra){
    		foreach($extra as $card){
				array_push($remainder, $card);
    		}
    	}

    	$response["remainder"] = implode (",", $remainder);

    	return $response;
    }

    /*
	Generate 52 playing cards and shuffle it
    */
    public function DecksOfCard(){
    	$suits = array('C', 'D', 'H', 'S');
    	$cards = array('A', 2, 3, 4, 5, 6, 7, 8, 9, 'X', 'J', 'Q', 'K');
    	$deck = array();

    	for($i = 0; $i < 52; $i++){
    		array_push($deck, $suits[$i % 4] .'-'. $cards[$i / 4]);
    	}

    	shuffle($deck);
    	return $deck;
    }
}
