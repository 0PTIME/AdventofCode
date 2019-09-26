<html>
 <head>
  <title>AoC 2018 DAY02</title>
 </head>
<body>
<?php

$input = file("input\day02.txt");
$two = 0;
$three = 0;
foreach($input as $element)
{
    $lul = str_split($element);
    sort($lul);
    for($i = 0; $i < (count($lul) - 2); $i++)
    {
        if($lul[$i] == $lul[$i+1] && $lul[$i] != $lul[$i+2])
        { $two++; break;}
    }
    for($i = 0; $i < (count($lul) - 3); $i++)
    {
        if($lul[$i] == $lul[$i+1] && $lul[$i] == $lul[$i+2] && $lul[$i] != $lul[$i+3])
        { $three++; break; }
    }
}
$checksum = $three * $two;

echo "<p>" . $checksum . "</p>";
?>

</body>
</html>