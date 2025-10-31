<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <titile>メニュー画面</title>
        <style>
            body{font-family:sans-serif; margin:30px;}
            h1{margin-bottom:20px;}
            a{display:inline-block; margin:10px 0; padding:10px 20px; border;1px solid #aaa; text-decoration:none; border-radius:5px;}
            a:hover{background:#eee;}
        </style>
    </head>
    <body>
        <h1>メニュー画面</h1>
        <a href="{{route('students.index')}}">学生管理へ</a><br>
        <a href="{{route('school-grades.index')}}">成績管理へ</a><br>
    <body>
</html>