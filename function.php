<?php

function cifraHASH($dados)
{
    $algoritmo = "AES-256-CBC";
    $chave = "123456";
    $iv = "wNYtCnelXfOa6uiJ";
    $cifrado = openssl_encrypt($dados, $algoritmo, $chave, OPENSSL_RAW_DATA, $iv);
    return $cifrado;
}


function cifraSenha($senha)
{
    $options = ['cost' => 8];
    $hash = password_hash($senha,  PASSWORD_BCRYPT, $options);
    return $hash;
}
