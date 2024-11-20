<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست ادمین‌ها</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            color: black;
            direction: rtl;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #f4f4f4;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-delete:hover {
            background-color: #d32f2f;
        }
        .btn-back {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        .btn-back:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>لیست ادمین‌ها</h1>

        <table>
            <thead>
                <tr>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>اقدام</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <!-- دکمه حذف ادمین -->
                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('آیا مطمئن هستید که این ادمین را حذف می‌کنید؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- دکمه بازگشت به داشبورد -->
        <a href="{{ route('dashboard') }}" class="btn-back">بازگشت به داشبورد</a>
    </div>

</body>
</html>
