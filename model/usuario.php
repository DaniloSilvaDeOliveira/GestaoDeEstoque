<?php
    class Usuário{
        public $nome;

        function setNome($nome){
            $this->nome = $nome;
        }

        function getNome(){
            return $this->nome;
        }

        function LogOff(){
            session_start();
            session_destroy();
            header('Location: ../view/login.php');
        }
}
?>