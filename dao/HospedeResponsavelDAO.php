<?php
    class HospedeResponsavelDAO {
         public function create($hospedeResponsavel){
            try {
                $query = BD ::getConexao()->prepare(
                    "INSERT INTO hospede_responsavel(nome, telefone, idcategoria_hospede)
                    VALUES (:n, :t, :c)"
                );
                $query->bindValue(':n', $hospedeResponsavel->getNome(), PDO::PARAM_STR);
                $query->bindValue(':t', $hospedeResponsavel->getTelefone(), PDO::PARAM_STR);
                //bind para a chave estrangeira
                $query->bindValue(':c', $hospedeResponsavel->getCategoriaHospede()->getId(), PDO::PARAM_STR);

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

                $query = BD::getConexao()->prepare(
                    "SELECT * FROM hospede_responsavel"
                );

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaHospedes = array();

                // Instancia o DAO da categoria antes do foreach
                $daoCategoria = new CategoriaHospedeDAO();

                foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {

                    $hospede = new HospedeResponsavel();

                    $hospede->setId($linha['idhospede']);
                    $hospede->setNome($linha['nome']);
                    $hospede->setTelefone($linha['telefone']);

                    // Busca a categoria do hóspede
                    $categoriaHospede = $daoCategoria->find(
                        $linha['idcategoria_hospede']
                    );

                    $hospede->setCategoriaHospede($categoriaHospede);

                    array_push($listaHospedes, $hospede);
                }

                return $listaHospedes;

            } catch (PDOException $e) {

                echo "Erro #2: " . $e->getMessage();

            }
        }

    }