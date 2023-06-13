<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/image2.png') }}">

  <!-- Styles -->
  <style>
    body {
      font-family: 'Nunito', sans-serif;
      background-color: #F3F4F6;
    }

    .container {
      max-width: 100%;
      padding: 0 20px;
      margin: 0 auto;
    }

    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
    }

    .logo img {
      max-width: 200px;
      max-height: 200px;
      margin-right: 10px;
    }

    .logo-text {
      text-align: center;
    }

    .logo-text p {
      margin-bottom: 10px;
    }

    .logo-text h1 {
      font-size: 24px;
      font-weight: bold;
    }

    .menu {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .menu a {
      display: inline-block;
      padding: 10px 20px;
      margin-right: 10px;
      background-color: #007BFF;
      color: #FFFFFF;
      font-weight: bold;
      text-decoration: none;
      border-radius: 4px;
    }

    .menu a:hover {
      background-color: #0056b3;
    }

    @media (max-width: 768px) {
      .logo {
        flex-direction: column;
      }

      .logo img {
        margin-right: 0;
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="{{ asset('images/image3.png') }}" alt="トップ画像">
      <div class="logo-text">
        <p>全国のペンギン推し活データベース</p>
        <h1>ペン活</h1>
      </div>
    </div>
    <div class="menu">
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}">ホーム</a>
        @else
          <a href="{{ route('login') }}">ログイン</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}">ユーザー登録</a>
          @endif
        @endauth
      @endif
    </div>
  </div>
</body>
</html>
