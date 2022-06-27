# php-blackjack
---
### We're going to start the week with one of our favorite thing to do witch is online games! 
# Welcome to my Casino!!!! 
<img src="images/blackjack.jpg">

# What is a Blackjack!
### This is a Text-based Blackjack game.The game is based on the description provided in the wikipedia.The objective of the game is to beat the dealer, 
- which can be done in the following ways:
<a href="http://en.wikipedia.org/wiki/Blackjack" rel="nofollow">wikipedia</a>

---
# The Mission
1.  Let's make a game in PHP: Blackjack!
2.   A game of chance and luck!
  

---

*****!!Rules!!*****

 - Cards are between 1-11 points.
 - Faces are worth 10
 - Ace is always worth 11
 - Getting more than 21 points, means that you lose.
 - To win, you need to have more points than the dealer, but not more than 21.
 - The dealer is obligated to keep taking cards until they have at least 15 points.
 - We are not playing with blackjack rules on the first 
turn (having 21 on firs turn) - we leave this up to you 
as a nice to have.
# Instructions!
### To creat this game we have to follow the instructions. 
1. Creating the base classes! 
2. Creating the index.php file

##  Everything from the player is now done!
# The dealer !
- To change this behavior, we have are going extend the player class and extend it to a newly created dealer class.

- Change the Blackjack class to create a new dealer object instead of a player object for the property of the dealer.

- Now create a hit function that keeps drawing cards until the dealer has at least 15 points. The tricky part is that we also need the lost check we already had in the hit function of the player. We could just copy the code but duplicated code is never the solution, instead you can use the following code to call the old hit function:

parent::hit();
--- 

# Final push! 
1. When you the hit button call hit on player, then check the lost status of the player. You will need to pass a Deck variable to this function, you can use the Blackjack::getDeck() method for this.
2. When you the stand button call hit on dealer, then check the lost status of the dealer. If he is not lost, compare scores to set the winner (If equal the dealer wins).
3. Surrender: the dealer auto wins.
4. Always display on the page the scores of both players. If you have a winner, display it.
5. End of the game: destroy the current blackjack variable so the game restarts.