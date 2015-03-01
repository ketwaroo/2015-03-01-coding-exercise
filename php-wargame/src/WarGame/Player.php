<?php

namespace WarGame;

/**
 * Player Entity
 *
 * @author Yaasir Ketwaroo<yaasir@ketwaroo.com>
 */
class Player
{

    public function startNewGameSession()
    {

        return $this; // for chaining
    }

    /**
     * send an invitation to play to another player.
     * @param Player $player
     * @param GameSession $gameSession
     * @return Player
     */
    public function invitePlayer(Player $player, GameSession $gameSession)
    {
        return $this; // for chaining
    }

    /**
     * add the player to an existing game session
     * 
     * @param GameSession $gameSession
     * @return PlayerSession new or existing player instance in that game session
     */
    public function joinSession(GameSession $gameSession)
    {
        // 

        return $playerSession;
    }

}
