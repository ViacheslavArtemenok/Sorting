<?php
function delDoubles(array $arr):array 
{
for ($i = 0; $i < count($arr); $i++){
    for ($e = $i + 1; $e < count($arr); $e++){
        if ($arr[$i] == $arr[$e]){
            array_splice($arr, $e, 1);
            $e--;
        }
    }
}
return $arr;
}



echo("Array: \n");
for ($i = 0; $i<1000; $i++){
    $arr[] = rand(1, 9);
    echo($arr[$i] . "_");
}
echo("\n");
//
$t1 = microtime(true);
$result = delDoubles($arr);
$t2 = microtime(true);
echo("\n" ."Удаление дублей: ". round($t2 - $t1, 6) * 1000 . " сек". "\n" );
print_r($result);