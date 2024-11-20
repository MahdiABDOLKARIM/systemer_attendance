<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Login</title>
    <style>
        /* طراحی پس زمینه */
        body {
            font-family: 'Arial', sans-serif;
            background: #333333;
            background-image: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.2));
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        /* قالب کلی فرم */
        .login-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #fff;
        }

        /* طراحی ورودی‌ها */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: background-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* دکمه ورود */
        button {
            padding: 12px 25px;
            font-size: 1.1rem;
            background-color: #ff6f61;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #ff4e42;
            transform: scale(1.05);
        }

        button:focus {
            outline: none;
        }

        /* افکت نورانی پس زمینه */
        .glowing-border {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.2));
            animation: glow 3s infinite alternate;
            filter: blur(15px);
        }

        @keyframes glow {
            0% {
                opacity: 0.4;
            }
            100% {
                opacity: 1;
            }
        }

    </style>
</head>
<body>

    <!-- افکت نورانی پس زمینه -->
    <div class="glowing-border"></div>

    <!-- فرم لاگین سوپر ادمین -->
    <div class="login-container">
        <h2>لاگین سوپر ادمین</h2>
        <form method="POST" action="{{ route('superadmin.login') }}">
            @csrf
            <label for="email" style="display:block; margin-bottom: 8px;">ایمیل:</label>
            <input type="email" name="email" required><br>

            <label for="password" style="display:block; margin-bottom: 8px;">رمزعبور:</label>
            <input type="password" name="password" required><br>

            <button type="submit">ورود</button>
        </form>
    </div>

</body>
</html>