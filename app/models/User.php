<?php

    class User {

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Find User by email
        public function findUserByEmail($email)
        {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //Check row

            if ($this->db->rowCount() > 0 ) {
                # code...
                return true;
            }else{
                return false;
            }
        }

    }