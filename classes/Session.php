<?php

class Session {
    public function start() {
        session_start();
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public function has($key) {
        return isset($_SESSION[$key]);
    }

    public function clear() {
        session_unset();
        session_destroy();
    }
}