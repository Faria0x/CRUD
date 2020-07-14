<?php
require "config.php"; //PRECISA ACESSAR O BANCO DE DADOS
require "dao/UsuarioDaoMysql.php";

$usuarioDao = new UsuarioDaoMysql($pdo);


$usuario = false;
$id = filter_input(INPUT_GET,"id");
if($id){

    $usuario = $usuarioDao->findById($id);
}

if($usuario === false){
    header("Location: index.php");
    exit;
}



// $info = [];
// $id = filter_input(INPUT_GET,"id");
// if($id){

//     $info // objeto da classe usuario ou false


//     $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
//     $sql->bindValue(":id",$id);
//     $sql->execute();
//     if($sql->rowCount() > 0){
//         $info = $sql->fetch(PDO::FETCH_ASSOC);// pega só o primeiro item
//     }else {
//         header("Location: index.php");
//     }
// }else{
//     header("Location: index.php");
//     exit;
// }
?>
<link rel="stylesheet" href="css.css">

<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuario->getId();?>">
    <label for="">
        Nome:<br>
        <input type="text" name="name" value="<?=$usuario->getNome();?>">
    </label>

    <label for=""><br>
        E-mail:<br>
        <input type="text" name="email" value="<?=$usuario->getEmail();?>"><br>
    </label><br>

    <input type="submit" value="Adicionar">
</form>