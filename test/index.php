<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/src/Image/tedx.png" />
    <meta name="description"
        content="Software Club 2023 developed a WiFi credential portal to commemorate TEDxDWIT 2023." />
    <title>TEDxDWIT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter&family=Merriweather:ital,wght@1,700&family=Poppins:ital,wght@0,500;1,100&display=swap");

        :root {
            font-family: Poppins, Inter, system-ui, Avenir, Helvetica, Arial,
                sans-serif;
            --primary: #eb0028;
            --secondary: #000000;
            --tertiary: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: #000;
            color: var(--tertiary);
        }

        .header__container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            letter-spacing: 2px;
            text-align: center;
            margin-top: -35px;
        }

        .header__content {
            display: flex;
            flex-direction: column;
            margin-top: 25px;
            text-align: center;
        }

        .heading {
            font-size: xx-large;
            font-weight: bold;
            margin: 0;
        }

        .heading__text {
            background-color: #000;
            font-size: 25px;
            font-weight: lighter;
            margin-top: -5px;
        }

        .counter__container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            letter-spacing: 2px;
            margin-top: -25px;
        }

        .timing__container {
            display: flex;
            flex-direction: row;
            align-items: center;
            font-size: large;
        }

        .timing__box {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
        }

        .timing__box__number {
            font-size: xx-large;
            font-weight: bold;
        }

        .timing__box__text {
            font-size: small;
            font-weight: bold;
        }

        .login__container {
            background-color: var(--secondary);
            border-radius: 5px;
            padding: 2rem;
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
            transition: all 0.1s ease-in-out;
            display: block;
            margin: 0 auto;
            width: 400px;
            letter-spacing: 2px;
            margin-top: -10px;
        }

        .login__container form input {
            background-color: var(--secondary);
            color: var(--tertiary);
            display: block;
            padding: 13px;
            border-radius: 5px;
            outline: none;
            font-size: 18px;
            letter-spacing: 1.5px;
            font-weight: bold;
            width: 100%;
            margin-bottom: 1rem;
            border: 1px solid var(--tertiary);
            transition: all 0.1s ease-in-out;
        }

        .login__container form input:focus {
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }

        .login__container form button {
            background-color: var(--primary);
            color: var(--tertiary);
            display: block;
            padding: 13px;
            border-radius: 5px;
            outline: none;
            font-size: 18px;
            letter-spacing: 1.5px;
            font-weight: bold;
            width: 100%;
            cursor: pointer;
            margin-bottom: 2rem;
            transition: all 0.1s ease-in-out;
        }

        .login__container form button:hover {
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }

        .label {
            color: var(--tertiary);
            margin-bottom: 10px;
            display: block;
            text-align: left;
        }

        .button {
            background-color: var(--primary);
            color: var(--tertiary);
            display: block;
            padding: 13px;
            border-radius: 5px;
            outline: none;
            font-size: 18px;
            letter-spacing: 1.5px;
            font-weight: bold;
            width: 100%;
            cursor: pointer;
            margin-bottom: 2rem;
            transition: all 0.1s ease-in-out;
            height: 50px;
            text-align: center;
        }

        .button:hover {
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }

        .credit {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -3px;
        }

        .credit-content {
            display: flex;
            align-items: center;
        }

        .club__logo {
            height: 100px;
        }
    </style>
</head>

