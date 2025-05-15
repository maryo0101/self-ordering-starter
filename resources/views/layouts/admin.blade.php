<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ページ</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- スタイルシートなどのリンク -->
</head>
<body>
    <header>
        <nav>
            <!-- ナビゲーションメニュー -->
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 自作QRコード注文システム</p>
    </footer>
</body>
</html>
