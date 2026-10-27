<?php
    class CategoriaHospedeDAO {
         public function create($categoriaHospede){
            try {
                $query = BD ::getConexao()->prepare(
                    "INSERT INTO categoria_hospede(descricao)
                    VALUES (:d)"
                );
                $query->bindValue(':d', $categoriaHospede->getDescricao(), PDO::PARAM_STR);


                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
             catch(PDOExeption $e){
                echo "Erro #1: " . $e->getMessage();
             }
        }
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM categoria_hospede");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaHospedes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $hospede = new CategoriaHospede(); //classe feijao
                    $hospede->setId($linha['idcategoria_hospede']);
                    $hospede->setDescricao($linha['descricao']);
                    
                    array_push($listaHospedes, $hospede);
                }

                return $listaHospedes;

            }
            catch(PDOExeption $e){
                echo "Erro #2: " . $e->getMessage();
            }

        }
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM categoria_hospede WHERE idcategoria_hospede = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $hospede = new CategoriaHospede(); // Classe bean
                    $hospede->setId($linha['idcategoria_hospede']);
                    $hospede->setDescricao($linha['descricao']);
                }
                
                return $Hospede;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($hospede) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE categoria_hospede
                    SET descricao = :d
                    WHERE idquarto = :i"
                );
                $query->bindValue(':d', $hospede->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':i', $hospede->getId(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM categoria_hospede
                    WHERE idcategoria_hospede = :i"
                );                
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
    