<?php
    class FormaPagamentoDAO {
         public function create($formaPagamento){
            try {
                $query = BD ::getConexao()->prepare(
                    "INSERT INTO forma_pagamento(tipo)
                    VALUES (:t)"
                );
                $query->bindValue(':t', $formaPagamento->getTipo(), PDO::PARAM_STR);


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
                $query = BD::getConexao()->prepare("SELECT * FROM forma_pagamento");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaPagamentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $pagamento = new FormaPagamento(); //classe feijao
                    $pagamento->setId($linha['idforma_pagamento']);
                    $pagamento->setTipo($linha['tipo']);
                    
                    array_push($listaPagamentos, $pagamento);
                }

                return $listaPagamentos;

            }
            catch(PDOExeption $e){
                echo "Erro #2: " . $e->getMessage();
            }

        }
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM forma_pagamento WHERE idforma_pagamento = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $pagamento = new FormaPagamento(); // Classe bean
                    $pagamento->setId($linha['idforma_pagamento']);
                    $pagamento->setTipo($linha['tipo']);
                    
                }
                
                return $pagamento;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($pagamento) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE forma_pagamento
                    SET tipo = :t
                    WHERE idquarto = :i"
                );
                $query->bindValue(':t', $pagamento->getTipo(), PDO::PARAM_STR);
                $query->bindValue(':i', $pagamento->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM forma_pagamento
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
    