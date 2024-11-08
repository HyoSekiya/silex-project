<?php
require_once __DIR__ . '/vendor/autoload.php';
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

// silexインスタンス生成
$app = new Application();

// デバッグモードをON（デフォルトはfalseだった）
$app['debug'] = true;

/**
 * GET
 */
$app->get('/TUNNEL', function (Request $request) use ($app) {

    // リクエストのmethodを取得
    $method = $request->getMethod();

    // リクエストのheaderを全部取得
    $header = $request->headers->all();

    // リクエストのパスを取得
    $path = $request->getPathInfo();

    return $app->json([$method, $header, $path]);
});


/**
 * POST
 */
$app->post('/TUNNEL', function (Request $request) use ($app) {

    // リクエストのmethodを取得
    $method = $request->getMethod();

    // リクエストのheaderを全部取得
    $header = $request->headers->all();

    // リクエストのパスを取得
    $path = $request->getPathInfo();

    // リクエストボディを取得
    $body = $request->getContent();

    return $app->json([$method, $header, $path, $body]);
});

/**
 * PATCH
 */
$app->patch('/TUNNEL', function (Request $request) use ($app) {

    // リクエストのmethodを取得
    $method = $request->getMethod();

    // リクエストのheaderを全部取得
    $header = $request->headers->all();

    // リクエストのパスを取得
    $path = $request->getPathInfo();

    // リクエストボディを取得
    $body = $request->getContent();

    return $app->json([$method, $header, $path, $body]);
});

try {
    $app->run();
} catch (Exception $e) {
    error_log('エラー吐いた。' . $e->getMessage());
}