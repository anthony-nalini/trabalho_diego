<?php  require 'tarefa_controller.php'; ?>
<html>
    <body>
        <header>
            <?php include'menu.php';?>
        </header>
        <?php 
            $controller = new TarefaController();
            $result = $controller->getTodas();
            if($result){ 

        ?>        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <?php foreach($result as $row) { ?>
            <tbody>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['titulo']; ?></td>
                    <td><?= $row['descricao']; ?></td>
                </tr>
            </tbody>
            <?php } /*ou pode usar o end foreach*/?>
        </table>
        <?php } ?>
    </body>
</html>