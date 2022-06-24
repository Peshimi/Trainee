<?php
$handle = fopen("zadanko.csv", "r");
$a = array();
  if ($handle) { 
    while (($line = fgets($handle)) !== false) {
     #echo $line;

    $exp = substr($line , strpos($line, ',')+1); # explode date in format YYYY-MM-DD
                                                 # into array of array[0] - YEAR
                                                 # array[1] - MONTH
                                                 # array[2] - DAY
    $start_date = "2000-01-01";

    if ($start_date<$exp){

    $tmp = explode("-", $exp);
    $date = "$tmp[2].$tmp[1].$tmp[0]";
     #echo $date;
     var_dumb($tmp);

       if (empty($a[$date])) { 
         $a += array($date=>1);
       }
       else {
           $a[$date]+=1;
       }
    }
  }
   fclose($handle);
 }

   arsort($a);

   $counter = 0;
   foreach($a as $x => $x_value){
     if($counter<10){
       echo "Data: " . $x . " & " . "Ilosc: " . $x_value . ";\n";
   }
   $counter++;
 }

#str_replace('-', '.', $x) #line 32# works but prints dates by year/month/day, I need day/month/year
