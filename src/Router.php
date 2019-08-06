<?php

class Router {
  public function __invoke($path)
  {
    echo "Запрос: $path\n";
  }
}

 ?>
