<?php

$handle = fopen("zadanko.csv", "r");                #file open "read only"
$a = array();                                       #create an empty array  
if ($handle) {                                      #if file is opened
  while (($line = fgets($handle)) !== false) {      #while file is read line by line ($line does it)
    #echo  $line;                                   #print the lines
  $name = substr ( $line , 0, strpos($line, ",") ); #looking for the part of string in string
    #echo $name;                                    #print names 

  if (empty($a[$name])) {                           #check is the $name exists in $a 
    $a = $a + array($name=>1);                      #if no = create that name
  }
  else {
      $a[$name]+=1;                                 #if yes = add that name to array 
  }
   
 }
  fclose($handle);                                  #close the file when the loop ends
}
  arsort($a);                                       #sort by the amount of names in $a
  
  $counter = 0;
  foreach($a as $x => $x_value){                    
    if($counter<10){
      echo "Imie: " . ucwords(mb_strtolower($x)) . " & " . "Ilosc: " . $x_value . ";\n";
  }
  $counter++;
}


#substr get string from string
#strpos find the position of string in another string


?>
