<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
$retrieve = $db->retrieve("film/$id");
$data = json_decode($retrieve, 1);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
         text-aling:center;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
        }

        .card input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .card table {
            width: 100%;
            border-collapse: collapse;
        }

        .card table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .card table td:first-child {
            width: 120px;
        
        }

        .card input[type="submit"] {
            background-color: #9400d3;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="card">
        <form method="post" action="action_edit.php">
            <h2>Presentear 🎁</h2>
            <?php foreach ($giftedYears as $giftedYear): ?>
               <div><?php echo $giftedYear; ?></div>
            <?php endforeach; ?>
            <table>
                <tr>
                    <td>
                        <p>Nome:</p>
                        <input type="text" name="year" value="" placeholder="Digite seu nome">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" value="PRESENTEAR">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
