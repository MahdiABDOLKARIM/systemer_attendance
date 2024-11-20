<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت ورود و خروج کارمندان</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            direction: rtl; /* راست‌چین کردن کل صفحه */
            text-align: right; /* تنظیم متن به راست */
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #343a40;
        }
        .btn-success, .btn-danger {
            margin-left: 10px; /* فاصله دکمه‌ها از یکدیگر */
        }
        .alert {
            margin-top: 20px;
        }
        .search-bar {
            max-width: 300px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">ثبت ورود و خروج کارمندان</h1>

        <!-- فیلد جستجو -->
        <form action="{{ route('attendance.index') }}" method="GET" class="search-bar">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="جستجوی نام یا نام خانوادگی..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">جستجو</button>
                </div>
            </div>
        </form>

        <!-- نمایش پیام‌های خطا و موفقیت -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>آخرین زمان ورود</th>
                    <th>آخرین زمان خروج</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->surname }}</td>

                        @php
                            $lastAttendance = $employee->lastAttendance();
                        @endphp

                        <td>{{ $lastAttendance ? $lastAttendance->check_in : '-' }}</td>
                        <td>{{ $lastAttendance ? $lastAttendance->check_out : '-' }}</td>

                        <td>
                            <form action="{{ route('attendance.checkIn', $employee->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">ثبت ورود</button>
                            </form>
                            
                            <form action="{{ route('attendance.checkOut', $employee->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">ثبت خروج</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">بازگشت به داشبورد</a>
    </div>
</body>
</html>
