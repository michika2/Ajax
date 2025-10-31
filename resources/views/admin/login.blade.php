<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>管理ユーザログイン</title>
  <style>
    body{font-family:sans-serif;margin:24px;}
    .wrap{max-width:480px;margin:auto;border:1px solid #ddd;padding:20px;border-radius:8px;}
    .field{margin-bottom:12px;}
    label{display:block;margin-bottom:6px;}
    input{width:100%;padding:8px;border:1px solid #bbb;border-radius:6px;}
    .btn{padding:8px 16px;background:#4A90E2;border:none;border-radius:4px;color:white;cursor:pointer;}
    .error{color:#b91c1c;font-size:13px;}
  </style>
</head>
<body>
  <div class="wrap">
    <h1>管理ユーザログイン</h1>

    @if(session('status'))
      <p style="color:green;">{{ session('status') }}</p>
    @endif

    @if ($errors->any())
      <p class="error">ログインに失敗しました。内容を確認してください。</p>
    @endif

    <form action="{{ route('admin.login.check') }}" method="post">
      @csrf
      <div class="field">
        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}">
      </div>

      <div class="field">
        <label>パスワード</label>
        <input type="password" name="password">
      </div>

      <button class="btn" type="submit">ログイン</button>
      <a href="/menu">メニューへ戻る</a>
    </form>
  </div>
</body>
</html>