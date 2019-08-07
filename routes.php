<?php

use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\LoopInterface;
use React\ChildProcess\Process;
use React\Http\Response;

return [
    '/' => function (ServerRequestInterface $request, LoopInterface $loop) {
      $childProcess = new Process('ping 8.8.8.8');
      $childProcess->start($loop);
      return new Response(
       200, ['Content-Type' => 'text/plain; charset=UTF-8'],
       file_get_contents('pages/index.html');
     );
   },
    '/upload' => function (ServerRequestInterface $request) {
      return new Response(
        200, ['Content-Type' => 'text/plain; charset=UTF-8'], 'Страница загрузки'
      );
    },
];
// у нам нет этого
