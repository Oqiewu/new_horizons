<?php
class AuthMiddleware
{
    public function handle($controller, $method, $params)
    {
        // Проверяем, существует ли токен в cookie
        if (!isset($_COOKIE['token'])) {
            // Если токена не существует, возвращаем ошибку
            http_response_code(401);
            echo 'Токен не найден';
            exit;
        }

        // Если токен существует, вызываем метод контроллера
        $class = new $controller();
        if (method_exists($class, $method)) {
            $result = call_user_func_array([$class, $method], $params);

            echo $result;
        } else {
            die('<p>Метод ' . $method . ' не существует в классе ' .  $controller. '</p>');
        }
    }
}
