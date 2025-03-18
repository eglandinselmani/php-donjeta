<?php

    $dog= array(array("chiuaua","mexico",20), array("husky","siberia", 15), array("bulldog","england", 10));
    /*
    echo $dog [0][0]. "origina". $dog [0][1].    $dog [0][2]. "lifespan". "<br>";
    echo $dog [1][0]. "origina". $dog [1][1].    $dog [1][2]. "lifespan"."<br>";
    echo $dog [2][0]. "origina". $dog [2][1].    $dog [2][2]. "lifespan". "<br>";
    */


    for($row = 0; $row<3; $row++){
        
        echo "<p> Row number". $row. "</p>";
        echo "<ul>";

        for($col=0; $col<3; $col++ ){
            echo "<li>" .$dog[$row][$col]."</li>";
        };


        echo "</ul>";
    }

    //nested loop 

    for($i = 0;$i<3; $i++){
        echo "Array ". $i ."<br>";
        for($j = 0;$j<3; $j++){
            echo "numri mbrenda elementit <br> ";
        }
    }


?>