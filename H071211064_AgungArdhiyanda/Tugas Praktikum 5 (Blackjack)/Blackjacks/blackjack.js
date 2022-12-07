var numCardsPulled = 0;


//Membuat Objek Player
var player = {
    cards: [],
    score: 0,
    money: 5000
};
//Membuat Objek Dealer
var dealer = {
    cards: [],
    score: 0
};

//Menginisiasi  Kartu
var deck = {
    deckArray: [],
    initialize: function () {
        var rankArray, r;
        rankArray = [2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K", "A"];
        for (r = 0; r < rankArray.length; r += 1) {
            this.deckArray[r] = {
                rank: rankArray[r],
            };
        }
    },
    shuffle: function () {
        var temp, i, rnd;
        for (i = 0; i < this.deckArray.length; i += 1) {
            rnd = Math.floor(Math.random() * this.deckArray.length);
            temp = this.deckArray[i];
            this.deckArray[i] = this.deckArray[rnd];
            this.deckArray[rnd] = temp;
        }
    }
};

document.getElementById("player-money").innerHTML = "Your money: $" + player.money;
deck.initialize();
deck.shuffle();

//Mendapatkan nilai kartu
function getCardsValue(a) {
    var cardArray = [],
        sum = 0,
        i = 0,
        aceCount = 0;
    cardArray = a;
    for (i; i < cardArray.length; i += 1) {
        if (cardArray[i].rank === "J" || cardArray[i].rank === "Q" || cardArray[i].rank === "K") {
            sum += 10;
        } else if (cardArray[i].rank === "A") {
            sum += 11;
            aceCount += 1;
        } else {
            sum += cardArray[i].rank;
        }
    }
    while (aceCount > 0 && sum > 21) {
        sum -= 10;
        aceCount -= 1;
    }
    return sum;
}

//Fungsi untuk mengurangi dan menambahkan uang jika user kalah
function bet(outcome) {
    var playerBet = document.getElementById("bet").valueAsNumber;
    if (outcome === "win") {
        player.money += playerBet;
    }
    if (outcome === "lose") {
        player.money -= playerBet;
    }
}
//Fungsi untuk melakukan reset game ketika permainan selesai dalam arti kartu dan skor
function resetGame() {
    numCardsPulled = 0;
    player.cards = [];
    dealer.cards = [];
    player.score = 0;
    dealer.score = 0;
    deck.initialize();
    deck.shuffle();
    document.getElementById("hit-button").disabled = true;
    document.getElementById("stand-button").disabled = true;
    document.getElementById("bet").disabled = false;
    document.getElementById("bet").max = player.money;
    document.getElementById("new-game-button").disabled = false;
}

function endGame() {
    if (player.money <= 0) {
        document.getElementById("new-game-button").disabled = true;
        document.getElementById("hit-button").disabled = true;
        document.getElementById("stand-button").disabled = true;
        document.getElementById("message-board").innerHTML = "You lost!" + "<br>" + "You are out of money" + "<br>" + "<input type='button' value='New Game' onclick='location.reload();'/>";
    }

    if (player.score === 21) {
        document.getElementById("message-board").innerHTML = "You Win, Blackjack! ";
        //Duit player akan bertambah dari fungsi bet
        bet("win");
        document.getElementById("player-money").innerHTML = "Your Money : " + player.money;
        resetGame();
    }
    //Ketika dealerscore = 21 langsung kalah
    if (dealer.score === 21) {
        document.getElementById("message-board").innerHTML = "You lose, Dealer Got Blackjack!";
        bet("lose");
        document.getElementById("player-money").innerHTML = "Your Money : " + player.money;
        resetGame();
    }
    if (dealer.score > 21) {
        document.getElementById("message-board").innerHTML = "You win !";
        bet("win");
        document.getElementById("player-money").innerHTML = "Your Money : " + player.money;
        resetGame();
    }
    if (player.score > 21) {
        document.getElementById("message-board").innerHTML = "You Lose ! ";
        bet("lose");
        document.getElementById("player-money").innerHTML = "Your Money : " + player.money;
        resetGame();
    }

    if (dealer.score >= 17 && player.score < dealer.score && dealer.score < 21) {
        document.getElementById("message-board").innerHTML = "You Lose !";
        bet("lose");
        document.getElementById("player-money").innerHTML = "Your Money : " + player.money;
        resetGame();
    }

    if (dealer.score >= 17 && player.score > dealer.score && dealer.score < 21) {
        document.getElementById("message-board").innerHTML = "You Lose !";
        bet("win");
        document.getElementById("player-money").innerHTML = "Your Money : " + player.money;
        resetGame();
    }
    if (dealer.score >= 17 && player.score === dealer.score && dealer.score < 21) {
        document.getElementById("message-board").innerHTML = "You Tied !"
        resetGame();
    }
}

function dealerDraw() {
    dealer.cards.push(deck.deckArray[numCardsPulled]);
    dealer.score = getCardsValue(dealer.cards);
    //Konversi Nilai Berupa Object Ke String
    document.getElementById("dealer-cards").innerHTML = "Dealer Cards: " + JSON.stringify(dealer.cards);
    numCardsPulled += 1;
}

//Untuk memulai permainan baru
function newGame() {
    document.getElementById("new-game-button").disabled = true;
    document.getElementById("hit-button").disabled = false;
    document.getElementById("stand-button").disabled = false;
    document.getElementById("bet").disabled = true;
    document.getElementById("message-board").innerHTML = "";
    hit();
    hit();
    dealerDraw();
    endGame();
}
//Fungsi hit untuk menambahkan kartu
function hit() {
    player.cards.push(deck.deckArray[numCardsPulled]);
    player.score = getCardsValue(player.cards);
    //Konversi Nilai Berupa Object Ke String
    document.getElementById("player-cards").innerHTML = "Player Cards: " + JSON.stringify(player.cards);
    numCardsPulled += 1;
    if (numCardsPulled >= 2) {
        endGame();
    }
}
//Fungsi stand untuk tetap bertahan 
function stand() {
    while (dealer.score < 17) {
        dealerDraw();
    }
    endGame();
}