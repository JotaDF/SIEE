<?php
if(!is_null($listam)){
?>
    <table>
        <tr>
            <td><a href="index.php">Início</a> </td>
            <?php
            include_once "./model/PerfilDAO.php";
            
            foreach ($listam as $umenu) {
                ?>
                <td><a href="<?= $umenu->link ?>"><?= $umenu->titulo ?></a> </td>
                    
                <?php
            }
            ?>
            <td><a href="sair.php">(Sair)</a> </td>
        </tr>
    </table>
<?php
}
?>