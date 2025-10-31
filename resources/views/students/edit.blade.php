<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生編集</title>
</head>
<body>
    <h1>学生編集</h1>
    
    <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')

        <label>名前:</label>
        <input type="text" name="name" value="{{ $student->name }}"><br>

        <label>学年:</label>
        <input type="number" name="grade" value="{{ $student->grade }}"><br>

        <label>住所:</label>
        <input type="text" name="address" value="{{ $student->address }}"><br>

        <label>コメント:</label>
        <textarea name="comment">{{ $student->comment }}</textarea><br>

        <button type="submit">更新</button>
    </form>
</body>
</html>