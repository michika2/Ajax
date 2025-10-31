<!-- resources/views/students/index.blade.php -->
<!DOCTYPE html>
<html lang=""ja>
<head>
    <meta charset="UTF-8">
    <title>学生詳細</title>
</head>
<body>
    <h1>学生詳細</h1>
    <p>ID:{{ $student->id }}</p>
    <p>名前:{{ $student->name }}</p>
    <p>学年:{{ $student->grade }}</p>
    <p>住所:{{ $student->address }}</p>
    <p>コメント:{{ $student->comment }}</p>

    <p>
        <a href="{{ route('students.edit',$student->id) }}">編集</a>
        <a href="{{ route('students.index') }}">一覧へ戻る</a>
    </p>
</body>
</html>