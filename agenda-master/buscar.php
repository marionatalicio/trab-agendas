<?php

require 'controlador_agenda.php';
$contato = buscarContato($_POST['nome']);


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>

<form>
    <?php foreach($contato as $contat): ?>
        <p><?= $contat ?></p>
    <?php endforeach;?>

</form>
</body>
</html>