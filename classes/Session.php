<?php

class Session {
    public function start(): void
    {
        session_start();
    }

    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function clear(): void
    {
        session_unset();
        session_destroy();
    }
}