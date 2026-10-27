<?php
    class HospedeResponsavelDAO {
         public function create($hospedeResponsavel){
            try {
                $query = BD ::getConexao()->prepare(
                    "INSERT INTO hospede_responsavel(nome, telefone, idcategoria_hospede)
                    VALUES (:n, :t, :c)"
                );
                $query->bindValue(':n', $hospedeReserva->getNome(), PDO::PARAM_STR);
                $query->bindValue(':t', $hospedeReserva->getTelefone(), PDO::PARAM_STR);
                //bind para a chave estrangeira
                $query->bindValue(':c', $hospedeReserva->getCategoria()->getId, PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM hospede_responsavel");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaHospedes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $hospede = new HospedeResponsavel(); //classe bean
                    $hospede->setId($linha['idhospede']);
                    $hospede->setNome($linha['nome']);
                    $hospede->setTelefone($linha['telefone']);
                    //atributo da associação (com categoria)
                    $daoCategoria = new CategoriaHospedeDAO();
                    $categoria = $daoCategoria->find($linha['idcategoria_hospede']);
                    $hospede->setCategoria($categoria);
                    
                    array_push($listaHospedes, $hospede);
                }

                return $listaHospedes;

            }
            catch(PDOExeption $e){
                echo "Erro #2: " . $e->getMessage();
            }

        }
    }