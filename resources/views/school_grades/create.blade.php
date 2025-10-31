<!DOCTYPE html>
<html>
<head>
    <title>成績登録フォーム</title>
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
    
    <h1>成績登録フォーム</h1>

    @if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('school-grades.store') }}"method="POST">
        @csrf
    <div>
        <label>Student ID:</label>
        <input type="number" name="student_id" value="{{ old('student_id') }}" required>
    </div>
    <div>
        <label>学年(Grade):</label>
        <input type="number" name="grade" value="{{ old('grade') }}" required>
    </div>
    <div>
        <label>学期(Term):</label>
        <input type="text" name="term" value="{{ old('term') }}" required>
    </div>
    <div>
        <label>国語(Japanese):</label>
        <input type="number" name="japanese" value="{{ old('japanese') }}" required>
    </div>
    <div>
        <label>数学(Math):</label>
        <input type="number" name="math" value="{{ old('math') }}" required>
    </div>
    <div>
        <label>理科(Science):</label>
        <input type="number" name="science" value="{{ old('science') }}" required>
    </div>
    <div>
        <label>社会(Social Studies):</label>
        <input type="number" name="social studies" value="{{ old('social studies') }}" required>
    </div>
    <div>
        <label>音楽(Music):</label>
        <input type="number" name="music" value="{{ old('music') }}" required>
    </div>
    <div>
        <label>家庭科(Home Economics):</label>
        <input type="number" name="home economics" value="{{ old('home economics') }}" required>
    </div>
    <div>
        <label>英語(English):</label>
        <input type="number" name="english" value="{{ old('english') }}" required>
    </div>
    <div>
        <label>美術(Art):</label>
        <input type="number" name="art" value="{{ old('art') }}" required>
    </div>
    <div>
        <label>保健体育(PE):</label>
        <input type="number" name="health_and_physical_education" value="{{ old('health_and_physical_education') }}" required>
    </div>

        <button type="submit">登録</button>
    </form>

    <p><a href="{{ route('school-grades.index') }}">←一覧へ戻る</a></p>
</body>
</html>