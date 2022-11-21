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

    function FormataData($Data){
        $data = explode("-",$Data);
        $dataFormatada = $data[2]."/".$data[1]."/".$data[0];
        return $dataFormatada;
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

    function EditarProduto($n,$preco,$qtd,$data,$nome){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=beaverbox','root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare("UPDATE produtos SET  `Preço` = :Preco, `Quantidade` = :Quantidade, `Validade` = :Validade, `Nome do Produto` = :Nome WHERE (`idProdutos` = :id);");
            $query->bindParam(":Preco",$preco,PDO::PARAM_INT);
            $query->bindParam(":Quantidade",$qtd,PDO::PARAM_INT);
            $query->bindParam(":Validade",$data,PDO::PARAM_STR);
            $query->bindParam(":Nome",$nome,PDO::PARAM_STR);
            $query->bindParam(":id",$n,PDO::PARAM_INT);
            $query->execute();                

        } catch(PDOException $e){
            die("" . $e->getMessage());
            
        }
    }

    function ExcluirProduto($n){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=beaverbox','root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare("DELETE FROM produtos WHERE (`idProdutos` = :id);");

            $query->bindParam(":id",$n,PDO::PARAM_INT);
            $query->execute();                

        } catch(PDOException $e){
            die("" . $e->getMessage());
            
        }
    }

    function GerarEditorProduto(){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=beaverbox','root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare("SELECT * FROM produtos");
            $query->execute();
            $rowSQL = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rowSQL as $row){
            echo '
            <div id="'.$row['idProdutos'].'" class="bg-light m-3 p-1" style="visibility:hidden;display:none;">
                <form method="POST" action="estoque.php">
                    <div class="border-bottom border-dark">
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control" name="Nome" value="'.$row['Nome do Produto'].'" type="text">
                        </div>
                    </div>
                    <label>Preço</label>
                    <input class="form-control" name="Preco" value="'.$row['Preço'].'" type="text"><br>
                    <Label>Quantidade</Label>
                    <input class="form-control" name="Quantidade" value="'.$row['Quantidade'].'" type="number"><br>
                    <Label>Validade</Label>
                    <input class="form-control" name="Validade" value="'.$row['Validade'].'" type="date"><br>
                    <button class="btn btn-outline-secondary" name="Editar" value="'.$row['idProdutos'].'" type="submit">Editar</button>
                    <button class="btn btn-outline-secondary" name="Excluir" value="'.$row['idProdutos'].'" type="submit">Excluir</button>
                </form>
            </div>';
            }



                

        } catch(PDOException $e){
            die("" . $e->getMessage());
            
        }
    }

    function MostrarProdutos(){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=beaverbox','root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare("SELECT * FROM produtos");
            $query->execute();
            $rowSQL = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rowSQL as $row){

                echo '<tr>
                <td>'.$row['idProdutos'].'</td>
                <td>'.$row['Nome do Produto'].'</td>
                <td>'.$row['Preço'].'</td>
                <td>'.$row['Quantidade'].'</td>
                <td>'.$this->FormataData($row['Validade']).'</td>
                <td><input onclick="displayDiv('.$row['idProdutos'].')" class="form-check-input" type="checkbox"></td>
                </tr>';
            }
        } catch(PDOException $e){
            die("" . $e->getMessage());
            
        }
    }
    
    function ProcurarProdutos($nome){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=beaverbox','root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare("SELECT * FROM produtos WHERE `Nome do Produto` LIKE '%$nome%';");
            $query->execute();
            $rowSQL = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rowSQL as $row){

                echo '<tr>
                <td>'.$row['idProdutos'].'</td>
                <td>'.$row['Nome do Produto'].'</td>
                <td>'.$row['Preço'].'</td>
                <td>'.$row['Quantidade'].'</td>
                <td>'.$this->FormataData($row['Validade']).'</td>
                <td><input onclick="displayDiv('.$row['idProdutos'].')" class="form-check-input" type="checkbox"></td>
                </tr>';
            }
        } catch(PDOException $e){
            die("" . $e->getMessage());
            
        }
    }
}
?>