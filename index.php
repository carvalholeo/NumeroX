<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
        require_once 'Membro.php';
        
        $m = new Membro();
        $m->setNome("Leonardo");
        $m->setIdade(22);
        $m->batizar();
        $m->integrar();
        print_r($m);
        ?>
        </pre>
    </body>
</html>