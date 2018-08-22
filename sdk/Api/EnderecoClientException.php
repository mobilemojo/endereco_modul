<?php

/**
 * Class EnderecoClientException
 * Base class for any kind of Exception thrown by the Endereco API.
 */
class EnderecoClientException extends Exception {
    public function __construct($message, $code, Exception $previous)
    {
        parent::__construct($message, $code, $previous);
    }
}