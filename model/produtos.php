<?php
    Class Produto{
        public $NomeDoProduto;
        public $Preço;
        public $Quantidade;
        public $Validade;

        function setNomeDoProduto($NomeProduto){
            $this->NomeDoProduto = $NomeProduto;
        }

        function getNomeProduto(){
            return $this->NomeDoProduto;
        }

        function setPreço($Preço){
            $this->Preço = $Preço;
        }

        function getPreço(){
            return $this->Preço;
        }

        function setQuantidade($Quantidade){
            $this->Quantidade = $Quantidade;
        }

        function getQuantidade(){
            return $this->Quantidade;
        }

        function setValidade($Validade){
            $this->Validade = $Validade;
        }

        function getValidade(){
            return $this->Validade;
        }

        function InserirItemNoEstoque(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=beaverbox','root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $pdo->prepare("INSERT INTO `produtos` (`Nome do Produto`, `Preço`, `Quantidade`, `Validade`) VALUES (:NomeDoProduto, :Preco, :Quantidade, :Validade);");
                $query->bindParam(':NomeDoProduto',$this->NomeDoProduto);
                $query->bindParam(':Preco',$this->Preço);
                $query->bindParam(':Quantidade',$this->Quantidade);
                $query->bindParam(':Validade',$this->Validade);
                $resultado = $query->execute();
                return $resultado;
            } catch(PDOException $e){
                die("" . $e->getMessage());
                
            }
        }

    function MostrarProdutos(){
        
    }

    }
?>