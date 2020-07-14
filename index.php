<?php
require "config.php";
require "dao/UsuarioDaoMysql.php";


$usuarioDao = new UsuarioDaoMysql($pdo);

$lista = $usuarioDao->findAll(); // Vai retornar um array com todos os itens sendo um objeto da classe usuario

// $lista = [];
// $sql = $pdo->query("SELECT * FROM usuarios");
// if($sql->rowCount() > 0){
//     $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
// }

?>


<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width=100%>

    <tr>

    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>

    </tr>
    <?php
    foreach($lista as $usuario):?>
    <tr>
        <td><?php echo $usuario->getId()?></td>
        <td><?=$usuario->getNome()?></td>
        <td><?=$usuario->getEmail()?></td>
        <td>
            <a href="editar.php?id=<?php echo $usuario->getId()?>">[ Editar ]</a>
            <a href="excluir.php?id=<?php echo $usuario->getId()?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
        </td>
    </tr>
        <?php endforeach; ?>

</table>
