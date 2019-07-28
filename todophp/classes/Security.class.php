<?php
    class Security
    {
        public $password;
        public $passwordConfirmation;

        public static function verifypasswords()
        {
            if ($this->password == $this->passwordConfirmation) {
                echo("<script>console.log('ok');</script>");
                $options = [
                    'cost' => 15,
                ];
                $hash = password_hash($this->password, PASSWORD_BCRYPT, $options);
                return true;
                return $hash;
            }
             else {
                return false;
            }
        }
            
            
    }
