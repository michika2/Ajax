<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>管理ユーザ新規登録</title>
  <style>
    body{font-family:sans-serif;margin:24px;}
    .wrap{max-width:480px;margin:auto;border:1px solid #e5e7eb;padding:20px;border-radius:8px;}
    .field{margin-bottom:12px;}
    label{display:block;margin-bottom:6px;}
    input{width:100%;padding:8px;border:1px solid #d1d5db;border-radius:6px;}
    .error{color:#b91c1c;font-size:13px;margin-top:4px;}
    .btn{padding:10px 14px;border:1px solid #d1d5db;border-radius:6px;background:#f9fafb;cursor:pointer;}
    .alert{margin-bottom:12px;padding:10px;border:1px solid #a7f3d0;background:#ecfdf5;border-radius:6px;}
  </style>
</head>
<body>
  <div class="wrap">
    <h1>管理ユーザ新規登録</h1>

    @if (session('status'))
      <div class="alert">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
      <div class="error" style="margin-bottom:10px;">入力に誤りがあります。各項目をご確認ください。</div>
    @endif

    <form action="{{ route('admin.register.store') }}" method="post">
      @csrf

      <div class="field">
        <label for="user_name">ユーザー名</label>
        <input id="user_name" name="user_name" type="text" value="{{ old('user_name') }}" autocomplete="off">
        @error('user_name') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="field">
        <label for="email">メールアドレス</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="field">
        <label for="password">パスワード</label>
        <input id="password" name="password" type="password">
        @error('password') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="field">
        <label for="password_confirmation">パスワード（確認）</label>
        <input id="password_confirmation" name="password_confirmation" type="password">
      </div>

      <button class="btn" type="submit">登録する</button>
      <a class="btn" href="/menu" style="text-decoration:none;">メニューへ戻る</a>
    </form>
  </div>
</body>
</html>