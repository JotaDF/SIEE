<?php 
//include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        include_once "./model/CoordenadorDAO.php";
        include_once "./model/Coordenador.php";
        include_once "./model/CursoDAO.php";
        include_once "./model/Curso.php";
        
        $id = $_REQUEST["id"];
        
        $coordDAO = new CoordenadorDAO();
        $coord = new Coordenador();
        $coord = $coordDAO->carregarPorId($id);
        ?>
        <h4>Editar Coordenador </h4>
        <form name="alterar_coordenador" method="post" action="control/alterar_coordenador.php">
            ID: <?=$coord->id ?><br/><input type="hidden" value="<?=$coord->id ?>" name="id" />
            CPF:<input type="text" name="cpf" value="<?=$coord->cpf ?>" size="60" required /><br/>
            Nome:<input type="text" name="nome" value="<?=$coord->nome ?>" size="60" required /><br/>
            Graduação:<input type="text" name="graduacao" value="<?=$coord->graduacao ?>" size="60" required /><br/>
            Pos_Graduação:<input type="text" name="pos_graduacao" value="<?=$coord->pos_graduacao ?>" size="60" required /><br/>
            Telefone:<input type="tel" name="telefone" value="<?=$coord->telefone ?>" size="60" required /><br/>
            E-mail:<input type="email" name="email" value="<?=$coord->email ?>" size="60" required /><br/>
            Nucleo:<input type="text" name="nucleo" value="<?=$coord->nucleo ?>" size="60" required /><br/>
            Turno:<input type="text" name="turno" value="<?=$coord->turno ?>" size="60" required /><br/>
            Senha:<input type="password" name="senha" value="<?=$coord->senha ?>" size="60" required /><br/>
            Curso:<select size="1" name="id_curso" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/CursoDAO.php";
                include_once "./model/Curso.php";
                // put your code here
                $cDAO = new CursoDAO();
                $lista = array();
                $lista = $cDAO->listar();
                
                foreach ($lista as $c) {
                    $selected = "";
                    if ($c->id === $coord->id_curso->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$c->id ?>" <?=$selected ?>><?=$c->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
