<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>المستخدمون</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            direction: rtl;
            text-align: right;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }
        .card-body {
            border: 1px solid #dee2e6;
            border-radius: 0 0 5px 5px;
            background-color: white;
            padding: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: right;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="card-header">
        <h4 class="mb-0">معلومات المستخدمين</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">الاسم</th>
                    <th scope="col">البريد الإلكتروني</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>