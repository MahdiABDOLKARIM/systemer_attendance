<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            color: black;
            direction: rtl;
        }

        /* دکمه باز و بسته‌شدن */
        .toggle-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #333;
            color: white;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 11;
        }

        .toggle-btn:hover {
            background-color: #444;
        }

        .dashboard-container {
            background-color: rgba(255, 255, 255, 1);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
            margin-top: 100px; /* فاصله از بالا برای نمایش بهتر */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 40px;
        }

        h1 {
            font-size: 2rem;
            color: black;
            margin-bottom: 30px;
            text-align: center;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px 25px;
            font-size: 1.1rem;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-add {
            background-color: #4CAF50;
        }
        .btn-add:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .btn-attendance {
            background-color: #2196F3;
        }
        .btn-attendance:hover {
            background-color: #1976D2;
            transform: scale(1.05);
        }

        .btn-employees {
            background-color: #FFC107;
        }
        .btn-employees:hover {
            background-color: #FFB300;
            transform: scale(1.05);
        }

        .btn-view-attendance {
            background-color: #f44336;
        }
        .btn-view-attendance:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- داشبورد -->
    <div class="dashboard-container">
        <h1>خوش آمدید به صفحه کاربر گرامی</h1>

        <!-- دکمه‌ها به صورت عمودی -->
        <a href="{{ route('employees.create') }}" class="btn btn-add">افزودن کارمند جدید</a>
        <a href="{{ route('attendance.index') }}" class="btn btn-attendance">ثبت ورود و خروج کارمندان</a>
        <a href="{{ route('employees.index') }}" class="btn btn-employees">مشاهده لیست کارمندان</a>
        <a href="{{ route('attendance.filter') }}" class="btn btn-view-attendance">مشاهده زمان‌های ورود و خروج</a>
    </div>

    <script>
        function toggleNavbar() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('open');
        }
    </script>

</body>
</html>
