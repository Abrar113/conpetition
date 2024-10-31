/*
        // Load saved answers from localStorage
        const loadAnswers = () => {
            const questions = Object.keys(correctAnswers);
            questions.forEach(question => {
                const savedAnswer = localStorage.getItem(question);
                if (savedAnswer) {
                    const radioButton = document.querySelector(`input[name="${question}"][value="${savedAnswer}"]`);
                    if (radioButton) {
                        radioButton.checked = true; // Check the saved answer
                    }
                }
            });
        };
*/


 // Timer setup
let timeLeft = 300; // 5 minutes in seconds
const timerElement = document.getElementById('time');
let timerInterval = setInterval(() => {
    if (timeLeft <= 0) {
        clearInterval(timerInterval);
        // Disable all radio buttons
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.disabled = true;
        });
        alert("Time's up! Please submit your answers.");
    } else {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        timeLeft--;
    }
}, 1000);

// Form submission handling
document.getElementById('quizForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission
    clearInterval(timerInterval); // Stop the timer

    let score = 0;
    const questions = Object.keys(correctAnswers);

    questions.forEach(question => {
        const userAnswer = document.querySelector(`input[name="${question}"]:checked`);
        const correctAnswer = correctAnswers[question];
        const answerDisplay = document.querySelector(`.question:nth-of-type(${parseInt(question.replace('q', ''))}) .correct`);

        // Check if user answered correctly
        if (userAnswer && userAnswer.value === correctAnswer) {
            score += 2; // Each question is worth 5 points
        } else {
            // Show the correct answer if the user's answer is incorrect
            answerDisplay.style.display = 'block';
        }

        // Disable radio buttons for this question
        const options = document.querySelectorAll(`input[name="${question}"]`);
        options.forEach(option => {
            option.disabled = true;
        });
    });

    // Display the result
    document.getElementById('score').innerText = `Your total score is: ${score} out of ${Object.keys(correctAnswers).length * 2}`;
    document.getElementById('result').style.display = 'block'; // Show the result div
    
    // Save answers to localStorage
    saveAnswers();
});


        // Form submission handling
        document.getElementById('quizForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            
            let score = 0;
            const questions = Object.keys(correctAnswers);

            questions.forEach(question => {
                const userAnswer = document.querySelector(`input[name="${question}"]:checked`);
                const correctAnswer = correctAnswers[question];
                const answerDisplay = document.querySelector(`.question:nth-of-type(${parseInt(question.replace('q', ''))}) .correct`);

                // Check if user answered correctly
                if (userAnswer && userAnswer.value === correctAnswer) {
                    score += 2; // Each question is worth 5 points
                } else {
                    // Show the correct answer if the user's answer is incorrect
                    answerDisplay.style.display = 'block';
                }

                // Disable radio buttons for this question
                const options = document.querySelectorAll(`input[name="${question}"]`);
                options.forEach(option => {
                    option.disabled = true;
                });
            });

            // Display the result
            document.getElementById('score').innerText = `Your total score is: ${score} out of ${Object.keys(correctAnswers).length * 2}`;
            document.getElementById('result').style.display = 'block'; // Show the result div
            
            // Save answers to localStorage
            saveAnswers();
        });

        // Load saved answers on page load
        window.onload = loadAnswers;
 