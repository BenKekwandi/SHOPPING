<?php

class AuthMiddleware {
    
    function __construct(){
        
    }

    public function isLoggedIn(){
        return true;
    }

    public function handle($request) {
        
        if (!$this->isLoggedIn()) {
            header('Location: /login');
            exit();
        }
    }
}
