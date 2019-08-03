<?php
    class Security
    {
        public static function hash($password)
        {
            $options = [
                'cost' => 15,
            ];
            return password_hash($password, PASSWORD_BCRYPT, $options);
        }
            
            
    }
