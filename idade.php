
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Verificador de idade</h2>

<form>
    <label>Digite sua idade:</label>
    <input type="number" name = "idade">
    <input type="submit" value = "verificar">
</form>

<?php

$idade;

if ($idade >= 18) {
    echo "Voce é maior de idade";
} else {
    echo "Voce é menor de idade";
}
?>
</body>
</html>