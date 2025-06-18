<?php
        $connect = mysqli_connect("localhost", "root", "password", "colors");

        if(!$connect){
            die( "Connection failed: " . mysqli_connect_error());
        }
        $query = 'SELECT * FROM colors';

        $colors = mysqli_query($connect, $query);
        // print_r($colors);

        if($colors){
            foreach($colors as $color){
                // echo $color['Name'];
                echo '<div class="' . $color['Name'] . '"' . ' style = "background-color: ' . $color['Hex'] . '"' . ' >' . $color['Hex'] . '</div>';
            }
        }
    ?>