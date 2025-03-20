<?php 
    //open a file named "ds.txt" for writing
    //nese file nuk egziston krijohet nje i ri me te njerjtin emer
    //nese file egziston mbishkruhet kontenti dhe fajlli parprak fshihet

    

    // w - e qel file per read and write, nese  nuk egziston e krijon nje te ri
    // r - eshte vetem read only mode
    // a - eshte vetem read only mode ehe pointer shko ne fund te fajllit

    // w+ - 
    // r+ - eshte kur file is open ne read and write mode
    //a+ - mundesh me shtu text ne fund te filit
    //x - -krijohet nje file i ri for write-only mode

    $myfileee = fopen("ds.txt","w");
    $filename = "ds.txt";
    
    $myfile = fopen($filename, "w");
    $mytext = "digital school";

    fwrite($myfile,$mytext);

    $myfile2="txt2.txt";

    $myfile2=fopen($myfile2, "w+");

    fwrite($myfile2, "hello there");

    $myfile3=fopen('text3.txt', "a+");
    fwrite($myfile3, "\n add more lines to the file")
   

?>