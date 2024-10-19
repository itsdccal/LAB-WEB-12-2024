let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;

let cards;
let isCanHit = true;

let uang = document.getElementById("amount");
let uangku = 5000;
let botHiddenCard;

const btnStart = document.getElementById("btn-start-game");
const btnHold = document.getElementById("btn-hold");
const btnTake = document.getElementById("btn-take");
const btnTryAgain = document.getElementById("btn-try-again");


const mySumsElement = document.getElementById("mysum");
const myCardsElement = document.querySelector(".my-cards");

const botSumsElement = document.getElementById("bot");
const botCardsElement = document.querySelector(".bot-cards");

const gameOver = document.getElementById("gameOver");
const resultElement = document.getElementById("result");

window.onload = () => {
  buildUserCards();
  shuffleCards();
  btnTake.disabled = true;
  btnHold.disabled = true;
};

function buildUserCards() {
  let cardTypes = ["B", "H", "K", "S"];
  let cardValues = [
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "K",
    "Q",
    "J",
  ];
  cards = [];

  for (let type of cardTypes) {
    for (let value of cardValues) {
      cards.push(value + "-" + type);
    }
  }
}

function shuffleCards() { //kartu yg d acak dan d bagikan
  for (let i = cards.length - 1; i > 0; i--) {
    let randomIndex = Math.floor(Math.random() * (i + 1));
    [cards[i], cards[randomIndex]] = [cards[randomIndex], cards[i]];
  }
}

btnStart.addEventListener("click", function () {
  let betInput = document.querySelector("input[type='number']");
  let depositValue = parseInt(betInput.value);

  if (isNaN(depositValue) || depositValue <= 0) {
    alert("Silakan masukkan jumlah taruhan yang valid!");
    return;
  }

  if (depositValue < 100) {
    alert("Uang anda terlalu sedikit! Taruhan minimum adalah 100.");
    resetBet();
    return;
  }

  if (depositValue > uangku) {
    alert("Dana tidak mencukupi. Masukkan taruhan yang lebih kecil.");
    resetBet();
    return;
  }

  resetGame();
  takeCards(2); // Player draws 2 cards

  let botOpenCard = cards.pop();
  let botOpenCardImg = document.createElement("img");
  botOpenCardImg.src = `./images/cards/${botOpenCard}.png`;
  botOpenCardImg.style.width = "120px";
  botOpenCardImg.style.margin = "1px";
  botCardsElement.append(botOpenCardImg);

  botSums += getValueOfCard(botOpenCard);
  botASCards += checkASCard(botOpenCard);
  botSumsElement.textContent = botSums;

  botHiddenCard = document.createElement("img");
  botHiddenCard.src = "./images/cards/BACK.png";
  botHiddenCard.style.width = "120px";
  botHiddenCard.style.margin = "1px";
  botCardsElement.append(botHiddenCard);

  btnTake.disabled = false;
  btnHold.disabled = false;
  btnStart.disabled = true;
  hitungUang(depositValue);
});

function hitungUang(depositValue) {
  uangku -= depositValue;
  uang.textContent = uangku;
}

btnTryAgain.addEventListener("click", function () {
  resetGame(); // Reset semua status permainan
  btnTryAgain.style.display = "none"; // Sembunyikan tombol try again
  btnStart.disabled = false; // Aktifkan kembali tombol start
});

btnTake.addEventListener("click", function () {
  if (!isCanHit) return;
  takeCards(1);
  if (uangku <= 0) {
    gameOver.style.display = "flex";
  }
});

btnHold.addEventListener("click", function () {
  botHiddenCard.remove();

  let hiddenCard = cards.pop();
  let hiddenCardImg = document.createElement("img");
  hiddenCardImg.src = `./images/cards/${hiddenCard}.png`;
  hiddenCardImg.style.width = "120px";
  hiddenCardImg.style.margin = "1px";
  botCardsElement.append(hiddenCardImg);

  botSums += getValueOfCard(hiddenCard);
  botASCards += checkASCard(hiddenCard);
  botSumsElement.textContent = botSums;

  isCanHit = false;
  while (botSums < 17) {
    let botCard = cards.pop();
    let botCardImg = document.createElement("img");
    botCardImg.src = `./images/cards/${botCard}.png`;
    botCardImg.style.width = "120px";
    botCardImg.style.margin = "1px";
    botCardsElement.append(botCardImg);

    botSums += getValueOfCard(botCard);
    botASCards += checkASCard(botCard);
    botSumsElement.textContent = botSums;
  }

btnTryAgain.addEventListener("click", function () {
  resetGame(); // Reset semua status permainan
  btnTryAgain.style.display = "none"; // Sembunyikan tombol try again
  btnStart.disabled = false; // Aktifkan kembali tombol start
});

let message = "";
let betInput = document.querySelector("input[type='number']");
let depositValue = parseInt(betInput.value); // Get the bet value for calculations

if (mySums > 21) {
  message = "YAHH KALAHH!!";
  alert("Anda Kalah!");
} else if (botSums > 21 || mySums > botSums) {
  message = "ALHAMDULILLAH MENANG!";
  alert("Selamat! Anda Menang!");
  uangku += depositValue * 2; // Double the bet value is added to player's money if they win
} else if (mySums === botSums) {
  message = "SERIII!";
  alert("Seri!");
  uangku += depositValue; // Return the bet to the player in case of a draw
} else {
  message = "YAHH KALAHH!!";
  alert("Anda Kalah!");
  // No money added back in case of loss, player loses their bet
}

resultElement.innerHTML = `<h2>${message}</h2>`;
uang.textContent = uangku; // Update the displayed money
btnTryAgain.style.display = "block"; 
});


function takeCards(n) {
  for (let i = 0; i < n; i++) {
    let card = cards.pop();
    let cardImg = document.createElement("img");
    cardImg.src = `./images/cards/${card}.png`;
    cardImg.style.width = "120px";
    cardImg.style.margin = "1px";
    myCardsElement.append(cardImg);

    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
  }

  if (mySums > 21 && myASCards > 0) {
    mySums -= 10;
    myASCards -= 1;
  }

  mySumsElement.textContent = mySums;

  if (mySums >= 21) {
    btnTake.disabled = true;
    isCanHit = false;
  }
}

function getValueOfCard(card) {
  let data = card.split("-");
  let value = data[0];

  if (isNaN(value)) {
    if (value === "A") {
      return 11;
    }
    return 10;
  }
  return parseInt(value);
}

function checkASCard(card) {
  return card[0] === "A" ? 1 : 0;
}

function resetGame() {
  mySums = 0;
  botSums = 0;
  myASCards = 0;
  botASCards = 0;
  isCanHit = true;

  myCardsElement.innerHTML = ""; // Bersihkan kartu pemain
  botCardsElement.innerHTML = ""; // Bersihkan kartu bot
  mySumsElement.textContent = ""; // Bersihkan skor pemain
  botSumsElement.textContent = ""; // Bersihkan skor bot
  resultElement.textContent = ""; // Bersihkan hasil

  buildUserCards(); // Kocok ulang kartu
  shuffleCards();

  btnTake.disabled = true; // Nonaktifkan tombol take pada awal
  btnHold.disabled = true; // Nonaktifkan tombol hold pada awal
  btnStart.disabled = false; // Aktifkan kembali tombol start
}

function resetBet() {
  document.querySelector("input[type='number']").value = "";
}
