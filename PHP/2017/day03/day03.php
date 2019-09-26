<html>
 <head>
  <title>AdventofCode day03 2017</title>
 </head>
<body>
<?php
// input
$input = 347991;
echo "INPUT: " . $input;

// finds the biggest value that would be located in the bottom right corner of "grid"
$width = ceil(sqrt($input));
if(($width % 2) == 0) $width++;
echo "<br> WIDTH: " . $width;

// finds the biggest value in a """""""row""""""" in a million quotation marks
$max = $width * $width;
for($int = 0; $int < 4; $int++)
{
    if($max - ($width - 1) >= $input) { $max -= ($width - 1); }
}
echo "<br>MAX: " . $max;

// finds the middle value so that you can find the distance from the mid to the input
$mid = $max - (floor($width / 2));
echo "<br>MID: " . $mid;

// distance A is found by getting the absolute value of the middle value subtracted from the input
$distA = abs($input - $mid);
// distance B is found by rounding the down half of the width
$distB = floor($width / 2);

$distance = $distA + $distB;


$sum = 0;
$x = 0;
$y = 0;
$grid[$x][$y] = 1;
$dir = "R";
$pos = 0;
$len = 1;
$even = 0;

echo "<br><br>- - - - - - - -(0, 0) = 1";
do
{
    if($dir == "R") $x++;
    else if($dir == "L") $x--;
    else if($dir == "U") $y++;
    else if($dir == "D") $y--;
    echo "<br>" . $dir . " - ";

    for($i = $x-1; $i <= $x+1; $i++)
    {      
        for($j = $y-1; $j <= $y+1; $j++)
        {
            if(isset($grid[$i][$j])) 
            {
                $sum += $grid[$i][$j];
            }
        }
    }
    $grid[$x][$y] = $sum;    
    $pos++;
    echo " - - - - - (" . $x . ", " . $y . ") = " . $sum;
    $sum = 0;

    if($pos >= $len)
    {
        $even++;
        if(($even % 2) == 0) $len++;
        $pos = 0;
        switch($dir)
        {
            case "R": $dir = "U";
                break;
            case "U": $dir = "L";
                break;
            case "L": $dir = "D";
                break;
            case "D": $dir = "R";
                break;
        }
    }
}while($grid[$x][$y] < $input);


echo "<p>RESULTS: " . $distance . "</p>";


?>

</body>
</html>