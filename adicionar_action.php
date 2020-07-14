<?php
require "config.php"; //PRECISA ACESSAR O BANCO DE DADOS
require "dao/UsuarioDaoMysql.php";

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);

if($name && $email){

    if($usuarioDao->findByEmail($email) === false){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);


        $usuarioDao->add($novoUsuario);

        header("Location: index.php");
        exit;
    }else {
        header("Location: adicionar.php");
        exit;
    };
}else {
    header("Location: adicionar.php");
    exit;
}
    
//     } else{
//         header("Location: adicionar.php");
//     };

//     $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
//     $sql->bindValue(":email",$email);
//     $sql->execute();

//     if($sql->rowCount() === 0) {
//     $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)"); // PDO STATEMENT MODELO PRA DPS SUBSTITUIR E ADICIONAR
//     $sql->bindValue(':name',$name);// QUEM EU QUERO MODIFICAR , PELO QUE EU QUERO MOTIVAR // ASSOCIA O VALOR QUE EU MANDO
//     $sql->bindValue(':email',$email);// MESMA ORDEM MAS ASSOCIA O PRÓPRIO PARAMETRO OU SEJA, ASSOCIA NAO AO VALOR MAS SIM A VARIÁVEL E POR ISSO PODE SER TROCADO
//     $sql->execute();

//     header("Location: index.php");
//     exit;

// } else{
//     header("Location: adicionar.php");
//     exit;
// };