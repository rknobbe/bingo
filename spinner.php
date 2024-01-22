<?php
function read_dir($dir, $array = array()){ 
        $dh = opendir($dir); 
        $files = array(); 
        while (($file = readdir($dh)) !== false) { 
            $flag = false; 
            if($file !== '.' && $file !== '..' && !in_array($file, $array)) { 
                $files[] = $dir . "/" . $file; 
            } 
        } 
        return $files; 
    } 
function Bingo()
{

	$images = read_dir("images");
	shuffle($images);
	$images[24] = $images[12];
	$images[12] = "cfree.gif";

	
         

      $bingocard = "<table id='spinner' summary='A bingo spinner with random selection of 25 buzzwords arranged in a bingo card'>\n";
      $bingocard .= "<thead><tr>";
      $bingocard .= "<th>B</th><th>I</th><th>N</th><th>G</th><th>O</th>";
      $bingocard .= "</tr></thead>\n";
      $bingocard .= "<tbody>\n";
      $bingocard .= "<tr>"; 

       for($cell=0; $cell<25; $cell++)
         {
           $rowend = ($cell + 1) % 5;
	   $bingocard .= "<td><img width='150' height='150' src='" . $images[$cell]."'></td>\n";
           if($rowend == 0 && $cell < 24) {
             $bingocard .= "</tr>\n<tr>";
           }
         }
       
       $bingocard .= "</tr>";       
       $bingocard .= "</tbody>";
       $bingocard .= "</table>";
       
       echo $bingocard;
}
Bingo();
?>
