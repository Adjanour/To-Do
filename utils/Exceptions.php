<?php
/**
 * Custom exception class for when a configuration file is not found.
 */
class FileNotFoundException extends Exception
{
    /**
     * FileNotFoundException constructor.
     *
     * @param string $message A custom error message indicating the file that was not found.
     * @param int $code       The error code (optional).
     * @param Throwable|null $previous The previous throwable used for the exception chaining (optional).
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

/**
 * Custom exception class for when a specified key is not found in the configuration file.
 */
class KeyNotFoundException extends Exception
{
    /**
     * KeyNotFoundException constructor.
     *
     * @param string $message A custom error message indicating the key that was not found.
     * @param int $code       The error code (optional).
     * @param Throwable|null $previous The previous throwable used for the exception chaining (optional).
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

/**
 * Custom exception class for when the configuration file does not return a valid array.
 */
class InvalidConfigException extends Exception
{
    /**
     * InvalidConfigException constructor.
     *
     * @param string $message A custom error message indicating the issue with the configuration file.
     * @param int $code       The error code (optional).
     * @param Throwable|null $previous The previous throwable used for the exception chaining (optional).
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
