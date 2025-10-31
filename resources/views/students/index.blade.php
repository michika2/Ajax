<!-- resources/views/students/index.blade.php -->
<!DOCTYPE html>
<html lang=""ja>
<head>
    <meta charset="UTF-8">
    <title>学生一覧</title>
</head>
<body>
    <h1>学生一覧</h1>
    <ul>
        @foreach($students as $student)
        <li>
            名前: {{$student->name}}<br>
            学年: {{$student->grade}}<br>
            住所: {{$student->address}}<br>
            <a href="{{ route('students.show',$student->id) }}">[詳細]</a>
            <a href="{{ route('students.edit',$student->id) }}">[編集]</a>

            <form action="{{ route('students.destroy',$student->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">[削除]</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>