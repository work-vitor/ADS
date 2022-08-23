<?php

include('function.php');


    $username = "boteco";
    $password = "123";
    $pdo = new PDO('mysql:host=localhost;dbname=boteco', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = "joao";
    $sobrenome = "vitor";
    $cpf = "53608925015";
    $cep = 11669301;
    $numero = 102;
    $complemento = "teste";
    $img = "teste.jpg";
    $senha = "123456";
    $cartao = 5161449969586117;
    $codigo = 777;


    try {
        
        $stmt = $pdo->prepare('INSERT INTO usuarios ( nome, sobrenome, cpf, cep, numero, complemento, img, senha) '
            . 'VALUES(:nome, :sobrenome,:cpf, :cep, :numero, :complemento, :img, :senha)');
        $stmt->execute(array(
            ':nome' => $nome,
            ':sobrenome' => $sobrenome,
            ':cpf' => cifraHASH($cpf),
            ':cep' => cifraHASH($cep),
            ':numero' => cifraHASH($numero),
            ':complemento' => cifraHASH($complemento),
            ':img' => cifraHASH($img),
            ':senha' => cifraSenha($senha)
        ));
        echo "Inserido com sucesso";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

