<?php
    class Category {
        private int $catId;
        private string $catName;
        private array $categories;

        public function __construct($catId, $catName) {
            $this->catId = $catId;
            $this->catName = $catName;
            $this->categories = array();
        }

        // Accesseurs magiques
        public function __get($attribute) {
            return $this->$attribute;
        }
        public function __set($attribute, $value) {
            switch ($attribute) {
                case "categories":
                    $this->$attribute = array($value);
                    break;
                default:
                    $this->$attribute = $value;
            }
        }

        // Méthodes de classe CRUD
        public function save() {
            if ($this->catId > 0) {

            } else {
                
            }
        }
        public function edit() {

        }
        public function delete(int $catId) {

        }
        public function findAll() {

        }
        public function findById(int $catId) {

        }
        public function findByName(string $catName) {

        }
    }