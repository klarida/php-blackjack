
<?php

class Player
{
    private $cards = [];
    private bool $lost = false;
    const MAGICAL_VAL = 21;


    public function __construct(Deck $deck)
    {
        array_push($this->cards,$deck->drawCard());
        array_push($this->cards,$deck->drawCard());
    }

    public function hit(Deck $deck){
        $this->cards = $deck->drawCard();
        if ($this->getScore()>self::MAGICAL_VAL){
            $this->lost = true;
        }
    }

    public function surrender(){
        $this->lost = true;
    }

    public function getScore(): int{
        $totalValue = 0;
        foreach ($this->cards as $card){
            $totalValue += $card->getValue();
        }
        return $totalValue;
    }

    public function hasLost(): bool{
        return $this->lost;
    }


    public function getCards(): array
    {
        return $this->cards;
    }


}

//extend the player class and extend it to a newly created dealer class.
//Change the Blackjack class to create a new dealer object instead of a player object for the property of the dealer.

//Now create a hit function that keeps drawing cards until the dealer has at least 15 points.
//The tricky part is that we also need the lost check we already had in the hit function of the player.
class Dealer extends Player {

    public function hit(Deck $deck){

        if($this->getScore()<15){

            do {
                parent::hit($deck);
            }
            while ($this->getScore()<15);
        }
    }
}
