<?php
    class QuartoDAO {
        public function create($quarto) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO quarto(numero, tipo, preco, disponivel) 
                    VALUES (:n, :t, :p, :d)"
                );
                $query->bindValue(':n', $quarto->getNumero(), PDO::PARAM_STR);
                $query->bindValue(':t', $quarto->getTipo(), PDO::PARAM_STR);
                $query->bindValue(':p', $quarto->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':d', $quarto->getDisponivel(), PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaQuartos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $quarto = new Quarto(); // Classe bean
                    $quarto->setId($linha['idquarto']);
                    $quarto->setNumero($linha['numero']);
                    $quarto->setTipo($linha['tipo']);
                    $quarto->setPreco($linha['preco']);
                    $quarto->setDisponivel($linha['disponivel']);

                    array_push($listaQuartos, $quarto);
                }
                
                return $listaQuartos;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM quarto WHERE idquarto = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $quarto = new quarto(); // Classe bean
                    $quarto->setId($linha['idquarto']);
                    $quarto->setNumero($linha['numero']);
                    $quarto->setTipo($linha['tipo']);
                    $quarto->setPreco($linha['preco']);
                    $quarto->setDisponivel($linha['disponivel']);
                }
                
                return $quarto;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($quarto) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE quarto
                    SET numero = :n, tipo = :t, preco = :p, disponivel = :d
                    WHERE idquarto = :i"
                );
                $query->bindValue(':n', $quarto->getNumero(), PDO::PARAM_STR);
                $query->bindValue(':t', $quarto->getTipo(), PDO::PARAM_STR);
                $query->bindValue(':p', $quarto->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':d', $quarto->getDisponivel(), PDO::PARAM_STR);
                $query->bindValue(':i', $quarto->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM quarto
                    WHERE idquarto = :i"
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