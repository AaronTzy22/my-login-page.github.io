<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .outer {
            width: 400px;
            padding: 20px;
            border: 2px solid black;
            border-radius: 10px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .character {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: url('./images/image.png') no-repeat center center; /* Replace with the correct path */
            background-size: contain;
            transition: transform 0.5s; /* Animation transition */
            position: relative;
        }

        .cover-eyes {
            animation: coverEyes 0.5s forwards;
        }

        @keyframes coverEyes {
            0% {
                transform: rotateX(0); /* Initial position */
            }
            50% {
                transform: rotateX(45deg); /* Hand covering eyes */
            }
            100% {
                transform: rotateX(90deg); /* Complete cover */
            }
        }

        @keyframes uncoverEyes {
            0% {
                transform: rotateX(90deg); /* Start from fully covered */
            }
            100% {
                transform: rotateX(0); /* End at initial position */
            }
        }

        p {
            margin: 0 0 10px 0;
            color: #666;
            font-size: 16px;
        }

        .in {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 0 auto 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        #bt {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, left 0.3s;
        }

        #bt:hover {
            background: #0056b3;
        }

        .footer {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            font-size: 14px;
            animation: slideInOut 3s infinite; /* Animation to slide in and out */
        }

        @keyframes slideInOut {
            0% {
                transform: translateY(100%); /* Start below the screen */
            }
            50% {
                transform: translateY(0); /* Move to the visible position */
            }
            100% {
                transform: translateY(100%); /* Move below the screen again */
            }
        }
    </style>
    <script>
        function fa() {
            const inputA = document.getElementById("a");
            const inputB = document.getElementById("b");
            const button = document.getElementById("bt");

            if (inputA.value === "" || inputB.value === "") {
                f();
                inputA.style.border = "2px solid red";
                inputB.style.border = "2px solid red";
                button.value = "Please provide data";
            } else {
                inputA.style.border = "2px solid green";
                inputB.style.border = "2px solid green";
                button.value = "All good now";
                button.style.left = "0";
            }
        }

        let flag = 1;
        function f() {
            const button = document.getElementById("bt");

            if (flag === 1) {
                button.style.left = "30px";
                flag = 2;
            } else if (flag === 2) {
                button.style.left = "0";
                flag = 1;
            }
        }

        // Character animation logic
        window.onload = function() {
            const character = document.getElementById('character');
            const inputA = document.getElementById('a');
            const inputB = document.getElementById('b');

            function updateEyesAnimation() {
                if (inputB.value.length > 0) {
                    character.classList.add('cover-eyes');
                    character.classList.remove('uncover-eyes');
                } else {
                    character.classList.add('uncover-eyes');
                    character.classList.remove('cover-eyes');
                }
            }

            // Show typing animation on username field
            inputA.addEventListener('focus', () => {
                character.classList.remove('cover-eyes');
                character.classList.add('uncover-eyes');
            });

            // Cover eyes when typing in the password field
            inputB.addEventListener('focus', () => {
                character.classList.add('cover-eyes');
                character.classList.remove('uncover-eyes');
            });

            // Uncover eyes based on input length when typing or deleting
            inputB.addEventListener('input', updateEyesAnimation);

            // Uncover eyes when password field is blurred
            inputB.addEventListener('blur', () => {
                character.classList.add('uncover-eyes');
                character.classList.remove('cover-eyes');
            });
        }
    </script>
</head>
<body>
    <div class="outer">
        <!-- Character animation -->
        <div id="character" class="character"></div>
        
        <h1>Aaron's Login</h1>
        <p>Student ID</p>
        <input class="in" type="text" placeholder="Enter ID" id="a"/>
        <p>Enter Password</p>
        <input class="in" type="password" placeholder="Enter password" id="b"/>
        <br>
        <input type="submit" onmouseenter="fa()" onclick="alert('Yes, you are correct!')" id="bt" value="Submit"/>
    </div>
    <div class="footer">
        Developer by: Aaron Magasin Cordova
    </div>
</body>
</html>
