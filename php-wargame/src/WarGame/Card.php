<?php

namespace WarGame;

/**
 * The Card definition is simply a `name` and an integer `value`.
 * The `name` would have typical values such as `2 of hearts`, `6 of spades`, `king of treble` etc.
 * the value would be used when comparing the strength of each card. the values range from 2 to 13
 *
 * @author Yaasir Ketwaroo<yaasir@ketwaroo.com>
 */
class Card
{

    protected $name, $value;

    /**
     * Create a new card or load existing based on name.
     * @param string $name
     * @param int $value
     */
    public function __construct($name, $value)
    {
        
    }

    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * value of card for comparison
     * @return int
     */
    public function getValue()
    {
        return intval($this->value);
    }

    /**
     * 
     * @param integer $value
     * @return Card
     */
    public function setValue($value)
    {
        // set and save new value.
    }

    /**
     * generates a new shuffled deck.
     * @return Card[] array of Card objects
     */
    public static function shuffleDeck()
    {
        // 
    }

    /**
     * creates entries for 52 cards
     */
    public static function seedDeck()
    {
        $houses = array(
            'spades',
            'heart',
            'diamond',
            'clubs',
        );
        $values = array_combine(
            array_merge(range(2, 9), array('jack', 'queen', 'king', 'ace'))
            , range(2, 13));

        $cards = array();
        foreach($houses as $h)
        {
            foreach($values as $prefix => $val)
            {
                $cards["{$prefix} of {$h}"] = $val;
            }
        }

        // insert cards to the `card` table.
    }

}
