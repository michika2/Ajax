<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>学生一覧</title>
</head>
<body>
    <h1>学生一覧</h1>
    <ul>
        @foreach ($students as $student)
            <li>名前: {{$student->name}}
        @endforeach
    </ul>
</body>
</html>