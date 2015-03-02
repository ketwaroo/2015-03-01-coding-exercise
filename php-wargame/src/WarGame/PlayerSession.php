<?php

namespace WarGame;

/**
 * PlayerSession
 * it is the reference of a player instance within a game session.
 *
 * @author Yaasir Ketwaroo<yaasir@ketwaroo.com>
 */
class PlayerSession
{

    /**
     * game session associated with current player session.
     * @var GameSession
     */
    protected $gameSession;

    /**
     * stack of cards owned by the player session
     * @var CardStack 
     */
    protected $cardStack;

    /**
     * player instance associated with the current player session
     * @var Player 
     */
    protected $player;

    /**
     * new player session created from a player and a session
     * 
     * @param Player $player
     * @param GameSession $session
     */
    public function __construct(Player $player, GameSession $session)
    {
        $this->player      = $player;
        $this->gameSession = $session;
    }

    /**
     * Sets the initial cards for that player session.
     * @param CardStack $stack
     * @return PlayerSession
     */
    public function setCardStack(CardStack $stack)
    {
        $this->cardStack = $stack;
        return $this;
    }

    /**
     *  @return CardStack
     */
    public function getCardStack()
    {
        return $this->cardStack;
    }

    /**
     * 
     * @param type $cards
     * @return PlayerSession
     */
    public function addCardsToStack($cards)
    {
        foreach($cards as $card)
        {
            $this->getCardStack()
                ->pushCard($card);
        }
        return $this;
    }

    /**
     * 
     * @param int $numberOfCards
     * @return Card[] array of Cards
     */
    public function drawCardsFromStack($numberOfCards)
    {
        return $this->getCardStack()
                ->popCards($numberOfCards);
    }

    /**
     * pass thru call to the round to pick a certain card
     * @param Round $round
     * @param Card $picked
     * @return PlayerSession 
     */
    public function pickCard(Round $round, Card $picked)
    {
        $round->pickCard($picked);
        return $this;
    }

    /**
     * player instance for this session
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * 
     * @return Round round currently in play
     */
    public function getCurrentRound()
    {
        return $this->getSession()
                ->getCurrentRound();
    }

    /**
     * 
     * @return GameSession current game session
     */
    public function getSession()
    {
        return $this->gameSession;
    }

}
