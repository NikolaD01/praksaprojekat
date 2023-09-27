<?php 
    require_once 'connection.php';

    $q = "SELECT * FROM `studenti`";
    $res = $conn->query($q);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php 
            if($res->num_rows==0)
            {
                echo "<p>Nema unethi podataka</p>";
            }
            else
            {
                while($row = $res->fetch_assoc())
                {
                    ?>
                        <p>
                            <ul>
                                <li>Index: <?php echo $row['student_id']; ?></li>
                                <li>Ime i Prezime: <?php echo $row['Ime'] . ' ' . $row['Prezime']; ?></li>
                                <li>Prosecna Ocena: <?php echo $row['Ocena']; ?></li>
                            </ul>
                        </p>
                    <?php
                }
            }
        ?>
    </ul>

    <form name='studentForm' action="create.php" onsubmit="return validateForm()" method='POST'>
        <label for="ime">Ime: </label>
        <input class='field' type="text" name='ime' value=''>
        <br>
        <label for="ime">Prezime: </label>
        <input class='field' type="text" name='prezime' value=''>
        <br>
        <label for="ime">Ocena: </label>
        <input class='field' type="number" name="ocena" value='' step=".01">
        <br>

        <input type="submit" value='unesi studenta' ></input>
    </form>


    <script src="prevent.js"></script>
    <script src="validation.js"></script>

</body>

</html>