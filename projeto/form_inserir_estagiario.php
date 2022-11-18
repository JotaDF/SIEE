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
        include_once './banner.php';
        ?>
        <h4>Cadastro de Estagiario</h4>
        <form method="post" action="control/inserir_estagiario.php">
            Matricula:<input type="text" name="matricula" size="20" required /><br/>
            Senha:<input type="password" name="senha" size="60" required /><br/>
            Nome:<input type="text" name="nome size="60" required /><br/>
            Endereço:<input type="text" name="endereco" size="60" required /><br/>
            Telefone:<input type="tel" name="telefone" size="10" required /><br/>
            Celular:<input type="tel" name="telefone" size="15" required /><br/>
            E-mail:<input type="email" name="email" size="60" required /><br/>
            Periodo:<input type="text" name="periodo" size="60" required /><br/>
            Turma:<input type="text" name="turma" size="60" required /><br/>
            Turno:<input type="text" name="turno" size="60" required /><br/>
            compasicao Carga Horaria:<input type="number" name="composicao_carga_horaria" size="60" required /><br/>
            Carga Horaria:<input type="number" name="carga_horaria" size="60" required /><br/>
            Data Inicio:<input type="date" name="data_inicio" size="11" required /><br/>
            Data Termino:<input type="date" name="data_termino" size="60" required /><br/>
            Data Inicio Aditivo:<input type="date" name="data_inicio_aditivo" size="60" required /><br/>
            Data Termino Aditivo:<input type="date" name="data_termino_aditivo" size="60" required /><br/>
            Data de Recisão:<input type="date" name="data_recisao" size="10" required /><br/>
            Apolice:<input type="text" name="apolice" size="60" required /><br/>
            Seguradora:<input type="text" name="seguradora" size="60" required /><br/>
            Id_Curso:<input type="number" name="id_curso" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
