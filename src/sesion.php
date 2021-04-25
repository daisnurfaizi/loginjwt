<?php

use \Firebase\JWT\JWT;

require_once __DIR__ . '/../vendor/autoload.php';
class Session
{
    public function __construct(public string $username, public string $role)
    {
    }
}

class SessionManager
{
    public static string $SEKRET_KEY = "sefdja'dfjasd[kfasdfasdf,/,v/./.>?";
    public static function login(string $username, string $password): bool
    {
        if ($username == "Dais" && $password == "Dais") {
            $payload = [
                "username" => $username,
                "role" => "admin"
            ];

            $jwt = JWT::encode($payload, SessionManager::$SEKRET_KEY, 'HS256');

            setcookie("Daisl-x", $jwt);
            return true;
        } else {
            return false;
        }
    }
    public static function getCurrentSession(): Session
    {
        if ($_COOKIE['Daisl-x']) {
            $jwt = $_COOKIE['Daisl-x'];
            try {

                $payload = JWT::decode($jwt, SessionManager::$SEKRET_KEY, ['HS256']);

                return new Session(username: $payload->username, role: $payload->role);
            } catch (Exception $exception) {
                //throw $th;
                throw new Exception("User not login");
            }
        } else {
            throw new Exception("User not login");
        }
    }
}