<body>
    <main>
        <div class="header__container" style="color: var(--tertiary)">
            <!-- <h2 class='college text-4xl' style= "color: var(--primary)">Deerwalk Institute Of Technology <span class='text-white font-bold text-3xl '>presents</span> </h2> */} -->
            <div class="header__content">
                <h1 class="heading text-5xl mt-5" style="color: var(--primary)">
                    TED<sup style="color: var(--primary)">X</sup>
                </h1>
                <span class="heading__text">DWIT College</span>
            </div>
        </div>
        <section>
            <div class="counter__container">
                <div class="timing__container">
                    <div class="timing__box">
                        <div class="timing__box__number" style="color: var(--primary)">
                            00:
                        </div>
                        <div class="timing__box__text" style="color: var(--primary)">
                            Days:
                        </div>
                    </div>
                    <div class="timing__box">
                        <div class="timing__box__number" style="color: var(--tertiary)">
                            00:
                        </div>
                        <div class="timing__box__text" style="color: var(--tertiary)">
                            Hours:
                        </div>
                    </div>
                    <div class="timing__box">
                        <div class="timing__box__number" style="color: var(--tertiary)">
                            00:
                        </div>
                        <div class="timing__box__text" style="color: var(--tertiary)">
                            Minutes:
                        </div>
                    </div>
                    <div class="timing__box">
                        <div class="timing__box__number" style="color: var(--tertiary)">
                            00
                        </div>
                        <div class="timing__box__text" style="color: var(--tertiary)">
                            Seconds
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="content__container">
                <div class="login__container">
                    <form action="%%AUTH_POST_URL%%" method="post">
                        <div class="input__container">
                            <label class="label" htmlFor="username">Username</label>
                            <input class="input__info" type="text" id="username" placeholder="username"
                                name="%%USERNAMEID%%" />
                            <input type="hidden" name="%%REDIRID%%" value="%%PROTURI%%">

                            <input type="hidden" name="%%MAGICID%%" value="%%MAGICVAL%%">

                        </div>
                        <div class="input__container">
                            <label class="label" htmlFor="password">Password</label>
                            <input type="password" id="password" placeholder="password" name="%%PASSWORDID%%" />
                        </div>
                        <button type="submit" value="Login">Log In</button>
                        <span>Interested in joining ?</span><br />
                        <a href="https://tedx.deerwalk.edu.np/" target="_blank" rel="noopener noreferrer"
                            class="underline" style="color: var(--primary)">Register now!</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="credit">
            <div class="credit-content">
                <img src=".%%IMAGE:logo_dwitnew2%%" class="club__logo" alt="SOFTWARE CLUB LOGO" />
            </div>
        </div>
    </footer>
</body>

<script>
    console.log(
        "Developed By Bijay Shrestha (ZEROx0817), DWIT Software Club Member 2023"
    );
    const targetDate = new Date("2023-09-30T09:00:00").getTime();

    const updateCountdown = () => {
        const now = new Date().getTime();
        const timeRemaining = targetDate - now;

        if (timeRemaining <= 0) {
            clearInterval(interval);
            document.querySelector(".counter__container").textContent =
                "Event Started";
        } else {
            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor(
                (timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            const minutes = Math.floor(
                (timeRemaining % (1000 * 60 * 60)) / (1000 * 60)
            );
            const seconds = Math.floor(
                (timeRemaining % (1000 * 60)) / 1000
            );

            document.querySelector(".timing__box__number").textContent =
                addLeadingZero(days) + ":";
            document.querySelector(".timing__box__text").textContent =
                "Days:";

            document.querySelector(
                ".timing__box:nth-child(2) .timing__box__number"
            ).textContent = addLeadingZero(hours) + ":";
            document.querySelector(
                ".timing__box:nth-child(2) .timing__box__text"
            ).textContent = "Hours:";

            document.querySelector(
                ".timing__box:nth-child(3) .timing__box__number"
            ).textContent = addLeadingZero(minutes) + ":";
            document.querySelector(
                ".timing__box:nth-child(3) .timing__box__text"
            ).textContent = "Minutes:";

            document.querySelector(
                ".timing__box:nth-child(4) .timing__box__number"
            ).textContent = addLeadingZero(seconds);
            document.querySelector(
                ".timing__box:nth-child(4) .timing__box__text"
            ).textContent = "Seconds";
        }
    };

    const interval = setInterval(updateCountdown, 1000);
    updateCountdown();

    function addLeadingZero(number) {
        return number < 10 ? `0${number}` : number;
    }

    document.addEventListener("DOMContentLoaded", function () {
        anime({
            targets: ".heading",
            scale: [0.75, 1],
            opacity: [0, 1],
            delay: 250,
            duration: 2500,
            easing: "easeInOutQuad",
        });
        anime({
            targets: ".heading__text",
            scale: [0.75, 1],
            opacity: [0, 1],
            delay: 2500,
            duration: 2000,
            easing: "easeInOutQuad",
        });
        anime({
            targets: ".college",
            scale: [0.5, 1],
            opacity: [0, 1],
            delay: 1000,
            duration: 2000,
            easing: "easeInOutQuad",
        });

        anime({
            targets: ".timing__box__number",
            scale: [0.75, 1],
            opacity: [0, 1],
            delay: 2000,
            duration: 2000,
            easing: "easeInOutQuad",
        });

        anime({
            targets: ".timing__box__text",
            scale: [0.75, 1],
            opacity: [0, 1],
            delay: 2500,
            duration: 2000,
            easing: "easeInOutQuad",
        });
    });

    anime({
        targets: ".login__container",
        scale: [0.75, 1],
        opacity: [0, 1],
        delay: 250,
        duration: 200,
        easing: "easeInOutQuad",
    });

    anime({
        targets: ".credit",
        scale: [0.75, 1],
        opacity: [0, 1],
        delay: 2000,
        duration: 2000,
        easing: "easeInOutQuad",
    });
</script>

</html>