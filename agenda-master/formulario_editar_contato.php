<?php
    require 'controlador_agenda.php';
    $contato = editarContato($_GET['id']);


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
<form method="post" action="controlador_agenda.php?acao=editado">

    <input name="id"type="hidden" value="<?= $contato['id']?>">
    <input name="nome"type="text" value="<?= $contato['nome']?>">
    <input name="email" type="text" value="<?= $contato['email']?>">
    <input name="telefone" type="text" value="<?= $contato['telefone']?>">

    <input  type="submit" value="editar contato">
</form>
</body>
</html>
