<?php
    class Controller {
        protected $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function index() {}

        public function show($id) {}

    }
?>