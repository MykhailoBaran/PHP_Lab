<?php

// 1 ==========================================================================
function convert($array) {
    $result = [];
    foreach ($array as $key => $value){
        if ($value > 1){
            $add = array_fill(0, $value, $value);
            $result = array_merge($result, $add);
        } else {
            $result[] = $value;
        }
    }
    return $result;
}
echo join(", ", convert([1, 3, 2, 4])) . "\n";

// 2 ==========================================================================
function findMid($array, $count = 3) {
    $avg = array_sum($array) / count($array);
    echo $avg;
    $middle = [];
    $indexs = [];
    for ($i = 0; $i < $count; $i++) {
        $min = 0;
        foreach ($array as $key => $value) {
            if (in_array($key, $indexs, true)) {
                continue;
            }
            if (abs($array[$min] - $avg) > abs($value - $avg)) {
                $min = $key;
            }
        }
        $middle[] = $array[$min];
        $indexs[] = $min;
    }
    return $middle;
}
function secondTask($array) {
    sort($array);

    $min = array_slice($array, 0, 3);
    $max = array_slice($array, -3);

    /*$avg = count($array) / 2;
    $middle = [$array[$avg - 1], $array[$avg], $array[$avg + 1]];*/

    $middle = findMid($array);

    echo "min = " . join(", ", $min) . "\n";
    echo "max = " . join(", ", $max). "\n";
    echo "middle = " . join(", ", $middle). "\n";
}
$temperatures = array(33, 15, 17, 20, 23, 23, 28, 40, 21, 19, 31, 18, 30, 31, 28, 23, 19, 28, 27, 30, 39, 17, 17, 20, 19, 23, 28, 30, 34, 28);
secondTask($temperatures);


// 3 ==========================================================================
$books = [
    [
        'name' => 'Learning php, mysql & JavaScript',
        'author' => 'Robin Nixon',
        'price' => 30,
        'tags' => ['php', 'javascript', 'mysql']
    ],
    [
        'name' => 'Php for the Web: Visual QuickStart Guide',
        'author' => 'Larry Ullman',
        'price' => 25,
        'tags' => ['php']
    ],
    [
        'name' => 'pHp and MySqL for Dynamic Web Sites',
        'author' => 'Larry Ullman',
        'price' => 14.39,
        'tags' => ['php', 'mysql']
    ],
    [
        'name' => 'Modern PhP: New Features and Good Practices',
        'author' => 'Josh Lockhart',
        'price' => 24,
        'tags' => ['php']
    ],
    [
        'name' => 'JavaScript and JQuery: Interactive Front-End Web Development',
        'author' => 'Jon Duckett',
        'price' => 20,
        'tags' => ['javascript', 'jquery']
    ],
    [
        'name' => 'Miss Peregrine\'s Home for Peculiar Children',
        'author' => 'Ransom Riggs',
        'price' => 8.18
    ]
];
$sortFunc = function ($a, $b){
    if ($a['price'] === $b['price']){
        return 0;
    }
    return $a['price'] > $b['price'] ? 1 : -1;
};

$filterFunc = function ($value){
    if (!isset($value['tags'])){
        return false;
    }
    return in_array('php', $value['tags'], true);
};

usort($books, $sortFunc);
$filterArray = array_filter($books, $filterFunc);
//print_r($filterArray);

// 4 ==========================================================================
function getIndex ($array){
    for ($key = 1; $key < count($array) - 1 ; $key++){
        $left = array_slice($array, 0, $key);
        $right = array_slice($array, $key + 1);

        if (array_sum($left) === array_sum($right)){
            return $key;
        }
    }
    return -1;
}
echo getIndex([1,2,3,4,3,2,1]) . "\n";
echo getIndex([1,100,50,-51,1,1]) . "\n";
echo getIndex([20,10,-80,10,10,15,35]) . "\n";
echo getIndex([10,-80,10,10,15,35]) . "\n";

// 5 ==========================================================================
function uniqueValue ($array){
    $newArray = array_count_values(array_map('strval', $array));
    $index = array_search(1, $newArray);

    return $index ? $index : "";
}

echo uniqueValue([ 1, 1, 1, 2, 1, 1 ]) . "\n";
echo uniqueValue([ 0, 0, 0.55, 0, 0 ]) . "\n";
echo uniqueValue([3, 1, 5, 3, 7, 4, 1, 5, 7]) . "\n";
echo uniqueValue([9, 1, 5, 3, 7, 4, 4, 1, 5, 7]) . "\n";
?>
