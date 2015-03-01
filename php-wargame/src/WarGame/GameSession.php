<?php

namespace WarGame;

/**
 * The War Game session.
 * This is the entry point for the game and clls the other models to perform different operations.
 *
 * @author Yaasir Ketwaroo<yaasir@ketwaroo.com>
 */
class GameSession
{

    /**
     * number of players required to play the game
     */
    const NUMBER_OF_PLAYERS = 2;

    /**
     * keeps track of player sessions that are in the game
     * @var PlayerSession[] array of player sessions
     */
    protected $playerSessions = array();
    // game session attributes.
    protected $session_id, $started_at, $started_by, $ended_at, $won_by;

    public function __construct(Player $startedBy)
    {
        // creates the player session
    }

    /**
     * sends and invitation to another player to join the game
     * @return GameSession
     */
    public function invitePlayer(Player $player)
    {

        if(count($this->playerSessions) < static::NUMBER_OF_PLAYERS)
        {
            // send invitation. implementation TBD
        }

        return $this;
    }

    /**
     * add a player to the game session
     * @param Player $player
     * @return GameSession
     */
    public function addPlayerSession(Player $player)
    {
        // $playerSession = new PlayerSession($player,$this);
        return $this;
    }

    /**
     * get the player session given a playser instance
     * @param Player $player
     * @return PlayerSession
     */
    public function getPlayerSession(Player $player)
    {
        
    }

    /**
     * remove a player from the game session
     * 
     * @param PlayerSession $playerSession
     * @return GameSession
     */
    public function removePlayerSession(PlayerSession $playerSession)
    {
        // set ended_at time

        return $this;
    }

    /**
     * returns the list of all players currently in this game
     * @return PlayerSession[]
     */
    public function getPlayerSessions()
    {
        return $this->playerSessions;
    }

    /**
     * starts the game.
     * @throws \Exception can throw an exception if some conditions aren't met
     * @return GameSession
     */
    public function playGame()
    {
        if($this->isGameEnded())
        {
            return $this; // for chaining
        }

        // test if number of players = NUMBER_OF_PLAYERS
        // and other test if needed.
        // throw exception for controller/higher level script to catch
        // set start time.
        // make sure all players are present
        // deal cards
        $this->deal();


        $round = $this->getCurrentRound()
            ->playRound();

        if($round->isRoundEnded())
        {
            $winner = $this->determineGameWinner()
                ->getWinner();

            if(!empty($winner))
            {
                $this->endGameSession($winner);
            }
        }

        return $this;
    }

    /**
     * verifies that the game is in progress
     * @return boolean
     */
    public function isGameInProgress()
    {
        // check if game session does not have ended_at value
        // also check that that players have not left session
    }

    /**
     * verifies whether the game has ended or not.
     * @return boolean
     */
    public function isGameEnded()
    {
        //
    }

    /**
     * return the winner if available
     * @return Player|null
     */
    public function getWinner()
    {
        
    }

    /**
     * Deals the cards between the players.
     * If the game is already in progress, loads game state from saved data.
     * @return GameSession
     */
    public function deal()
    {
        if($this->isGameInProgress())
        {
            // load card stacks from saved data. read from cards_in_stack
        }
        else // it's a new game
        {
            $cards         = Card::shuffleDeck(); // get list of pre shuffled cards
            $cardsPerStack = floor(count($cards) / count($this->playerSessions)); // there may be some cards left over
            $chunks        = array_chunk($cards, intval($cardsPerStack)); // split the deck  

            foreach($this->playerSessions as $playerSession)
            {
                $stack = new CardStack(array_pop($chunks));
                $playerSession->setCardStack($stack);
            }
        }
    }

    /**
     * determines the game winner
     * 
     * @return GameSession
     */
    public function determineGameWinner()
    {
        // foreach player session, get stack height.
        // if all but one player has a stack height == 0; game is won by last standing player
        //  

        return $this;
    }

    /**
     * ends the game session by setting the winner.
     * 
     * @param Player $winner
     * @return GameSession
     */
    public function endGameSession(Player $winner)
    {
        // set winner id
        // set game end time.
        // persist all data
        return $this;
    }

    /**
     * Determines the current round being played.
     * loads from saved data or create a new one.
     * @return Round
     */
    public function getCurrentRound()
    {
        
    }

    /**
     * 
     * @return int
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * 
     * @todo use datetime abstraction
     * @return string ISO8601 datetime string
     */
    public function getStartedAt()
    {
        return $this->started_at;
    }

    /**
     * 
     * @return Player
     */
    public function getStartedBy()
    {
        return $this->started_by;
    }

    /**
     * 
     * @todo use datetime abstraction
     * @return string ISO8601 datetime string
     */
    public function getEndedAt()
    {
        return $this->ended_at;
    }

    /**
     * 
     * @return Player|null null if no winner
     */
    public function getWonBy()
    {
        return $this->won_by;
    }

}
