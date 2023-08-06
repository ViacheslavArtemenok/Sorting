<?php
ini_set('memory_limit', '100M');

//Сортировка пузырьком
function bubbleSort(array $arr): array 
{
     if (count($arr) <= 1) {
        return $arr;
    }

    for ($i = 0; $i < count($arr); $i++) {
        for ($j = count($arr) - 1; $j > $i; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $tmp;
            }
        }
    }
   return $arr;
}

//Сортировка вставками
function insertSort(array $arr): array 
{
    if (count($arr) <= 1) {
        return $arr;
    }
 
    for ($i = 1; $i < count($arr); $i++) {
        $cur_val = $arr[$i];
        $j = $i - 1;
 
        while (isset($arr[$j]) && $arr[$j] > $cur_val) {
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $cur_val;
            $j--;
        }
    }
    return $arr;
}
//Сортировка слиянием
function mergeSort(array $arr): array 
{
    if (count($arr) <= 1) {
        return $arr;
    }
 
    $left  = array_slice($arr, 0, (int)(count($arr)/2));
    $right = array_slice($arr, (int)(count($arr)/2));
 
    $left = mergeSort($left);
    $right = mergeSort($right);
 
    return merge($left, $right);
}
 
function merge(array $left, array $right): array 
{
    $ret = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
            array_push($ret, array_shift($left));
        } else {
            array_push($ret, array_shift($right));
        }
    }
 
    array_splice($ret, count($ret), 0, $left);
    array_splice($ret, count($ret), 0, $right);
    return $ret;
}

//Быстрая сортировка
function quickSort(array $arr): array 
{
    if (count($arr) <= 1) {
        return $arr;
    }
 
    $first_val = $arr[0];
    $left_arr = array();
    $right_arr = array();
 
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $first_val) {
            $left_arr[] = $arr[$i];
        } else {
            $right_arr[] = $arr[$i];
        }
    }
 
    $left_arr = quickSort($left_arr);
    $right_arr = quickSort($right_arr);
    return array_merge($left_arr, array($first_val), $right_arr);
}

//Сортировка выбором
function selectSort(array $arr): array 
{
        $newArr = [];
        while (count($arr) > 0) {
            $minItem = $arr[0];
            $minIndex = 0;
            for ($i = 1; $i < count($arr); $i++){
                if ($arr[$i] < $minItem){
                    $minItem = $arr[$i];
                    $minIndex = $i;
                }
            }
            $newArr[] = $minItem;
            array_splice($arr, $minIndex, 1);
        }
        return $newArr;
}
//Выполнение кода
//echo("Array: \n");
for ($i = 0; $i<1000; $i++){
    $arr[] = rand(1, 999);
    //echo($arr[$i] . "_");
}
//
$t1 = microtime(true);
$result["Сортировка пузырьком:_"] = bubbleSort($arr);
$t2 = microtime(true);
echo("\n" ."Сортировка пузырьком: ". round($t2 - $t1, 6) * 1000 . " сек". "\n" );
//
$t1 = microtime(true);
$result["Сортировка вставками:_"] = insertSort($arr);
$t2 = microtime(true);
echo("\n" ."Сортировка вставками: ". round($t2 - $t1, 6) * 1000 . " сек". "\n" );
//
$t1 = microtime(true);
$result["Сортировка слиянием:_"] = mergeSort($arr);
$t2 = microtime(true);
echo("\n" ."Сортировка слиянием: ". round($t2 - $t1, 6) * 1000 . " сек". "\n" );
//
$t1 = microtime(true);
$result["Быстрая сортировка:_"] = quickSort($arr);
$t2 = microtime(true);
echo("\n" ."Быстрая сортировка: ". round($t2 - $t1, 6) * 1000 . " сек". "\n" );
//
$t1 = microtime(true);
$result["Сортировка выбором:_"] = selectSort($arr);
$t2 = microtime(true);
echo("\n" ."Сортировка выбором: ". round($t2 - $t1, 6) * 1000 . " сек". "\n" );
///
/*foreach($result as $index => $item){
    echo($index);
    print_r($item);
 }
 */