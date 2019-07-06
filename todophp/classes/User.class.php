<?php

    require_once("Db.class.php");


    class User {
        private $username;
        private $fullname;
        private $password;
        private $email;
        private $education;
        private $avatar;
        private $passwordConfirmation;


        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }
        

        /**
         * Get the value of fullname
         */ 
        public function getFullname()
        {
                return $this->fullname;
        }

        /**
         * Set the value of fullname
         *
         * @return  self
         */ 
        public function setFullname($fullname)
        {
                $this->fullname = $fullname;

                return $this;
        }


        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }


        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }


        /**
         * Get the value of passwordConfirmation
         */ 
        public function getPasswordConfirmation()
        {
                return $this->passwordConfirmation;
        }

        /**
         * Set the value of passwordConfirmation
         *
         * @return  self
         */ 
        public function setPasswordConfirmation($passwordConfirmation)
        {
                $this->passwordConfirmation = $passwordConfirmation;

                return $this;
        }


        /**
         * Get the value of avatar
         */ 
        public function getAvatar()
        {
                return $this->avatar;
        }

        /**
         * Set the value of avatar
         *
         * @return  self
         */ 
        public function setAvatar($avatar)
        {
                $this->avatar = $avatar;

                return $this;
        }
        

        /**
         * Get the value of description
         */ 
        public function getEducation()
        {
                return $this->education;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setEducation($education)
        {
                $this->education = $education;

                return $this;
        }
        

        /**
         * @return boolean - true if registration, false if unsuccessful.
         */
        public function register() {

                $password = Security::hash($this->password);
        
                try {
                    $conn = Db::getInstance();
                    $statement = $conn->prepare('INSERT INTO user (username, fullname, email, password, education) values (:fullname, :username, :email, :password)');
                    $statement->bindParam(':fullname', $this->fullname);
                    $statement->bindParam(':username', $this->username);
                    $statement->bindParam(':email', $this->email);
                    $statement->bindParam(':password', $password);  
                    $statement->execute();
                
                    $getData = $conn->prepare('select * from user where username = :username');
                    $getData->bindParam(':username', $this->username);
                    $getData->execute();
                    $data = $getData->fetchAll();
                
                    if(!empty($data)){
                        return array($data[0]['id'], $data[0]['username'], $data[0]['email']);
                    }else{
                        return false;
                    }

        
                } catch ( Throwable $t ) {
                    return false;
        
                }
            
        }
    }