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
     *
     * @var CardStack 
     */
    protected $cardStack;

    /**
     *
     * @var Player 
     */
    protected $player;

    /**
     * new player session creates from a player and a session
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
     * This is an action perform by the user when there is a draw
     * and there is more than one card per player on the board
     * otherwise this would be called automatically by the game.
     */
    public function pickCard(Round $round, Card $picked)
    {
        
    }

    /**
     * player instance for this session
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

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
