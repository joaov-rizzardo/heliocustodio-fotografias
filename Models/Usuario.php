<?php
    class Usuario{
        private $login;
        private $senha;
        private $conexao;

        public function __construct(Conexao $conexao){
            $this->conexao = $conexao->conectar();
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function recuperaUsuario(){
            $query = 'select id,login,senha from tb_usuarios where login = :login';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':login', $this->login);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
?>