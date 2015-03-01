<?php

namespace WarGame;

/**
 * Description of Round
 *
 * @author Yaasir Ketwaroo<yaasir@ketwaroo.com>
 */
class Round
{

    /**
     * number of cards to pop for a normal round
     */
    const CARDS_PER_ROUND = 1;

    /**
     * number of cards to pop if a draw occurs
     */
    const CARDS_IF_DRAW = 3;

    // round attributes
    protected $round_number, $won_by, $started_at, $ended_at;

    /**
     * the game session the round belongs to
     * @var GameSession
     */
    protected $gameSession;

    /**
     * 
     * @param GameSession $gameSession
     */
    public function __construct(GameSession $gameSession)
    {
        // a round in progress can be determined 
    }

    /**
     * Play the actual game.
     * the last card round will be reloaded if available or a new set will be dealt
     * @return GameSession 
     */
    public function playRound()
    {

        $winner = $this->determineRoundWinner()
            ->getRoundWinner();

        if(!empty($winner))
        {
            $this->endRound($winner);
        }

        return $this;
    }

    /**
     * Adds a player's card from their stack to the current round
     * 
     * @param Card $card
     * @param Player $drawnBy
     */
    public function addCardToRound(Card $card, Player $drawnBy)
    {
        
    }

    /**
     * Get the cards currently being 
     * @param Player $player
     * @return Card[] array of cards
     */
    public function getCardsInPlay(Player $player)
    {
        //cards_in_round where is_picked, is_draw, and is_flused are all zero
    }

    /**
     * 
     * @param Card $card
     * @return Round
     */
    public function pickCard(Card $card)
    {
        // verify that card is indeed in play
        // set the is_picked flag.
    }

    /**
     * perform check to determine who has the highest card in the round based on picked cards
     * @return Round
     */
    public function determineRoundWinner()
    {
        // make sure everybody has picked a card
        // if in a draw state, $this->setDraw()
    }

    /**
     * get the winner of the round
     * @return Player|null
     */
    public function getRoundWinner()
    {
        
    }

    /**
     * put all the cards currently in the round to a player's stack
     * @param CardStack $stack
     * @return Round
     */
    public function flushCardsToPlayerStack(CardStack $stack)
    {
        // select card_id from card_in_round where
        //  round_id = $this->round_id
        //  and is_flushed != 1
        //
        $this->setRoundFlushed();
        // insert selected cards to stack
        $stack->pushCards($cards);

        return $this;
    }

    protected function setRoundFlushed()
    {
        // set all cards in round to flushed state
    }

    /**
     * get the is_draw state of the last played card(s).
     * @return boolean
     */
    public function isDraw()
    {
        
    }

    /**
     * set cards current in play in the round as in a draw
     */
    public function setDraw()
    {
        
    }

    /**
     * end the round by setting the winner
     * @param Player $winner
     * @return Round
     */
    public function endRound(Player $winner)
    {
        $playerSession = $this->getGameSession()
            ->getPlayerSession($winner);

        $stack = $playerSession->getCardStack();

        $this->flushCardsToPlayerStack($stack);
        //@todo update won_by to the winner->getPlayerId
    }

    /**
     * 
     * @return GameSession
     */
    public function getGameSession()
    {
        return $this->gameSession;
    }

}
