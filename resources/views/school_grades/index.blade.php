<!DOCTYPE html>
<html>
<head>
    <title>成績一覧</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th, td{
            border:1px solid #333;
            padding:5px;
            text-align: center;
        }
    </style>
</head>
<body>
    @if(session('status'))
    <div style="margin:12px 0;padding:10px;border:1px solid #4CAF50;background:#E8F5E9;color:#2E7D32;">
        {{ session('status') }}
    </div>
    @endif
    @if($errors->any())
    <div style="margin:12px 0;padding:10px;boder:1px solid #E53935;background:#FFEBEE;color:#C62828">
        <ul style="margin:0;padding-left:18px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        <ul>
    </div>
    @endif

    <h1>成績一覧ページ</h1>
    <p>
    <a href="{{ route('school-grades.create') }}"
    style="display:inline-block;padding:6px 10px;border:1px solid #2196F3;background:#E3F2FD;text-decoration:none;">+ 新規登録</a>
    </p>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Math</th>
            <th>English</th>
            <th>Science</th>
            <th>Created At</th>
        </tr>

        <form action="{{ route('students.index') }}" method="GET">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前で検索">
        <button type="submit">検索</button>
        </form>

        <a href="{{ route('students.index', ['sort' => 'asc', 'keyword' => request('keyword')]) }}">学年昇順</a>
        <a href="{{ route('students.index', ['sort' => 'desc', 'keyword' => request('keyword')]) }}">学年降順</a>

        @foreach ($grades as $grade)
        <tr>
            <td>{{ $grade->id }}</td>
            <td>{{ $grade->student_id }}</td>
            <td>{{ $grade->math }}</td>
            <td>{{ $grade->english }}</td>
            <td>{{ $grade->science }}</td>
            <td>{{ $grade->created_at }}</td>
            <td><a href="{{ route('school-grades.edit',$grade->id) }}">編集</a>

            <form action="{{ route('school-grades.destroy',$grade->id) }}" method="POST" style="display:inline"
            onsubmit="return confirm('この成績を削除します。よろしいですか？');">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
        @if(session('status'))
            <p style="color:green">{{ session('status') }}</p>
        @endif
</body>
</html>