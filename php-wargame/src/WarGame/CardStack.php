<?php

namespace WarGame;

/**
 * The stack of cards that are owned by the player.
 * This model operates on the `stack` and `cards_in_stack` tables.
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
     * Get the number of cards in the stack.
     * @return int
     */
    public function getCardCount()
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
         *  update stack_height
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
        // update stack_height
    }

    /**
     * returns the height/depth of the stack of cards
     * @return int
     */
    public function getStackHeight()
    {
        
    }

    /**
     * recount the number of cards in the stack and update the stack_height attribute
     * @return CardStack
     */
    protected function recalulateStackheight()
    {
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getStackId()
    {
        
    }

}
