<?php

use React\Http\Response
use Psr\Http\Message\ServerRequestInterface;

return [
    '/' => function (ServerRequestInterface $request) {
      return new Response(
       200, ['Content-Type' => 'text/plain; charset=UTF-8'], 'Главная страница'
     );
   },
    '/upload' => function (ServerRequestInterface $request) {
      return new Response(
        200, ['Content-Type' => 'text/plain; charset=UTF-8'], 'Страница загрузки'
      );
    },
];
