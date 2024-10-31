<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Quiz</title>
    <link rel="stylesheet" href="quizes-styles.css">
    <style>
  /* الخلفية والأنماط الأساسية */
  body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 20px;
            transition: background-color 0.5s ease; /* تأثير تغيير الخلفية */
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease; /* حركة دخول */
        }

        h2 {
            text-align: center;
            color: #022649;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .input-group {
            color: #1f5183;
            font-size: 16px;
            font-weight: 600;
        }
        .correct {
            color: #011427;
            font-size: 16px;
            font-weight: 600;
        }
        label {
            display: block;
            background: #e9eff6;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease; /* إضافة حركة */
        }
        label:hover {
            background: #d0d8e3;
            transform: translateY(-2px); /* حركة خفيفة للأعلى عند التحويم */
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #336699;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.1s ease; /* إضافة حركة */
        }
        .btn:hover {
            background-color: #85c1f8;
            transform: translateY(-2px); /* حركة خفيفة للأعلى عند التحويم */
        }
        .btn:active {
            transform: translateY(1px); /* حركة خفيفة للأسفل عند الضغط */
        }

        #result {
            display: none;
            margin-top: 20px;
            text-align: center;
            font-size: 20px;
            color: #021222;
            animation: fadeIn 0.5s ease; /* حركة ظهور النتيجة */
        }

        #timer {
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
            color: #022547;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Technology Quiz</h2>
        <div id="timer">Time Remaining: <span id="time">5:00</span></div>

        <form id="quizForm" action="save_score.php" method="POST">
            <input type="hidden" name="participant_id" value="1">
            <div class="input-group question" id="q1">
                <div class="question">
                    <p>1. What is the official name of the smartphone operating system developed by Google?</p>
                    <label><input type="radio" name="q1" value="A">A) IOS</label><br>
                    <label><input type="radio" name="q1" value="B">B) Android</label><br>
                    <label><input type="radio" name="q1" value="C">C) Windows</label><br>
                    <label><input type="radio" name="q1" value="D">D) HarmonyOS</label>
                    <p class="correct" style="display: none;">Correct answer: B) Android</p>
                </div>
                
                <div  class="input-group question" id="q2">
                    <p>2. Which of these companies is known for producing foldable smartphones?</p>
                    <label><input type="radio" name="q2" value="A">A) Nokia</label><br>
                    <label><input type="radio" name="q2" value="B">B) Samsung</label><br>
                    <label><input type="radio" name="q2" value="C">C) Sony</label><br>
                    <label><input type="radio" name="q2" value="D">D) HTC </label>
                    <p class="correct" style="display: none;">Correct answer: B) Samsung</p>
                </div>
                
                <div  class="input-group question" id="q3">
                    <p>3. What is the term for artificial intelligence that interacts with users through conversation?</p>
                    <label><input type="radio" name="q3" value="A">A) Virtual Assistant</label><br>
                    <label><input type="radio" name="q3" value="B">B) Robot</label><br>
                    <label><input type="radio" name="q3" value="C">C) Operating System</label><br>
                    <label><input type="radio" name="q3" value="D">D) Software</label>
                    <p class="correct" style="display: none;">Correct answer: A) Virtual Assistant</p>
                </div>
                
                <div  class="input-group question" id="q4">
                    <p>4. Which of these technologies is primarily used to enhance user experience on smartphones?</p>
                    <label><input type="radio" name="q4" value="A">A) Voice recognition</label><br>
                    <label><input type="radio" name="q4" value="B">B) Cloud computing</label><br>
                    <label><input type="radio" name="q4" value="C">C) High-speed internet</label><br>
                    <label><input type="radio" name="q4" value="D">D) All of the above</label>
                    <p class="correct" style="display: none;">Correct answer: D) All of the above</p>
                </div>
                
                <div class="input-group question" id="q5">
                    <p>5. What does "IOT" stand for in technology?</p>
                    <label><input type="radio" name="q5" value="A">A) Internet of Things</label><br>
                    <label><input type="radio" name="q5" value="B">B) Internet of Technology</label><br>
                    <label><input type="radio" name="q5" value="C">C) Internet of Transactions</label><br>
                    <label><input type="radio" name="q5" value="D">D) Internet of Techniques</label>
                    <p class="correct" style="display: none;">Correct answer: A) Internet of Things</p>
                </div>
                
                <div  class="input-group question" id="q6">
                    <p>6.What is the primary programming language used for developing Android applications?</p>
                    <label><input type="radio" name="q6" value="A">A) Swift</label><br>
                    <label><input type="radio" name="q6" value="B">B) Java</label><br>
                    <label><input type="radio" name="q6" value="C">C) C++</label><br>
                    <label><input type="radio" name="q6" value="D">D) Python</label>
                    <p class="correct" style="display: none;">Correct answer: B) Java</p>
                </div>
                
                <div class="input-group question" id="q7">
                    <p>7. What term is used to describe the process of converting physical documents into digital format?</p>
                    <label><input type="radio" name="q7" value="A">A) Digitization</label><br>
                    <label><input type="radio" name="q7" value="B">B) Virtualization</label><br>
                    <label><input type="radio" name="q7" value="C">C) Encoding</label><br>
                    <label><input type="radio" name="q7" value="D">D) Decoding</label>
                    <p class="correct" style="display: none;">Correct answer: A) Digitization</p>
                </div>
                
                <div class="input-group question" id="q8">
                    <p>8. What is the name of the first graphical web browser?</p>
                    <label><input type="radio" name="q8" value="A">A) Chrome</label><br>
                    <label><input type="radio" name="q8" value="B">B) Internet Explorer</label><br>
                    <label><input type="radio" name="q8" value="C">C) Mosaic</label><br>
                    <label><input type="radio" name="q8" value="D">D) Firefox</label>
                    <p class="correct" style="display: none;">Correct answer: C) Mosaic</p>
                </div>
                
                <div class="input-group question" id="q9">
                    <p>9. What is the purpose of a firewall in computer security?</p>
                    <label><input type="radio" name="q9" value="A">A) To speed up internet connection</label><br>
                    <label><input type="radio" name="q9" value="B">B) To block unauthorized access to or from a private network</label><br>
                    <label><input type="radio" name="q9" value="C">C) To back up files</label><br>
                    <label><input type="radio" name="q9" value="D">D) To store data</label>
                    <p class="correct" style="display: none;">Correct answer: B) To block unauthorized access to or from a private network</p>
                </div>
                
                <div class="input-group question" id="q10">
                    <p>10. Which virtual assistant is developed by Amazon?</p>
                    <label><input type="radio" name="q10" value="A">A) Siri</label><br>
                    <label><input type="radio" name="q10" value="B">B) Google Assistant</label><br>
                    <label><input type="radio" name="q10" value="C">C) Alexa</label><br>
                    <label><input type="radio" name="q10" value="D">D) Cortana</label>
                    <p class="correct" style="display: none;">Correct answer: C) Alexa</p>
                </div>
            <button type="submit" class="btn"> Submit</button>
        </form>
        <div id="result">
            <p id="score"></p>
            <button id="scoreButton" class="btn"><a href="home.html">BACK</a></button>
        </div>
        <script src="quizs.js"></script>
    <script>
     // Correct answers for the quiz
const correctAnswers = {
    q1: "B",
    q2: "B",
    q3: "A",
    q4: "D",
    q5: "A",
    q6: "B",
    q7: "A",
    q8: "C",
    q9: "B",
    q10: "C"
    };



</script>

</body>
</html>
