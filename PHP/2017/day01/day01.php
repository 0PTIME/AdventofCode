<html>
 <head>
  <title>2017 DAY01</title>
 </head>
 <body>
 <?php
 /*
 $file = fopen("input\day-01.txt", "r") or die("Unable to open file! :(");
 $input = fread($file, filesize("input\day-01.txt"));
 fclose($file);
*/

$input = $_POST["stuffs"];
$solution = 0; 
$solutionTwo = 0;   
$i = 0;

$num = str_split($input);
if($num[0] == $num[count($num) -1]) {$solution += $num[count($num) - 1];}

foreach($num as $number)
{
   $numTwo = $num[$i + 1];
   $i++;
   if($number == $numTwo)
   {
       $solution += $number;
   }
}
unset($numTwo);

$max = count($num);
$increment = ($max / 2);
$nums = array_merge($num, $num);
foreach($num as $data)
{
   $numTwo = $nums[$increment];
   $increment++;
   if($data == $numTwo)
   {
       $solutionTwo += $data;
   }
}



echo "<p>RESULTS: " . $solution . "     <-----P1</p>";
echo "<p>RESULTS: " . $solutionTwo . "     <-----P2</p>";
?>

</body>
</html>








