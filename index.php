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

    <div class="card-container">
        <?php
        $data = $db->retrieve("film");
        $data = json_decode($data, true);

        if (is_array($data)) {
            foreach ($data as $id => $film) {
                echo '<div class="card">
                    <img src="' . $film['thumbnail'] . '" alt="Thumbnail">
                    <h3>' . $film['title'] . '</h3>
                    <p>' . $film['year'] . ' presenteou ❤</p>
                    <a href="edit.php?id=' . $id . '">EDIT</a>
                    <a href="delete.php?id=' . $id . '">DELETE</a>
                </div>';
            }
        }
        ?>
    </div>
</body>
</html>
