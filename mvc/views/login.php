<div class="container">
    <form action="../Login/UserLogin" method="POST">
        <div class="title">Login</div>
        <div class="input-box underline">
            <input type="text" name="username" placeholder="Enter Your username" required>
            <div class="underline"></div>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Enter Your Password" required>
            <div class="underline"></div>
        </div>
        <div class="input-box button">
            <input type="submit" name="buttonLogin" value="Continue">
        </div>
        <?php
        if ($data['result'] != "none") {
            if ($data['result'] == "true") {
                echo "Logged in successfully";
            } else {
                echo "Login failed";
            }
        }
        ?>
    </form>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    html,
    body {
        display: grid;
        height: 100vh;
        width: 100%;
        place-items: center;
        background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
    }

    ::selection {
        background: #ff80bf;

    }

    .container {
        background: #fff;
        max-width: 350px;
        width: 100%;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
    }

    .container form .title {
        font-size: 30px;
        font-weight: 600;
        margin: 20px 0 10px 0;
        position: relative;
    }

    .container form .title:before {
        content: '';
        position: absolute;
        height: 4px;
        width: 33px;
        left: 0px;
        bottom: 3px;
        border-radius: 5px;
        background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
    }

    .container form .input-box {
        width: 100%;
        height: 45px;
        margin-top: 25px;
        position: relative;
    }

    .container form .input-box input {
        width: 100%;
        height: 100%;
        outline: none;
        font-size: 16px;
        border: none;
    }

    .container form .underline::before {
        content: '';
        position: absolute;
        height: 2px;
        width: 100%;
        background: #ccc;
        left: 0;
        bottom: 0;
    }

    .container form .underline::after {
        content: '';
        position: absolute;
        height: 2px;
        width: 100%;
        background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
        left: 0;
        bottom: 0;
        transform: scaleX(0);
        transform-origin: left;
        transition: all 0.3s ease;
    }

    .container form .input-box input:focus~.underline::after,
    .container form .input-box input:valid~.underline::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    .container form .button {
        margin: 40px 0 20px 0;
    }

    .container .input-box input[type="submit"] {
        background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
        font-size: 17px;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .container .input-box input[type="submit"]:hover {
        letter-spacing: 1px;
        background: linear-gradient(to left, #99004d 0%, #ff0080 100%);
    }

    .container .option {
        font-size: 14px;
        text-align: center;
    }
</style>