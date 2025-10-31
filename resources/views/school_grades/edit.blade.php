<!DOCTYPE html>
<html>
<head>
    <title>成績編集フォーム</title>
</head>
<body>
    @if(session('status'))
    <div style="margin:12px 0;padding:10px;border:1px solid #4CAF50;background:#E8F5E9;color:#2E7D32;">
        {{ session('status')}}
    </div>
    @endif
    @if($errors->any())
    <div style="margin:12px 0;padding10px;boder:1px solid #E53935;background:#FFEBEE;color:#C62828">
        <ul style="margin:0;padding-left:18px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        <ul>
    </div>
    @endif
    
    <h1>成績編集フォーム</h1>

    @if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('school-grades.update',$grade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Student ID:</label>
        <input type="text" name="student_id" value="{{ $grade->student_id }}" readonly><br>

        <label>Math:</label>
        <input type="number" name="math" value="{{ old('math',$grade->math) }}"><br>

        <label>English:</label>
        <input type="number" name="english" value="{{ old('english',$grade->english) }}"><br>

        <label>Science:</label>
        <input type="number" name="science" value="{{ old('science',$grade->science) }}" required><br>

        <button type="submit">更新</button>
    </form>
</body>
</html>