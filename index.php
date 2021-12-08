<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <style>
        body {
            margin: 0;
            background-color: rgba(0, 0, 0, 0.1);
            font-family: 'Roboto', sans-serif;
        }

        body * {
            font-family: 'Roboto', sans-serif;
        }

        .header-container {
            height: 250px;
            background-color: grey;
            background-image: url('background.jpg');
            background-size: cover;
        }

        .card {
            height: calc(100vh - 218px);
            background-color: white;
            border-radius: 8px;
            margin-top: -32px;
            margin-left: 16px;
            margin-right: 16px;
            padding: 16px;
            display: flex;
            flex-direction: column;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 100px;
            background-color: rgba(0, 0, 0, 0.05);
            padding: 16px;
        }

        input {
            height: 48px;
            margin-bottom: 32px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background-color: rgba(0, 0, 0, 0.05);
        }

        button {
            height: 48px;
            background-color: #0fab0f;
            color: white;
            border: unset;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #29b929;
        }
    </style>
</head>

<body>
    <div class="header-container"> </div>

    <?php
    $specialChars = [' ', 'ß', 'ä', 'ü', 'ö', '\''];
    ?>

    <div class="card">
        <form>
            <h2>Text verschlüsseln</h2>
            <input name="encrypt" placeholder="Hier Text eingeben...">

            <?php
            if (isset($_GET['encrypt'])) {
                $text = strtolower($_GET['encrypt']);
                $array = str_split($text);
                echo '<b>Dein Wort lautet: </b> ';
                foreach ($array as $char) {
                    if (in_array($char, $specialChars)) {
                        echo $char;
                    } else {
                        echo toChar(toNum($char) + 1);
                    }
                }
            }

            ?>
            <button type="submit">VERSCHLÜSSELN</button>
        </form>


        <form>
            <h2>Text entschlüsseln</h2>
            <input name="decrypt" placeholder="Hier Text eingeben...">

            <?php
            if (isset($_GET['decrypt'])) {
                $text = strtolower($_GET['decrypt']);
                $array = str_split($text);
                echo '<b>Dein entschlüsseltes Wort lautet: </b> ';
                foreach ($array as $char) {
                    if (in_array($char, $specialChars)) {
                        echo $char;
                    } else {
                        echo toChar(toNum($char) - 1);
                    }
                }
            }

            ?>

            <button type="submit">ENTSCHLÜSSELN</button>
        </form>
    </div>


</body>

</html>



<?php

function toNum($data)
{
    $alphabet = array(
        'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
    );
    $alpha_flip = array_flip($alphabet);
    $return_value = -1;
    $length = strlen($data);
    for ($i = 0; $i < $length; $i++) {
        $return_value +=
            ($alpha_flip[$data[$i]] + 1) * pow(26, ($length - $i - 1));
    }
    return $return_value;
}


function toChar($number)
{

    if ($number < 0) {
        $number = $number + 26;
    }

    if ($number > 25) {
        $number = $number - 26;
    }



    $alphabet = array(
        'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
    );

    return $alphabet[$number];
}


?>