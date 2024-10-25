    const blackJackCards = [
        { name: "10-C", src: "cards/10-C.png", value: 10 },
        { name: "10-D", src: "cards/10-D.png", value: 10 },
        { name: "10-H", src: "cards/10-H.png", value: 10 },
        { name: "10-S", src: "cards/10-S.png", value: 10 },
        { name: "2-C", src: "cards/2-C.png", value: 2 },
        { name: "2-D", src: "cards/2-D.png", value: 2 },
        { name: "2-H", src: "cards/2-H.png", value: 2 },
        { name: "2-S", src: "cards/2-S.png", value: 2 },
        { name: "3-C", src: "cards/3-C.png", value: 3 },
        { name: "3-D", src: "cards/3-D.png", value: 3 }, 
        { name: "3-H", src: "cards/3-H.png", value: 3 },
        { name: "3-S", src: "cards/3-S.png", value: 3 },
        { name: "4-C", src: "cards/4-C.png", value: 4 },
        { name: "4-D", src: "cards/4-D.png", value: 4 },
        { name: "4-H", src: "cards/4-H.png", value: 4 },
        { name: "4-S", src: "cards/4-S.png", value: 4 },
        { name: "5-C", src: "cards/5-C.png", value: 5 },
        { name: "5-D", src: "cards/5-D.png", value: 5 },
        { name: "5-H", src: "cards/5-H.png", value: 5 },
        { name: "5-S", src: "cards/5-S.png", value: 5 },
        { name: "6-C", src: "cards/6-C.png", value: 6 },
        { name: "6-D", src: "cards/6-D.png", value: 6 },
        { name: "6-H", src: "cards/6-H.png", value: 6 },
        { name: "6-S", src: "cards/6-S.png", value: 6 },
        { name: "7-C", src: "cards/7-C.png", value: 7 },
        { name: "7-D", src: "cards/7-D.png", value: 7 },
        { name: "7-H", src: "cards/7-H.png", value: 7 },
        { name: "7-S", src: "cards/7-S.png", value: 7 },
        { name: "8-C", src: "cards/8-C.png", value: 8 },
        { name: "8-D", src: "cards/8-D.png", value: 8 },
        { name: "8-H", src: "cards/8-H.png", value: 8 },
        { name: "8-S", src: "cards/8-S.png", value: 8 },
        { name: "9-C", src: "cards/9-C.png", value: 9 },
        { name: "9-D", src: "cards/9-D.png", value: 9 },
        { name: "9-H", src: "cards/9-H.png", value: 9 },
        { name: "9-S", src: "cards/9-S.png", value: 9 },
        { name: "A-C", src: "cards/A-C.png", value: 11 },
        { name: "A-D", src: "cards/A-D.png", value: 11 },
        { name: "A-H", src: "cards/A-H.png", value: 11 },
        { name: "A-S", src: "cards/A-S.png", value: 11 },
        { name: "J-C", src: "cards/J-C.png", value: 10 },
        { name: "J-D", src: "cards/J-D.png", value: 10 },
        { name: "J-H", src: "cards/J-H.png", value: 10 },
        { name: "J-S", src: "cards/J-S.png", value: 10 },
        { name: "K-C", src: "cards/K-C.png", value: 10 },
        { name: "K-D", src: "cards/K-D.png", value: 10 },
        { name: "K-H", src: "cards/K-H.png", value: 10 },
        { name: "K-S", src: "cards/K-S.png", value: 10 },
        { name: "Q-C", src: "cards/Q-C.png", value: 10 },
        { name: "Q-D", src: "cards/Q-D.png", value: 10 },
        { name: "Q-H", src: "cards/Q-H.png", value: 10 },
        { name: "Q-S", src: "cards/Q-S.png", value: 10 }
    ];

    let deck = [];
    let botDeck = [];
    let playerDeck = [];
    let playerMoney = 0;
    let playerSum = 0;
    let betAmount = 0;
    let botSum = 0;
    
    const inputDeposito = document.getElementById("inputDeposito");
    const modalStart = new bootstrap.Modal(document.getElementById("modalStart"));

    const buttonStart = document.getElementById("buttonStart");
    const buttonHit = document.getElementById("buttonHit");
    const buttonHold = document.getElementById("buttonHold");
    const buttonBet = document.getElementsByClassName("buttonBet");

    const textPlayerBet = document.getElementById("textPlayerBet");
    const textPlayerSums = document.getElementById("textPlayerSums");
    const textPlayerMoney = document.getElementById("textPlayerMoney");

    const botDeckContainer = document.getElementById("botDeckContainer");
    const playerDeckContainer = document.getElementById("playerDeckContainer");

    const textBotSums = document.getElementById("textBotSums");

    modalStart.show();

    const startGame = () => {
        const depositAmount = parseFloat(inputDeposito.value) ;
        if (depositAmount < 50 ) {
            alert("Bang uang dikit buat makan aj gausa judi");
            return;
        } else if (depositAmount >= 50) {
            alert("Semoga gacor ngab");
        
        }
        playerMoney = depositAmount;
        modalStart.hide();
        startTurn();
    }

    const startTurn = () => {

        if (playerMoney <= 0) {
            alert("Dompetmu kosong hei :/");
            restartGame();
            return;
            
        }

        deck = shuffle(blackJackCards.slice());

        playerDeck = [];
        playerSum = 0;
        betAmount = 0;
        botDeck = [];
        botSum = 0;
        playerDeckContainer.innerHTML = "";
        botDeckContainer.innerHTML = "";

        addPlayerDeck(getCard());
        addPlayerDeck(getCard());
        addBotDeck(getCard());

        setPlayerMoney(playerMoney);
        setPlayerBet(betAmount);

        disableHitHold(true);
        disableBetButton(false);

    }

    const restartGame = () => {
        modalStart.show(); 
        playerMoney = 0;
        
    }
    const disableHitHold = (disable) => {

        if (disable) {
            buttonHit.disabled = true;
            buttonHold.disabled = true;
        }else{
            buttonHit.disabled = false;
            buttonHold.disabled = false;
        }
    }

    const disableBetButton = (disable) => {

        const buttonsArray = Array.from(buttonBet);

        if (disable) {
            buttonsArray.forEach(button => {
                button.disabled = true;
            });
        } else {
            buttonsArray.forEach(button => {
                button.disabled = false;
            });
        }
    }

    const shuffle = (cards) => {
        for (let i = 0; i < cards.length; i++) {
            const j = Math.floor(Math.random() * (i + 1));
            [cards[i], cards[j]] = [cards[j], cards[i]];
        }
        return cards;
    }

    const getCard = () => {
        return deck.pop();
    }

    const hit = () => {
        disableBetButton(true);
        addPlayerDeck(getCard());
        if (playerSum > 21) {
            if (playerMoney <= 0){
                displayModal("modalGameOver")
            } else {
                displayModal('modalKalah');
                disableHitHold(true);
            }
        }
    }

    const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms));
    const addBotDeckWithDelay = async (card) => {
        addBotDeck(card);
        await delay(500);
        if (botSum < 17) {
            const nextCard = getCard();
            await addBotDeckWithDelay(nextCard);
        } else {
            finalizeHold();
        }
    }

    const hold = async () => {
        disableBetButton(true);
        const card = getCard();
        await addBotDeckWithDelay(card);
    }

    const finalizeHold = () => {
        const winSound = document.getElementById("winSound");
        const loseSound = document.getElementById("loseSound");
        const tieSound = document.getElementById("tieSound");
      

    

        if (botSum > 21) {
            displayModal('modalMenang');
            setPlayerMoney(playerMoney += (betAmount * 2));
            winSound.play();
        } else {
            if (playerSum > botSum) {
                displayModal('modalMenang');
                setPlayerMoney(playerMoney += (betAmount * 2));
                winSound.play();
            } else if (playerSum < botSum) {
                if (playerMoney <= 0){
                    displayModal("modalGameOver")
                    // gameover.play();
                } else {
                    displayModal('modalKalah');
                    loseSound.play();
                }
            } else {
                displayModal('modalSeri');
                setPlayerMoney(playerMoney += betAmount);
                tieSound.play();
            }
        }
        disableHitHold(true);
        disableBetButton(false);
    }


    const placeBet = (amount) => {
        const betSound = document.getElementById("betSound");  // Ambil elemen audio
    
        if ((playerMoney -= amount) < 0) {
            playerMoney += amount;
            alert("Uangmu tidak cukup");
        } else {
            betAmount += amount;
            setPlayerMoney(playerMoney);
            setPlayerBet(betAmount);
            disableHitHold(false);
    
            // Putar audio
            betSound.play();
        }
    };
    
    function displayModal(modalId) {
        const modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();

        modal._element.addEventListener('hidden.bs.modal', function () {
            startTurn();
        });
    }

    const addPlayerDeck = (card) => {
        playerDeck.push(card);
        const img = document.createElement('img');
        img.src = card.src;
        img.alt = card.name;
        img.width = 100;
        img.classList.add('mx-1');
        img.classList.add('swipe-down');
        playerDeckContainer.appendChild(img);
        setPlayerSum(card);
    }

    const addBotDeck = (card) => {
        botDeck.push(card);
        const img = document.createElement('img');
        img.src = card.src;
        img.alt = card.name;
        img.width = 100;
        img.classList.add('mx-1');
        img.classList.add('swipe-down');
        botDeckContainer.appendChild(img);
        setBotSum(card);
        
        if (botDeck.length <= 1) {
            const backImg = document.createElement('img');
            backImg.src = 'cards/BACK.png';
            backImg.alt = 'Flipped';
            backImg.width = 100;
            backImg.classList.add('mx-1');
            backImg.classList.add('swipe-down');
            botDeckContainer.appendChild(backImg);
        } else {
            const backImg = botDeckContainer.querySelector('img[src="cards/BACK.png"]');
            if (backImg) {
                botDeckContainer.removeChild(backImg);
            }
        }
    }

    const setPlayerMoney = (text) => {
        textPlayerMoney.textContent = text;
    }
    const setPlayerBet = (text) => {
        textPlayerBet.textContent = text;
    }
    const setPlayerSum = (card) => {
        playerSum += getCardValue(playerDeck, card);  
        textPlayerSums.textContent = playerSum;
    
        
        if (playerSum > 13 && botSum > playerSum) {  
            checkAceToReduce(playerDeck);  
            textPlayerSums.textContent = playerSum;
        } else if (playerSum > 21) {
            checkAceToReduce(playerDeck);  
            textPlayerSums.textContent = playerSum;  
        }
    };
    const setBotSum = (card) => {
        botSum += getCardValue(botDeck, card);
        textBotSums.textContent = botSum;
       
        if (botSum > 21) {
            botSum = adjustForAce(botDeck, botSum);
            textBotSums.textContent = botSum;
        }
    };
    
    const getCardValue = (currentDeck, card) => {
        if (card.value === 11) {
            return (calculateSum(currentDeck) + 11 > 21) ? 1 : 11;
        }
        return parseInt(card.value);
    };
    
    const adjustForAce = (deck, sum) => {
        let adjustedSum = sum;
        deck.forEach(card => {
            if (card.value === 11 && adjustedSum > 21) {
                adjustedSum -= 10; 
            }
        });
        return adjustedSum;
    };
    

    const allIn = () => {
        if (playerMoney > 0) {
            const allInAmount = playerMoney;  
            placeBet(allInAmount);
        } else {
            alert("Uang tidak cukup untuk All In!");
        }
    }
