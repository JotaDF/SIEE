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
    include_once "./model/EstagiarioDAO.php";
    include_once "./model/Estagiario.php";
    include_once "./model/CursoDAO.php";
    include_once "./model/Curso.php";

    $id = $_REQUEST["id"];

    $estagiarioDAO = new EstagiarioDAO();
    $estagiario = new Estagiario();
    $estagiario = $estagiarioDAO->carregarPorId($id);       
     ?>
        <h4>Editar Estagiario</h4>
        <form method="get" action="control/alterar_estagiario.php">
            ID: <?=$estagiario->id ?><br/><input type="hidden" value="<?=$estagiario->id ?>" name="id" />
            Matricula:<input type="text" name="matricula" value="<?=$estagiario->matricula ?>"  size="20" required /><br/>
            Nome:<input type="text" name="nome"  value="<?=$estagiario->nome ?>" size="60" required /><br/>
            Endereço:<input type="text" name="endereco" value="<?=$estagiario->endereco ?>"  size="60" required /><br/>
            Telefone:<input type="text" name="telefone" value="<?=$estagiario->telefone ?>"  size="10" required /><br/>
            Celular:<input type="text" name="celular" value="<?=$estagiario->celular ?>"  size="15" required /><br/>
            E-mail:<input type="email" name="email" value="<?=$estagiario->email ?>"  size="60" required /><br/>
            Periodo:<input type="text" name="periodo" value="<?=$estagiario->periodo ?>"  size="60" /><br/>
            Turma:<input type="text" name="turma" value="<?=$estagiario->turma ?>"  size="60"  /><br/>
            Turno:<input type="text" name="turno" value="<?=$estagiario->turno ?>"  size="60" /><br/>
            Composicao Carga Horaria:<input type="text" name="composicao_carga_horaria" value="<?=$estagiario->composicao_carga_horaria ?>"  size="60"  /><br/>
            Carga Horaria:<input type="text" name="carga_horaria" value="<?=$estagiario->carga_horaria ?>"  size="60" /><br/>
            Data Inicio:<input type="number" name="data_inicio" value="<?=$estagiario->data_inicio ?>"  size="11"  /><br/>
            Data Termino:<input type="number" name="data_termino" value="<?=$estagiario->data_termino ?>"  size="60"  /><br/>
            Data Inicio Aditivo:<input type="number" name="data_inicio_aditivo" value="<?=$estagiario->data_inicio_aditivo ?>"  size="60"  /><br/>
            Data Termino Aditivo:<input type="number" name="data_termino_aditivo" value="<?=$estagiario->data_termino_aditivo ?>"  size="60" /><br/>
            Data de Recisão:<input type="number" name="data_recisao" value="<?=$estagiario->data_recisao ?>"  size="10" /><br/>
            Apolice:<input type="text" name="apolice" value="<?=$estagiario->apolice ?>"  size="60" /><br/>
            Seguradora:<input type="text" name="seguradora" value="<?=$estagiario->seguradora ?>"  size="60" /><br/>
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
                    if ($c->id === $estagiario->id_curso->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$c->id ?>" <?=$selected ?>><?=$c->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            Senha:<input type="password" name="senha" value="<?=$estagiario->senha ?>" size="60" /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
