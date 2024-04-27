<!DOCTYPE html>
<html>
<body>


<?php
$num = true;
$type = "NC";
$count = 0;
while($num){
$num = mt_rand(0000000000,9999999999);
    $count = $count + 1;
    echo "Your ID:".$type.$num."<br>";
    echo $count."<br>";
}


?>


</body>
</html>
