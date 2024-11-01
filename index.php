<?php
require_once __DIR__ . '/vendor/autoload.php';

use Pimple\Container;

$app = new Silex\Application();

// 入力ページ
$app->get('/', function () {
    return '
        <h1>Input Form</h1>
        <form action="/hello/name" method="POST">
            <label for="name">Enter your name:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Submit</button>
        </form>
    ';
});

// フォームデータを処理するページ
$app->post('/hello/name', function () use ($app) {
    // PHPのスーパーグローバル $_POST を使用してデータを取得
    $name = isset($_POST['name']) ? $_POST['name'] : 'Guest';

    // リダイレクトして、GETリクエストで名前をURIに埋め込む
    return $app->redirect("/hello/name/$name");
});

// 名前を表示するページ
$app->get('/hello/name/{name}', function ($name) use ($app) {
    return '<h1>Hello, ' . htmlspecialchars($name) . '!</h1>';
});

// エラーハンドリング
$app->error(function (\Exception $e, $code) {
    return '<h1>Error ' . $code . '</h1><p>' . $e->getMessage() . '</p>';
});

// サーバーを起動
$app->run();