<?php
    class Person {
        protected $id = "";
        protected $firstname = "";
        protected $lastname_madienname = "";
        protected $born_into_family = "";
        protected $birthdate = "";
        protected $deathdate = "";
        protected $birthplace = "";
        protected $email = "";
        protected $phone = "";
        protected $father = "";
        protected $mother = "";
        protected $spouse = "";
        protected $gender = "";
        protected $fullname = NULL;

        public function __construct($first, $last, $born, $birth, $death, $place, $email, $phone, $father, $mother, $spouse, $gender, $id=NULL){
            $this->id = $id;
            $this->firstname = $first;
            $this->lastname_madienname = $last;
            $this->born_into_family = $born;
            $this->birthdate = $birth;
            $this->deathdate = $death;
            $this->birhtplace = $place;
            $this->email = $email;
            $this->phone = $phone;
            $this->father = $father;
            $this->mother = $mother;
            $this->spouse = $spouse;
            $this->gender = $gender;
        }
        

        public function __toString(){
            return $this->lastname_madienname .", " .$this->firstname ." -- " . $this->email;
        }


        public function printFullName() {
            return $this->firstname . " ". $this->lastname_madienname;
        }


        public function makeFullName() {
            $this->fullname = $this->firstname . " ". $this->lastname_madienname;
        }


        public function getFullName() {
            return $this->fullname;
        }


        public function printContactInfo(){
            $contact = "<h5>".$this->email . $this->phone . "</h5>";
            return $contact;
        }
    }