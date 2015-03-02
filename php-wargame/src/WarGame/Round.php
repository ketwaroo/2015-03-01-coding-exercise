<?php

namespace WarGame;

/**
 * Round entity handles cards currently in play and determines
 * the winner of the round based on card values.
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
    protected $round_number, $started_at, $ended_at;

    /**
     * the game session the round belongs to
     * @var GameSession
     */
    protected $gameSession;

    /**
     * instance of winner
     * @var Player 
     */
    protected $wonBy;

    /**
     * Create new round attached to the supplied game session
     * @param GameSession $gameSession
     */
    public function __construct(GameSession $gameSession)
    {
        
    }

    /**
     * A round of Game can span multiple turns.
     * The last card round will be reloaded if available or a new set will be dealt
     * @return Round 
     */
    public function playRound()
    {

        // verify that we did have a winner from last round.
        // set Draw if needed
        $winner = $this->determineRoundWinner()
            ->getRoundWinner();

        if(!empty($winner))
        {
            $this->endRound($winner);
            return $this;
        }

        $numberOfCards = ($this->isDraw()) ? static::CARDS_IF_DRAW : static::CARDS_PER_ROUND;

        $this->deal($numberOfCards);

        return $this;
    }

    /**
     * pop some cards from the player's stack into the current round
     * @param int $numberOfCards
     * @return Round
     */
    protected function deal($numberOfCards)
    {
        foreach($this->getGameSession()
            ->getPlayerSessions() as $playerSession)
        {
            $cards = $playerSession->drawCardsFromStack($numberOfCards);

            foreach($cards as $card)
            {
                $this->addCardToRound($card, $playerSession->getPlayer());
            }
        }
        return $this;
    }

    /**
     * Adds a player's card from their stack to the current round
     * 
     * @param Card $card
     * @param Player $drawnBy
     */
    protected function addCardToRound(Card $card, Player $drawnBy)
    {
        
    }

    /**
     * Get the cards currently being played in the round
     * @param Player $player
     * @return Card[] array of cards
     */
    public function getCardsInPlay(Player $player)
    {
        //cards_in_round where is_picked, is_draw, and is_flushed are all zero
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
    protected function determineRoundWinner()
    {
        // make sure everybody has picked a card for the current round.
        // 
        // SELECT c.card_id, c.card_value, cr.drawn_by
        //  FROM card as c
        //  JOIN cards_in_round as cr
        //   ON (cr.card_id = c.card_id)
        //  WHERE
        //    cr.round_id = $this->round_id
        //    AND cr.is_picked = 1
        //    AND cr.is_draw = 0
        //    AND cr.is_flushed = 0
        //  ORDER BY c.value DESC
        //  
        //  
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
     * determine if the round is no longer active.
     * @return boolean
     */
    public function isRoundEnded()
    {
        
    }

    /**
     * 
     * @return GameSession
     */
    public function getGameSession()
    {
        return $this->gameSession;
    }

    /**
     * get the round_id attribute
     * @return int
     */
    public function getRoundId()
    {
        
    }

}
