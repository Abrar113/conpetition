let words = {
    movies: [
        "Titanic", "Gladiator", "Avatar", "Memento",
        "Jaws", "Gravity", "Scream", "Frozen",
        "Seven", "Whiplash", "Django", "Trolls", "Hunger",
        "Divergent", "Shutter", "Arrival", "Wonder",
        "Soul", "Birdman", "Heat", "Alien", "Clerks", "Coco",
        "Zodiac", "Glitch", "Tango", "Moana", "Rush", "Chocolat",
        "Bicycle", "Sicario", "Coraline", "Mud", "Gravity",
        "Crouching", "Eagle", "Uncut", "Run", "Thelma", "Amour"
    ],
    sports: [
        "Soccer", "Basketball", "Baseball", "Tennis", "Cricket",
        "Rugby", "Hockey", "Golf", "Volleyball", "Badminton",
        "Swimming", "Boxing", "Gymnastics", "Athletics", "Cycling",
        "Surfing", "Rowing", "Sailing", "Fencing", "Skiing",
        "Lacrosse", "Handball", "Wrestling", "Softball", "Billiards",
        "Darts", "Climbing", "Parkour", "Triathlon", "Polo",
        "CrossFit", "Snooker", "Bobsleigh", "Skeleton"
    ],
    fruits: [
        "Apple", "Banana", "Orange", "Grape", "Pineapple",
        "Mango", "Strawberry", "Blueberry", "Raspberry", "Blackberry",
        "Watermelon", "Cantaloupe", "Honeydew", "Kiwi", "Peach",
        "Plum", "Cherry", "Apricot", "Papaya", "Guava",
        "Lychee", "Date", "Tangerine", "Nectarine",
        "Coconut", "Persimmon", "Mulberry", "Jackfruit", "Rambutan",
        "Sapodilla", "Quince", "Olive", "Soursop", "Cranberry",
        "Kumquat", "Durian", "Cherimoya"
    ]
};

let currentWord = "";
let guessedWords = 0;
let failedWords = 0;
let skippedWords = 0;
let wordList = [];
let remainingGuesses = 5; // تحديد عدد المحاولات هنا
let timer;
let timeRemaining = 600; 
let startTime; 
let totaltime = 0; 

document.getElementById("result-button").style.display = "none";
document.getElementById("skip-button").style.display = "none";

document.getElementById("start-button").addEventListener("click", function () {
    let category = document.getElementById("category-select").value;
    wordList = [...words[category]]; 
    timeRemaining = 600; 
    startTime = Date.now(); 
    startGame();
    startTimer(); 

    document.getElementById("skip-button").style.display = "inline";
});

document.getElementById("skip-button").addEventListener("click", function () {
    skippedWords++;
    moveToNextWord();
});

document.getElementById("next-button").addEventListener("click", function () {
    moveToNextWord();
});

function startGame() {
    document.getElementById("message").innerHTML = "";
    document.getElementById("result-display").innerHTML = ""; 
    remainingGuesses = 5; // إعادة تعيين عدد المحاولات عند بدء اللعبة
    if (wordList.length === 0) {
        gameOver();
        return;
    }
    currentWord = wordList.pop();
    displayWord();
}

function displayWord() {
    let display = currentWord.split("").map((letter, index) => {
        if (index === 0 || index === currentWord.length - 1 || index === currentWord.length - 4) {
            return letter;
        }
        return "_";
    }).join(" ");
    document.getElementById("word-container").innerHTML = display;
}

document.addEventListener("keypress", function (event) {
    // إذا كانت اللعبة قد انتهت، لا نسمح بأي إدخال جديد
    if (remainingGuesses <= 0 || wordList.length === 0) {
        document.getElementById("message").innerHTML = "Game over! Please move to the next word.";
        return; 
    }

    let guess = event.key.toLowerCase();

    if (currentWord.includes(guess.toLowerCase())) {
        updateWordDisplay(guess);
    } else {
        remainingGuesses--;
        document.getElementById("wrong-letters").innerHTML += guess + " ";
        if (remainingGuesses <= 0) {
            failedWords++;
            document.getElementById("message").innerHTML = "Wrong guessing! Move to the next.";
            document.getElementById("next-button").style.display = "inline";
        }
    }
});

function updateWordDisplay(guess) {
    let currentDisplay = document.getElementById("word-container").innerHTML.replace(/\s+/g, "");
    let newDisplay = currentWord.split("").map((letter, index) => {
        if (letter.toLowerCase() === guess || currentDisplay[index] !== "_") {
            return letter;
        }
        return "_";
    }).join(" ");

    document.getElementById("word-container").innerHTML = newDisplay.split("").join(" ");

    if (!newDisplay.includes("_")) {
        guessedWords++;
        document.getElementById("message").innerHTML = "Correct! Moving to the next word.";
        document.getElementById("next-button").style.display = "inline";
    }
}

function moveToNextWord() {
    document.getElementById("next-button").style.display = "none";
    document.getElementById("wrong-letters").innerHTML = "";
    document.getElementById("message").innerHTML = "";
    if (wordList.length === 0) {
        gameOver();
    } else {
        startGame();
    }
}

function gameOver() {
    clearInterval(timer);
    totaltime = Math.floor((Date.now() - startTime) / 1000); 
    document.getElementById("start-button").style.display = "none";
    document.getElementById("skip-button").style.display = "none";
    document.getElementById("next-button").style.display = "none";
    document.getElementById("result-button").style.display = "inline";
    document.getElementById("word-container").innerHTML = "";
    document.getElementById("timer").style.display = "none"; 
}

document.getElementById("result-button").addEventListener("click", function () {
    let resultMessage = `
        <p style="font-size:30px; color: red;">Game Over!</p>
        <p>Words guessed correctly: <strong>${guessedWords}</strong></p>
        <p>Words failed to guess: <strong>${failedWords}</strong></p>
        <p>Words skipped: <strong>${skippedWords}</strong></p>
        <p>Total time taken: <strong>${totaltime} seconds</strong></p>
        <button class="btn"><a href="home.html" style="color: black;">NEXT</a></button>
    `;
    document.getElementById("result-display").innerHTML = resultMessage;
    document.getElementById("result-button").style.display = "none";
});

function startTimer() {
    timer = setInterval(function () {
        timeRemaining--;

        let minutes = Math.floor(timeRemaining / 60);
        let seconds = timeRemaining % 60;

        seconds = seconds < 10 ? "0" + seconds : seconds;

        document.getElementById("timer").innerHTML = `Time remaining: ${minutes}:${seconds}`;

        if (timeRemaining <= 0) {
            clearInterval(timer);
            gameOver();
            document.getElementById("message").innerHTML = "Time's up! Game Over!";
        }
    }, 1000);
}
