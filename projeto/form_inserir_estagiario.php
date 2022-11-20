<?php 
//include_once "verifica_login.php"
include_once "./model/CursoDAO.php";
include_once "./model/Curso.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './banner.php';
        ?>
        <h4>Cadastro de Estagiario</h4>
        <form method="get" action="control/inserir_estagiario.php">
            Matricula:<input type="text" name="matricula" size="20" required /><br/>
            Nome:<input type="text" name="nome" size="60" required /><br/>
            Endereço:<input type="text" name="endereco" size="60" required /><br/>
            Telefone:<input type="text" name="telefone" size="10" required /><br/>
            Celular:<input type="text" name="celular" size="15" required /><br/>
            E-mail:<input type="email" name="email" size="60" required /><br/>
            Periodo:<input type="text" name="periodo" size="60" /><br/>
            Turma:<input type="text" name="turma" size="60"  /><br/>
            Turno:<input type="text" name="turno" size="60" /><br/>
            Composicao Carga Horaria:<input type="text" name="composicao_carga_horaria" size="60"  /><br/>
            Carga Horaria:<input type="text" name="carga_horaria" size="60" /><br/>
            Data Inicio:<input type="date" name="data_inicio" size="11"  /><br/>
            Data Termino:<input type="date" name="data_termino" size="60"  /><br/>
            Data Inicio Aditivo:<input type="date" name="data_inicio_aditivo" size="60"  /><br/>
            Data Termino Aditivo:<input type="date" name="data_termino_aditivo" size="60" /><br/>
            Data de Recisão:<input type="date" name="data_recisao" size="10" /><br/>
            Apolice:<input type="text" name="apolice" size="60" /><br/>
            Seguradora:<input type="text" name="seguradora" size="60" /><br/>
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
            Senha:<input type="password" name="senha" size="60" /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
