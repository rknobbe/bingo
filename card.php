<html> 
<head> 
<style type="text/css"> 
body{ 
background-color: #efe; 
color: #00f; 
} 
table{ 
background-color: #fff; 
border: solid black 2px; 
margin:5px; 
margin-left: auto; 
margin-right: auto; 

width:250px; 
} 
td{ 
text-align:center; 
font-weight: bold; 
font-family: Arial; 
width:20px; 
border: solid black 1px; 

} 
.box{ 
padding:20px; 
padding-top:0px; 
width:350px; 
border: solid black 1px; 
text-align:center; 
height:auto; 
background-color: #cfc; 
margin-left: auto; 
margin-right: auto; 
} 
.outer{ 
text-align: center; 

} 
h1{ 
margin:0px; 
padding:5px; 
font-family: Arial; 
font-size:150%; 
color: black; 
} 
</style> 
</head> 
<body> 
<?php 
error_reporting(E_ALL); 

$cnt = 0;
$array = array();
$numbers = range(1,90);

while (count($array) != 6) {
	shuffle($numbers);
	$temp = array();

	while (count($temp) != 27) {
		$temp2 = array_merge(array_splice($numbers,0,5),array_fill(1,4,'&nbsp;'));
		shuffle($temp2);
		$temp = array_merge($temp,$temp2);
	}
	$array[] = $temp;
}

print "<div class=\"outer\"><div class=\"box\">\n<h1>My Bingo Cards</h1>\n"; 

foreach ($array as $card) {
	print "<table>\n\t<tr>\n";
	foreach ($card as $num) {
		print "\t\t<td width=\"20px\" align=\"center\">$num</td>\n";
		if (!(++$cnt % 9) && ($cnt % 27)) print "\t</tr>\n\t<tr>\n"; 
	}
	print "\t</tr>\n</table>\n\n";
}

print "</div></div>\n"; 

?> 
</body> 
</html> 
