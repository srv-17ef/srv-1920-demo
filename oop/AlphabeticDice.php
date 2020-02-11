<?php
require_once "Dice.php";

class AlphabeticDice extends Dice
{
    protected $allowedLetters = "abcdefghijklmnopqrstuvwxyzåäö";

    public function roll(int $timesToRollDice)
    {
        parent::roll(1);
        $rolledInt = rand(
            0,
            strlen($this->allowedLetters)-1
        );
        return $this->allowedLetters[$rolledInt];
    }
}