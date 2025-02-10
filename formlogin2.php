<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js" integrity="sha512-8E3KZoPoZCD+1dgfqhPbejQBnQfBXe8FuwL4z/c8sTrgeDMFEnoyTlH3obB4/fV+6Sg0a0XF+L/6xS4Xx1fUEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.min.js" integrity="sha512-RvUydNGlqYJapy0t4AH8hDv/It+zKsv4wOQGb+iOnEfa6NnF2fzjXgRy+FDjSpMfC3sjokNUzsfYZaZ8QAwIxg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js" integrity="sha512-5/OHwmQzDSBS0Ous4/hlYoWLHd06/d2r7LdKZQVBXOA6PvOqWVXtdboiLTU7lQTGyVoKVTNkwi0ol4gHGlw5ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineLite.min.js" integrity="sha512-I0VFyPo7hdM7YrEbQ0pvX4bX2904k0+B19u/xBrPrQoMprfcSnIDfGFD8kP52GbAhwtDjkEVhXlQvj8+vkJyew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js" integrity="sha512-/8phkpsAzxsbuX18zNkQ2gCq4Q5JsWoPo1jHLDeZorPUHRtx9YJxpdk+os05oDhPJVCNzA2/NMl4rmJyQ+6Fvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js" integrity="sha512-ht40uOoiTef4nKq0THVzjIGh3VS108J577LVVgNXnQLXza3doXjoM3owin2vd+Hm6w88k12RIrePIVY2WNzz6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/BezierPlugin.min.js" integrity="sha512-oOy5+mtZRcqjn6b9k4oj+tk2/hVIetzOAM9Y5cndEHgLxiIGavAz1agbHf6JjGzxXZ2SMbu08Uy1DDF0UwA0qQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Form Login</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif, bold;
    }

    /* Blue background for the entire page */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color:rgb(2, 79, 131); /* Blue background */
    }

    .box {
        position: relative;
        width: 380px;
        height: 420px;
        background: #e2bebe;
        border-radius: 8px;
        overflow: hidden;
    }

    /* Gradient animation for the background */
    .box::before,
    .box::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 380px;
        height: 420px;
        background: linear-gradient(0deg, transparent, transparent, #45f3ff, #45f3ff, #45f3ff);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
    }

    .box::after {
        animation-delay: -3s;
    }

    @keyframes animate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    /* Form styling */
    .box form {
        position: absolute;
        inset: 4px;
        background:rgb(23, 118, 196);
        padding: 50px 40px;
        border-radius: 8px;
        z-index: 2;
        display: flex;
        flex-direction: column;
    }

    .box form h2 {
        color: #fff;
        font-weight: 500;
        text-align: center;
        letter-spacing: 0.1em;
    }

    .box form .inputBox {
        position: relative;
        width: 300px;
        margin-top: 35px;
    }

    .box form .inputBox input {
        position: relative;
        width: 100%;
        padding: 20px 10px 10px;
        outline: none;
        border: none;
        box-shadow: none;
        background: transparent;
        font-size: 1em;
        letter-spacing: 0.05em;
        color: #23242a;
        z-index: 10;
        transition: 0.5s;
    }

    .box form .inputBox span {
        position: absolute;
        left: 0;
        padding: 20px 0px 10px;
        pointer-events: none;
        color:rgb(255, 255, 255);
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.5s;
    }

    .box form .inputBox input:valid ~ span,
    .box form .inputBox input:focus ~ span {
        color: #fff;
        font-size: 0.75em;
        transform: translateY(-34px);
    }

    .box form .inputBox i {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: #fff;
        border-radius: 4px;
        overflow: hidden;
        pointer-events: none;
        transition: 0.5s;
    }

    .box form .inputBox input:valid ~ i,
    .box form .inputBox input:focus ~ i {
        height: 44px;
    }

    .box form .links {
        display: flex;
        justify-content: space-between;
    }

    .box form .links a {
        margin: 10px 0;
        font-size: 0.75em;
        color: #ffffff;
        text-decoration: none;
    }

    .box form .links a:hover,
    .box form .links a:nth-child(2) {
        color: #fff;
    }

    .box form input[type="submit"] {
        border: none;
        outline: none;
        padding: 9px 25px;
        margin-top: 10px;
        width: 100px;
        background: #fff;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9em;
        font-weight: 600;
    }

    .box form input[type="submit"]:active {
        opacity: 0.8;
    }

    .paper-plane {
        height : 70px;
        position: absolute;
        top: 7%;
        left: 0%;
    }
</style>

<section class="animation">
    <img class="paper-plane" src="https://uce579a4975823ff812fe71dd3d8.previews.dropboxusercontent.com/p/thumb/ACjlzvbghTcGK22hzEGaRKta8KsFL33Dra3zY1Y81EwDvKMm0yhH8Bny9cQ0jmawWxL5Bg7Aq5sqMHODpIPJHlPFAEF7WuFggukXGP_xwzrAjnNL4HAKA1JKQH2PkO6vDf5FtECAlYE4e3nWXVTcF1zOjQpY_9bC2-eWc2aP1d6JOt4WXLrHjFAPBoONlu75kWjaVykhzi7nKe8bAEL2GMZ2CZ64mLR9eJppg-QGZxTl4fQl_wNWrqBsbv6nA8P4kyTpIgjtTA9iMDG6gZSZscHx5uv7qgkPPKkm_ntMidtmPRMdvi_zvg1Gc0zPro5cWPHu6AVatGYx60cBlMsEHBOv8cu5BKV_lBbkB9audq5p62d_Dv34JqjQdxxbAzHEFls/p.png?is_prewarmed=true" 
    alt="Logo"></a>
</section>

<body>
    <div class="box">
        <form method="POST" action="login2.php">
            <h2>LOGIN Mahasiswa</h2>

            <div class="inputBox">
                <input type="text" required="required" name="email">
                <span>Email</span>
                <i></i>
            </div>

            <div class="inputBox">
                <input type="password" required="required" name="password">
                <span>Password</span>
                <i></i>
            </div>

            <div class="links">
                <a href="#">Lupa password?</a>
            </div>

            <input type="submit" name="btnlogin" value="Login">
        </form>
    </div>
</body>

<script>
const flightPath = {
    curviness : 1.25,
    autoRotate : true,
    values : [
    {x: 100, y: -20}, 
    {x: 300, y: 10},
    {x: 500, y: 100},
    {x: 750, y: -100},
    {x: 350, y: -50},
    {x: 600, y: 100},
    {x: 800, y: 0},
]
};

const tween = new TimelineLite();

tween.add(
    TweenLite.to(".paper-plane", 1, {
        bezier: flightPath,
        ease: Power1.easeInOut 
    })
);
</script>
</html>
