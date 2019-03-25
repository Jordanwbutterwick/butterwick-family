<?php
    class Person {
        public $id = "";
        public $firstname = "";
        public $lastname_madienname = "";
        public $born_into_family = "";
        public $birthdate = "";
        public $deathdate = "";
        public $birthplace = "";
        public $email = "";
        public $phone = "";
        public $father = "";
        public $mother = "";
        public $spouse = "";
        public $gender = "";
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
        // I am returing a full name string programatically
        public function printFullName() {
            return $this->firstname . " ". $this->lastname_madienname;
        }

        // I am setting a new property called fullname with my Full name.
        public function makeFullName() {
            $this->fullname = $this->firstname . " ". $this->lastname_madienname;
        }

        // Retrieving the full name from the fullname property
        public function getFullName() {
            return $this->fullname;
        }

        public function printContactInfo(){
            $contact = "<h5>".$this->email . $this->phone . "</h5>";
            return $contact;
        }
    }
?>