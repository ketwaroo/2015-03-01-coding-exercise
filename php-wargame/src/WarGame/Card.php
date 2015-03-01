<?php

namespace WarGame;

/**
 * 
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

}
