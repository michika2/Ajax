<!DOCTYPE html>
<html>
<head>
    <title>学生追加フォーム</title>
</head>
<body>
    <h1>新しい学生を追加</h1>
    <form action="/students" method="POST">
        @csrf
        <label>名前: <input type="text" name="name"></label><br>
        <label>学年: <input type="number" name="grade"></label><br>
        <label>住所: <input type="text" name="address"></label><br>
        <label>コメント: <textarea name="comment"></textarea></label><br>
        <button type="submit">登録</button>
    </form>
</body>
</html>