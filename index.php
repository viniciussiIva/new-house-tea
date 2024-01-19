<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Firebase RDB CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="add.php"><button>ADD DATA</button></a><br><br>

    <h1>CHÁ DE CASA NOVA ISA E VINI 👩🏻‍❤️‍👨🏾</h1>
    <p><em>Obrigado por fazer parte dessa nova etapa da nossas vidas, vamos sempre lembrar de vocês<em></p>
    
    <div class="card-container">
        <?php
        $data = $db->retrieve("film");
        $data = json_decode($data, true);

        if (is_array($data)) {
            foreach ($data as $id => $film) {
                echo '<div class="card">
                    <img src="' . $film['thumbnail'] . '" alt="Thumbnail">
                    <hr style="border-width: 0.2px;">
                    <h3>' . $film['title'] . '</h3>
                    <p>' . $film['year'] . ' presenteou ❤</p>
                    <a href="edit.php?id=' . $id . '">PRESENTEAR</a>
                    <button onclick="copyPix()">PIX MISTERIOSO</button>
                    <p id="pixMessage"></p>
                </div>';
            }
        }
        ?>
    </div>
    <script>
        function copyPix() {
            var pixValue = "132.900.986-05"; // Valor do PIX
            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = pixValue;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            // Exibir mensagem de sucesso
            var pixMessage = document.getElementById("pixMessage");
            pixMessage.innerHTML = "Pix copiado com sucesso";
        }
    </script>
</body>
</html>
