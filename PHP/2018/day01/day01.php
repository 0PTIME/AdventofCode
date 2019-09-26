<html>
 <head>
  <title>AdventofCode 01 2018</title>
 </head>
<body>
<?php

$input = file("input\day01.txt");
$results = 0;
echo $input;
foreach($input as $element)
{
    echo $element . "<br>";
    $results += $element;
}

echo $results;
?>

</body>
</html>