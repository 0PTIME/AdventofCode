<html>
 <head>
  <title>2017 DAY02</title>
 </head>
<body>
    <!-- <h2>HEY LOOK, LOOK, HE USED DA STUN, LOOK, LOOK, YOU CAN'T USE A STUN. LOOK, LOOK, LOOK... HE DISCONNECTED</h2> -->
<?php

$input = file("input/day02.txt");
$results = 0;
$resultsTwo = 0;

foreach($input as $row)
{
    $data = explode("\t", trim($row));
    $low = $data[0];
    $high = $data[0];
    foreach($data as $value)
    {
        if($value > $high) $high = $value;
        if($value < $low) $low = $value;
    }
    $results += ($high - $low);

    for($i = 0; $i < count($data); $i++)
    {
        $numOne = $data[$i];
        for($j = 0; $j < count($data); $j++)
        {
            $numTwo = $data[$j];         
            if(($numOne % $numTwo) == 0 && $i != $j)
            {
                echo ($numOne / $numTwo) . "<br>";
                $resultsTwo += ($numOne / $numTwo);
            }
            
        }
    }
}
echo "<br>HIGH: " . $high;
echo "<br>LOW: " . $low;
echo "<br>";

echo "<p>RESULTS P1: " . $results . "</p>";
echo "<p>RESULTS P2: " . $resultsTwo . "</p>";
?>

</body>
</html>

