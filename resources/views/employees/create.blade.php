<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن کارمند جدید</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* طراحی کلی صفحه */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            direction: rtl; /* راست‌چین کردن صفحه */
            text-align: right; /* تنظیم متن به راست */
        }

        /* پس‌زمینه و طراحی فرم */
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .alert {
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        /* استایل برای دکمه‌ها */
        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-secondary {
            background-color: #000000; /* رنگ مشکی */
            border-color: #000000; /* رنگ مشکی */
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            font-weight: normal; /* عدم پررنگ شدن دکمه */
        }

        .btn-secondary:hover {
            background-color: #444444; /* رنگ مشکی تیره هنگام hover */
            border-color: #444444; /* رنگ مشکی تیره هنگام hover */
        }

        /* فرم */
        .form-group label {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(0, 128, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>افزودن کارمند جدید</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">نام:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="surname">نام خانوادگی:</label>
            <input type="text" name="surname" id="surname" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">افزودن کارمند</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">بازگشت به داشبورد</a>
    </form>
</div>

</body>
</html>
