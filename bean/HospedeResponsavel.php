<?php
    class HospedeResponsavel {
        //Atributos
        private $id;
        private $nome;
        private $telefone;
        private $categoriaHospede; //associação com a classe Categoria Hospede

        //métodos d encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

         public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        //get e set do atributo de associação
        public function getCategoriaHospede(){
            return $this->categoriaHospede;
        }

        public function setCategoriaHospede($categoriaHospede){
            $this->categoriaHospede = $categoriaHospede;
        }
    }