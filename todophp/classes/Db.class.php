<?php
    abstract class Db{
        private static $conn;
        private static function getConfig(){
            // get the config file
            return parse_ini_file(__DIR__ . "/../config/config.ini");
        }
        public static function getInstance(){
            if (self::$conn != null) {
                return self::$conn;
            } else {
                $config = self::getConfig();
                $baseName = $config['database'];
                $username = $config['user'];
                $password = $config['password'];
                self::$conn = new PDO('mysql:host=localhost;dbname='.$baseName.';charset=utf8mb4', $username, $password);
                return self::$conn;
            }
            
        }
    }