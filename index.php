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
    <title>Chá de Casa Nova</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
    <!-- <a href="add.php"><button>ADD DATA</button></a><br><br> -->

    <h1>CHÁ DE CASA NOVA ISA E VINI 👩🏻‍❤️‍👨🏾</h1>
    <p>Obrigado por fazer parte dessa nova etapa das nossas vidas, vamos sempre lembrar de vocês</p>
    
    <div class="card-container">
        <?php
        $data = $db->retrieve("film");
        $data = json_decode($data, true);

        if (is_array($data)) {
            foreach ($data as $id => $film) {
                // Exibir anos presenteados apenas se existirem
                $giftedYears = isset($film['gifted_years']) ? $film['gifted_years'] : [];
                
                echo '<div class="card">
                    <img src="' . $film['thumbnail'] . '" alt="Thumbnail">
                    <h3>' . $film['title'] . '</h3>';
                echo '<hr>';
                // Mostra os anos presenteados como uma lista com a classe CSS
                echo '<div class="gifted-years">' . implode(' 🎁 . ', $giftedYears ) . '</div>';

                // Adiciona o link "PRESENTEAR" dentro do IF
                echo '<a href="edit.php?id=' . $id . '">PRESENTEAR</a>';
        
                echo '<button onclick="copyPix('.$id.')">PIX MISTERIOSO</button>
                    <p id="pixMessage'.$id.'"></p>
                </div>';
            }
        }
        ?>
    </div>

    <button id="backToTopBtn" onclick="scrollToTop()">
        <img src="/img/acima.png">
    </button>

    <script>
        function copyPix(id) {
            var pixValue = "132.900.986-05"; // Valor do PIX
            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = pixValue;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            // Exibir mensagem de sucesso
            var pixMessage = document.getElementById("pixMessage" + id);
            pixMessage.innerHTML = "Pix copiado com sucesso";
        }

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        window.onscroll = function() { showBackToTopButton() };

        function showBackToTopButton() {
            var btn = document.getElementById("backToTopBtn");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        }
    </script>
</body>
</html>
