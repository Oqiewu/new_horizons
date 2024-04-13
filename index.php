<?php

include_once __DIR__ . "/Backend\Middleware\MiddlewareInterface.php";

include_once __DIR__ . "/Backend\Middleware\AuthMiddleware.php";

$url = $_GET['route'];

// Проверяем, открывается ли главная страница
if ($url == '/' || $url == '') {
    header('Location: /frontend/pages/main.html');
    exit;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $path_pattern = '/\/[^\/]+$/';
        $replacement = '';
        $path = preg_replace($path_pattern, $replacement, $url) . ".php";

        require_once $path;

        $pattern = '/\/([^\/]+)\/([^\/]+)$/';
        if (preg_match($pattern, $url, $matches)) {
            $class_name = $matches[1];
            $method_name = $matches[2];
            $vars = json_decode(file_get_contents("php://input"), true);
            // Проверка, является ли контроллер экземпляром интерфейса MiddlewareInterface
            if (is_subclass_of($class_name, MiddlewareInterface::class)) {
                $middleware = new AuthMiddleware();
                $middleware->handle($class_name, $method_name, array_values($vars));
            } else {
                $class = new $class_name();
                if (method_exists($class, $method_name)) {
                    $result = call_user_func_array([$class, $method_name], array_values($vars));
                    echo $result;
                } else {
                    die('<p>Метод ' . $method_name . ' не существует в классе ' .  $class_name. '</p>');
                }
            }
        }
        break;
        case 'GET':
            $path_pattern = '/backend\/Controller\/(?<controller>[^\/]+)\/(?<method>[^\/]+)(?:\/(?<id>[^\/]+))?$/';
        
            if (preg_match($path_pattern, $url, $matches)) {
                $class_name = $matches['controller'];
                $method_name = $matches['method'];
                $params = isset($matches['id']) ? [$matches['id']] : [];
        
                $path = "backend/Controller/{$class_name}.php";
                if (file_exists($path)) {
                    require_once $path;
        
                    // Проверка, является ли контроллер экземпляром интерфейса MiddlewareInterface
                    if (is_subclass_of($class_name, MiddlewareInterface::class)) {
                        $middleware = new AuthMiddleware();
                        $middleware->handle($class_name, $method_name, $params);
        
                    } else {
                        $class = new $class_name();
                        if (method_exists($class, $method_name)) {
                            $result = call_user_func_array([$class, $method_name], $params);
                            echo $result;
                        } else {
                            die('<p>Метод ' . $method_name . ' не существует в классе ' .  $class_name. '</p>');
                        }
                    }
                } else {
                    die('<p>Контроллер ' . $class_name . ' не существует</p>');
                }
            } else {
                die('<p>URL не соответствует шаблону</p>');
            }
            break;
        
    case 'PUT':
        $path_pattern = '/\/[^\/]+\/[^\/]+$/';
        $replacement = '.php';
        $path = preg_replace($path_pattern, $replacement, $url);
        
        require_once $path;
        
        $pattern = '/\/([^\/]+)\/([^\/]+)\/([^\/]+)$/';
        if (preg_match($pattern, $url, $matches)) {
            $class_name = $matches[1];
            $method_name = $matches[2];
            $id['id'] = $matches[3];
            $put_vars = json_decode(file_get_contents("php://input"), true);

            $params = array_merge($id, $put_vars);

            // Проверка, является ли контроллер экземпляром интерфейса MiddlewareInterface
            if (is_subclass_of($class_name, MiddlewareInterface::class)) {
                $middleware = new AuthMiddleware();
                $middleware->handle($class_name, $method_name, $params);

            } else {
                $class = new $class_name();
                if (method_exists($class, $method_name)) {
                    $result = call_user_func_array([$class, $method_name], $params);
                    echo $result;
                } else {
                    die('<p>Метод ' . $method_name . ' не существует в классе ' .  $class_name. '</p>');
                }
            }
        }
        break;
    // case 'DELETE':
    //     // Обработка DELETE-запроса
    //     break;
    default:
        die('<p>Метод ' . $_SERVER['REQUEST_METHOD'] . ' не поддерживается</p>');
}