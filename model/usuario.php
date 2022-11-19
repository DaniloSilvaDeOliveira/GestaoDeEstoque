<?php
    class Usuário{
        public $nome;

        function setNome($nome){
            $this->nome = $nome;
        }

        function getNome(){
            return $this->nome;
        }

        function Login($usuario,$senha){
            
            //tenta fazer a conexão
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=beaverbox','root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare("SELECT * FROM usuários WHERE Nome =:usuario AND Senha =:senha");
            $query->bindParam(":usuario",$usuario,PDO::PARAM_STR);
            $query->bindParam(":senha",$senha,PDO::PARAM_STR);
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            if(isset($resultado)){
                if($resultado == false){
                    return $LoginError = true;
                }else if($resultado["Nome"] == $usuario && $resultado["Senha"] == $senha){
                    $this->setNome($resultado["Nome"]);  
                    $_SESSION["usuario"] = serialize($this);
                    header('Location: ../view/estoque.php');
                }
            }
        } catch(PDOException $e){
            die("ERROR: Não foi possível conectar. " . $e->getMessage());
            
        }


    }
}
?>