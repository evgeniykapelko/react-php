<?php

require 'vendor/autoload.php';

use React\Http\Server;
use React\Http\Response;
use Psr\Http\Message\ServerRequestInterface;

$loop = React\EventLoop\Factory::create();
$router = new Router();

// создаем экземпляр сервера
$server = new Server(
  function (ServerRequestInterface $request) use ($router) {
    $router($request->getUri()->getPath());

    return new Response(
      200,
      ['Content-Type' => 'text/plan; charset=UTF-8'],
      "Привет, мир"
    );
  });

  $socket = new React\Socket\Server(6068, $loop);
  $server->listen($socket);

  echo 'Работает на '
      . str_replace('tcp:', 'http:', $socket->getAddress())
      . PHP_EOL;

  $loop->run();
