<!doctype html>
<?php

$titulo =  "Hello World!";
$texto = "Uma mensagem";

?>

<html>
<head>
  <title><?=$titulo?></title> 
</head>
<body>
    <h1><?=$texto?></h1>
    <?php

       for($i=1;$i < 10; $i ++ ) {
           echo "<p>Meu parágrafo nro " . $i . "</p>";
       }

    ?>
</body>
</html>
