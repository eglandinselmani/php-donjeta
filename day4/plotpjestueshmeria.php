<?php 

    function plot($n) {
        if (($n % 2)==0){
            return  "numri eshte i plotpjestueshem me 2 "; 
        }else{
            return  "numri nuk eshte i plotpjestueshem me 2 ";
        }  
    }


    print_r(plot(10). "<br>");

    print_r(plot(4). "<br>");
    print_r(plot(7). "<br>");
    print_r(plot(3). "<br>");





?>