<?php

namespace App\Symfony;

/**
 * Class ErrorBag
 *
 * This is a POC. Don't take it as possibly finish work.
 */
class ErrorBag
{
    private $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    /**
     * Here the error is a string but it will probably be better with an object.
     *
     * @param string $error
     */
    public function addError(string $error)
    {
        $this->errors[] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
