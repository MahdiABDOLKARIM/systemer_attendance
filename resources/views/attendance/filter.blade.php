<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فیلتر حضور و غیاب</title>
    <!-- لینک به Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-dashboard {
            margin-bottom: 15px;
        }
        table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-center m-0">فیلتر حضور و غیاب</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-dashboard">بازگشت به داشبورد</a>
        </div>
        <form method="GET" action="{{ route('attendance.filter') }}" class="p-4 border rounded shadow-sm bg-light">
            <div class="mb-3">
                <label for="employee_id" class="form-label">کارمند</label>
                <select name="employee_id" id="employee_id" class="form-select">
                    <option value="">همه کاربران</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ request('employee_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="month" class="form-label">ماه</label>
                <input type="number" name="month" id="month" class="form-control" placeholder="ماه" value="{{ request('month') }}">
            </div>
            <div class="mb-3">
                <label for="day" class="form-label">روز</label>
                <input type="number" name="day" id="day" class="form-control" placeholder="روز" value="{{ request('day') }}">
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary w-100">جستجو</button>
            </div>
        </form>

        <h2 class="mt-5">نتایج فیلتر</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-3">
                <thead>
                    <tr>
                        <th>نام کارمند</th>
                        <th>زمان ورود</th>
                        <th>زمان خروج</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance->employee->name }}</td>
                            <td>{{ $attendance->check_in }}</td>
                            <td>{{ $attendance->check_out ?? 'ثبت نشده' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">رکوردی برای این فیلتر وجود ندارد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- اسکریپت‌های جاوااسکریپت -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
