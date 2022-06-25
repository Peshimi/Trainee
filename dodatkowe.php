<?php
$handle = fopen("zadanko.csv", "r");
$a = array();
  if ($handle) { 
    while (($line = fgets($handle)) !== false) {
    $all_dates = substr($line , strpos($line, ',')+1);                                             
    $start_date = "2000-01-01";

    if ($start_date<$all_dates){
    $dates = trim(preg_replace('/\s+/', '', $all_dates));   #remove new line from string *white space*
    $data = date_format(date_create($dates), "d.m.Y");
       if (empty($a[$data])) { 
         $a += array($data=>1);
       }
       else {
           $a[$data]+=1;
       }
    }
  }
  fclose($handle);
 }
  #var_dump($tmp);
  #var_dump(array("2001","01","02"));

   arsort($a);
   $counter = 0;
   foreach($a as $x => $x_value){
     if($counter<10){
      #echo date($x) . " & liczba powtórzeń: " . $x_value . ";\n"; 
      echo "Data: " . $x . " & " . "Ilosc: " . $x_value . ";\n";
   }
   $counter++;
 }

?>
