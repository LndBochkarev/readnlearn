<?php


class ErrorHandler {
    private $errorMessage;
    
    public function __construct($errorMessage) {
        $this->errorMessage = $errorMessage;
    }
}
