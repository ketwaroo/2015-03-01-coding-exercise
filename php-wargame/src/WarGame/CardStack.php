<?php

namespace WarGame;

/**
 * Description of CardStack
 *
 * @author Yaasir Ketwaroo<yaasir@ketwaroo.com>
 */
class CardStack
{

    protected $stack_id, $is_popped;

    /**
     * 
     * @param Card[] $cards array of cards
     * @param PlayerSession $owner player session the stack belongs to.
     */
    public function __construct($cards, PlayerSession $owner)
    {
        
    }

    /**
     * removes a number of cards from the stack and return them as an array
     * 
     * @param int $numberOfCards number of cards to pop
     * @return Card[] array of cards
     */
    public function popCards($numberOfCards = 1)
    {
        /*
         *  $tmp = select card_id from `cards_in_stack` where
         *      stack_id = $this->getStackId()
         *      and is_popped = 0    
         *      limit $numberOfCards
         *      order by card_stack_id ASC
         *  
         *  
         *    update cards_in_stack set is_popped =1 and popped_at = NOW()  
         * 
         * create Card instances from the ids in $tmp and return those
         */
        
        
    }
    
    /**
     * add cards to the stack
     * @param Card|array $cards array of cards to add
     */
    public function pushCards($cards)
    {
        // foreach $cards as $card
        // insert into cards_in_stack <$card id with current stack_id and is_popped=0>
    }

    /**
     * 
     * @return int
     */
    public function getStackId()
    {
        return $this->stack_id;
    }

}
