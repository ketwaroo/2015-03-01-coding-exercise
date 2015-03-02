War
===

# Description

War is a card game involving two players.  The deck is divided evenly among the two players, giving each a down stack. In unison, each player reveals the top card on his deck (a "battle"), and the player with the higher card takes both the cards played and moves them to the bottom of their stack. If the two cards played are of equal value, each player lays down three face-down cards and picks one of the cards out of the three (a "war"), and the higher-valued card wins all of the cards on the table, which are then added to the bottom of the player's stack. If one of the players has no more cards in a battle that player wins that battle. In the case of another tie, the war process is repeated until there is no tie.

A player wins by collecting all the cards. If a player runs out of cards while dealing the face-down cards of a war, they may play the last card in his deck as their face-up card and still have a chance to stay in the game.

Given these rules, define the classes you would implement to build a War simulator, which would log results for each game and each round of each game in a database.  The database must also catalog the winner of each round and the winner of each game.   Provide the following details of the system:

 * The SQL schema for the database.
 * The classes and the methods you would implement for the system. You do not need to code the body of the class methods.  However, please code the framework in valid PHP code, and provide PHPDoc documentation for the classes and methods that include a 1-4 sentence explanation of the purpose of the class/method.  Your documentation should include proper documentation of variables, properties, author, versioning, etc.


# Notes and Assumptions

 * Deck is regular 52 card stack where card values range from 2 to 13, 13 being the ace. The joker card is not used.
 * Database driver is MySQL.
 * It is assumed that some kind of ORM library or database abstraction will be used at implementation.
 * Only the models are to be outlined, controllers and views are not.
 * Minimum version of PHP 5.4 is used.

# Notes on Implementation

Please refer to the `/php-wargame/docs/war-db-erd.svg` file for an entity-relationship diagram depicting the schema and `/php-wargame/docs/war-db.sql` for the actual queries.

There are 2 main queues involved. The tables used to store data for these queues are `cards_in_stack`, which stores cards that are in the down stack of a player, and `cards_in_round`, which stores the cards currently in battle or war in the round.

When the first player joins the game, a `game_session` entry is created as well as a `player_session` entry. The `player_session` links the players to a game in a many-to-many relationship. When the required number of players have joined a game session, the game is initialised and an equal number of cards are divided between the players.

The game automatically pops a card from the beginning of the `cards_in_stack` queue for each player in session and creates a `round` instance as needed and adds the cards to the `cards_in round` table. The UI should allow the player to pick a card (or just 'flip' the card if only one is in play). This sets the `is_picked` flag on the `card_in_round` entry to true.

If one card is higher than the other, all cards in play are flushed to the end of the down stack of the winner. Once the `is_flushed` flag is active, the card is no longer in play for the current round.

If a draw situation is determined, the `is_draw` flag is set to true on the cards in play. Up to 3 more cards are popped from each user's stack and added to the round. The UI will again allow each user to pick a card to flip. If a player runs out of cards while placing three down to break the draw, the UI can allow that player to flip the last card popped from their stack.

The Game Session object reevaluates the state of each player's stack after each round has ended to determine if there is a final winner.


