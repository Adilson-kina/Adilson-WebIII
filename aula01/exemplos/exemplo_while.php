<?php
$i = 0;
while($i < 10){
    $i++;
    if($i % 2 == 0){
        continue;
    }
    echo $i;
}
?>