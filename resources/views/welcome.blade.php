<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1e1e1e, #333333);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .btn {
            padding: 15px 30px;
            font-size: 1.2rem;
            background-color: #ff6f61;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #ff4e42;
            transform: scale(1.1);
        }

        .btn:focus {
            outline: none;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div>
        <h1>خوش آمدید به سایت</h1>

        <!-- دکمه ورود به سیستم -->
        <a href="{{ route('superadmin.login.form') }}">
            <button class="btn">ورود سوپر ادمین</button>
        </a>
    </div>

</body>
</html>