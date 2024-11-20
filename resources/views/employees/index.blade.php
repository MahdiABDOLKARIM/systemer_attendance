<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست کارمندان</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- برای استایل -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- آیکون‌ها -->
    <style>
        body {
            direction: rtl; /* راست‌چین کردن متن‌ها */
            text-align: right; /* راست‌چین کردن متن */
            font-size: 1.2rem; /* تغییر اندازه فونت متن */
        }

        h1 {
            text-align: right; /* راست‌چین کردن عنوان */
            font-size: 2rem; /* تغییر اندازه فونت عنوان */
        }

        .btn-danger {
            padding: 8px 16px;
            font-size: 1.1rem; /* تغییر اندازه فونت دکمه‌ها */
            display: inline-flex;
            align-items: center;
        }

        .btn-danger i {
            margin-left: 5px;
            font-size: 1.2rem; /* اندازه آیکون بزرگتر */
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            transition: background-color 0.3s ease;
        }

        .btn-danger:focus {
            outline: none;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.5);
        }

        table th, table td {
            text-align: right; /* راست‌چین کردن محتوای جدول */
            font-size: 1.2rem; /* تغییر اندازه فونت سلول‌های جدول */
        }

        /* استایل برای رنگ پس‌زمینه سیاه و متن سفید در سربرگ جدول */
        table th {
            background-color: #000; /* رنگ پس‌زمینه سیاه */
            color: #fff; /* رنگ متن سفید */
        }

        /* استایل برای دکمه بازگشت به داشبورد */
        .btn-back {
            background-color: #000; /* رنگ پس‌زمینه مشکی */
            color: #fff; /* رنگ متن سفید */
            font-size: 1.2rem;
            padding: 12px 25px;
            display: block;
            width: 200px;
            text-align: center;
            margin: 20px auto; /* دکمه را در وسط قرار می‌دهد */
            border-radius: 5px; /* گوشه‌های گرد */
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #444; /* رنگ پس‌زمینه هنگام هاور */
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>لیست کارمندان</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>فامیل</th>
                    <th>عملیات</th> <!-- ستونی برای دکمه حذف -->
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $index => $employee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->surname }}</td>
                        <td>
                            <!-- دکمه حذف با آیکون -->
                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">هیچ کارمندی وجود ندارد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- دکمه بازگشت به داشبورد -->
        <a href="{{ route('dashboard') }}" class="btn-back">بازگشت به داشبورد</a>
    </div>
</body>
</html>
