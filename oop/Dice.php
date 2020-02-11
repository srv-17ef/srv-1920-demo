<?php


class Dice
{
    protected $rolls = [];
    protected $numSides;

    /**
     * Dice constructor.
     * @param int $numSides
     */
    public function __construct(int $numSides)
    {
        if ($numSides % 2 == 0) {
            $this->numSides = $numSides;
        } else {
            $this->numSides = 6;
        }
    }

    /**
     * @param int $timesToRollDice
     */
    public function roll(int $timesToRollDice)
    {
        for ($i = 0; $i < $timesToRollDice; $i++) {
            $this->rolls[] = rand(1, $this->numSides);
        }
    }

    /**
     * @return array
     */
    public function getRolls(): array
    {
        return $this->rolls;
    }

    public static function dies()
    {
        echo "Not today";
    }

}