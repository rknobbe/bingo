<!DOCTYPE html>
<html lang="en">
<?php
function read_dir($dir, $array = array()){ 
        $dh = opendir($dir); 
        $files = array(); 
        while (($file = readdir($dh)) !== false) { 
            $flag = false; 
            if($file[0] !== '.' && !in_array($file, $array)) { 
                $files[] = $dir . "/" . $file; 
            } 
        } 
        return $files; 
    } 
function Bingo()
{
	$seed=$_GET["seed"];
	if (empty($seed)) {
		$seed = rand();
	}
	srand($seed);
	$images = read_dir("images");
	shuffle($images);
	$images[24] = $images[12];
	$images[12] = "cfree.gif";

	
         

      $bingocard = "<table id='bingo' summary='A random selection of 25 buzzwords arranged in a bingo card'>\n";
      $bingocard .= "<thead><tr>";
      $bingocard .= "<th>B</th><th>I</th><th>N</th><th>G</th><th>O</th>";
      $bingocard .= "</tr><tr><tr></thead>\n";
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
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	  $IP = $_SERVER['HTTP_CLIENT_IP'];
	} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	  $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	  $IP = $_SERVER['REMOTE_ADDR']; 
	}
       $bingocard .= sprintf("<small>seed:%x ip:%s</small>", $seed, $IP);
       
       echo $bingocard;
}
Bingo();
?>
</html>
