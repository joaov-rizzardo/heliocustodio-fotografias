<?php
class Foto
{
    private $nome;
    private $diretorio;
    private $categoria;
    private $destaque;
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function adicionaFotos()
    {
        $query = 'insert into tb_foto(nome,diretorio,categoria)values(:nome,:diretorio,:categoria)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':diretorio', $this->__get('diretorio'));
        $stmt->bindValue(':categoria', $this->__get('categoria'));
        $stmt->execute();
    }

    public function recuperaFoto()
    {
        $query = 'select * from tb_foto where nome = :nome';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperaTodasFotos()
    {
        $query = 'select * from tb_foto';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperaFotosCategoria(){
        $query = 'select * from tb_foto where categoria = :categoria';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':categoria',$this->__get('categoria'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperaDestaques(){
        $query = 'select * from tb_foto where destaque = 1';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function destaque(){
        $query = 'update tb_foto set destaque = :destaque where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':destaque', $this->__get('destaque'));
        $stmt->execute();
    }

    public function excluirFoto(){
        $query = 'delete from tb_foto where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();
    }
}
