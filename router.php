<?php

class router{
  static $routes = [];
  static function path($reqM, $uri, $hdl) {
    $uri = preg_replace("#\{(.*?)\}#", "([^\/]+)", $uri);
    return self::$routes[] = [$reqM, "#^$uri$#", $hdl];
  }

  static function handleRequest() {
    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
    // Ignore query string when matching routes (e.g. /calendar?year=...).
    $REQUEST_URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    foreach(self::$routes as $r) {
      [$reqM, $uri, $hdl] = $r;
      if($REQUEST_METHOD !== $reqM) continue;
      if(preg_match($uri, $REQUEST_URI, $matches)) {
        array_shift($matches);
        call_user_func_array($hdl, $matches);
        return 'success';
      }
    }
    move('/');
  }
}

function get($uri, $hdl) {
  Router::path('GET', $uri, $hdl);
}

function post($uri, $hdl) {
  Router::path('POST', $uri, $hdl);
}
