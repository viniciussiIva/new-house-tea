<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$id = $_POST['id'];

// Recupera dados existentes
$retrieve = $db->retrieve("film/$id");
$data = json_decode($retrieve, true);

// Adiciona o ano presenteado à lista
$giftedYears = isset($data['gifted_years']) ? $data['gifted_years'] : [];
$giftedYears[] = $_POST['year'];

// Adiciona o novo ano à lista existente
$data['gifted_years'] = $giftedYears;

// Atualiza dados no Firebase
$update = $db->update("film", $id, $data);

// Adiciona a tag HTML com estilos para centralizar a imagem
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chá de Casa Nova</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: \'Roboto\', sans-serif;
        }

        .card {
            /* Estilos da card... */
        }

        .gifted-years {
            display: flex;
            flex-wrap: wrap;
            gap: 5px; /* Ajuste o espaçamento conforme necessário */
        }

        .gifted-years div {
            margin-right: 5px; /* Espaçamento entre os nomes */
        }

        #backToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        #backToTopBtn img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column; margin-top: 50px;">
  <h2 style="text-align: center; margin-bottom: 20px;">Obrigaaaaaaaado ❤️</h2>
  <img src="./img/eu_e_ela.png" alt="Imagem Atualizada" style="border-radius: 50%; width: 200px; height: 200px;">
</div>
</body>
</html>';
?>
