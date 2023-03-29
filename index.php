<?php
include_once './Ab.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aleila</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <?php
        $adatbazis = new Ab();
        $adatbazis->tablazatbaLeker("név", "kép", "szín");
        $adatbazis->kapcsolatBezar();
        ?>
    </main>
</body>

</html>