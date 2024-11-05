<?php
require_once __DIR__ . '/vendor/autoload.php';
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

// silexインスタンス生成
$app = new Application();

// デバッグモードをON（デフォルトはfalseだった）
$app['debug'] = true;

/**
 * トンネル（method:POST, MIME:application/json）
 */
$app->post('/tunnel', function (Request $request) use ($app) {
    $body = $request->request->all();

    if (isset($body['message'])) {
        $message = $body['message'];
        $response = ['message' => 'Hello ' . $message];
    } else {
        $response = [
            'error' => true,
            'message' => 'The "message" key is missing in the request body.'
        ];
    }

    return $app->json($response);
});

/**
 * テスト用(method:GET)
 */
$app->get('/get', function () use ($app){
    return $app->json(['name'=> 'taro']);
});

/**
 * テスト用(method:POST)
 */
$app->post('/post', function (Request $request) use ($app) {

    $body = json_decode($request->getContent(), true); // associativeがtureだと返されるオブジェクトは連想配列形式になるらしい。
    if (isset($body['name'])) {
        $message = $body['name'];
        return new JsonResponse(['result' => 'ok', 'name' => $body['name']]);
    } else {
        return new JsonResponse(['result' => 'ng']);
    }
});


try {
    $app->run();
} catch (Exception $e) {
    error_log('エラー吐いた。' . $e->getMessage());
}