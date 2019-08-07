<?php

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Response;

class Router {
  private $routes = [];

  public function __invoke(ServerRequestInterface $request)
  {
    $path = $request->getUri()->getPath();

    if (!isset($this->routes[$path])) {
      return new Response(
        404,
        ['Content-Type' => 'text/html; charset=UTF-8'],
        "Нет обработчика запроса для $path"
      );
    }

    echo "Запрос: $path\n";
    $handler = $this->routes[$path];

    return $handler($request);
  }

  public function load($filename)
  {
      $routes = require $filename;
      foreach ($routes as $path => $handler) {
        $this->add($path, $handler);
      }
  }

  public function add($path, callable $handler)
  {
    $this->routes[$path] = $handler;
  }
}

 ?>
