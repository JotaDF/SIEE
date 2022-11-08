<table>
    <tr>
        <td><a href="index.php">Início</a> </td>
        <?php
        foreach ($listam as $umenu) {
            ?>
            <td><a href="<?= $umenu->link ?>"><?= $umenu->titulo ?></a> </td>
            <?php
        }
        ?>
        <td><a href="sair.php">(Sair)</a> </td>
    </tr>
</table>



