<?php
function read_dir($dir, $array = array()){ 
        $dh = opendir($dir); 
        $files = array(); 
        while (($file = readdir($dh)) !== false) { 
            $flag = false; 
            if($file[0] !== '.'  && !in_array($file, $array)) { 
                $files[] = $dir . "/" . $file; 
            } 
        } 
        return $files; 
    } 
function Bingo()
{

	$images = read_dir("images");
	sort($images, SORT_LOCALE_STRING);
	$count = count($images);
	#shuffle($images);
	#$images[24] = $images[12];
	#$images[12] = "cfree.gif";

	
         

      $bingocard = "<table class='print-friendly' id='bingo' summary='A random selection of 25 buzzwords arranged in a bingo card'>\n";
      $bingocard .= "<thead><tr>";
      $bingocard .= "<th>B</th><th>I</th><th>N</th><th>G</th><th>O</th>";
      $bingocard .= "</tr><tr><tr></thead>\n";
      $bingocard .= "<tbody>\n";
      $bingocard .= "<tr>"; 

       for($cell=0; $cell<$count; $cell++)
         {
           $rowend = ($cell + 1) % 5;
	   $bingocard .= "<td > <img width='150' height='150' src='" . $images[$cell]."'></td>\n";
           if($rowend == 0 && $cell < $count) {
             $bingocard .= "</tr>\n<tr>";
           }
         }
       
       $bingocard .= "</tr>";       
       $bingocard .= "</tbody>";
       $bingocard .= "</table>";
       $bingocard .= "<style type='text/css'>
       		@media print {
			table tbody tr td:before,
			table tbody tr td:after {
				content : '' ;
				height : 4px;
				display : block;
			}
		       </style>";
       
       echo $bingocard;
}
Bingo();
?>
