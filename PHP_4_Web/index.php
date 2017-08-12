<?php
// 1 ===============================================================================

echo gethostbyaddr('206.190.36.45') . "\n";
echo checkdnsrr('dotcom.com') ? "Valid" : "Not valid" . "\n";

/*header('HTTP/1.1 301 Moved Permanently');
header('Location: http://google.com');
exit();*/

// 2 ===============================================================================

function countElem($url){
    preg_match_all('/<svg /', file_get_contents($url), $match);
    return count($match[0]);
}
echo countElem('https://www.epam.com/about') . "\n";

// 3 ===============================================================================

function userSort($array, $offset, $length = null) {
    $arr = array_slice($array, $offset, $length);
    sort($arr);
    $length !== null ? array_splice($array, $offset, $length, $arr) : array_splice($array, $offset, count($arr), $arr);
    return $array;
}

echo join(', ', userSort([1, 5, 7, 4, 8, 9, 6, 5, 3, 4, 2],  3)) . "\n";
echo join(', ', userSort([1, 5, 7, 4, 8, 9, 6, 5, 3, 4, 2],  3, 5)) . "\n";

// 4 ===============================================================================

function maxSum($array, $rangeAr) {
    $sum = [];
    foreach ($rangeAr as $value){
        $sum[join(', ', $value)] = array_sum(array_slice($array, $value[0], $value[1] - $value[0] + 1));
    }
    return "[". array_search(max($sum), $sum) . "]";
}
echo maxSum([1, -2, 3, 4, -5, -4, 3, 2, 1], [[1, 3], [0, 4], [6, 8]]) . "\n";

// 5 ===============================================================================

function countSmile($array){
    $smile = [':)', ':-D', ';D', ':-)', ';~)', ';-D'];
    return count(array_intersect($smile, $array));
}

echo countSmile([':)', ';(', ';}', ':-D']) . "\n";
echo countSmile([';D', ':-(', ':-)', ';~)']) . "\n";
echo countSmile([';]', ':[', ';*', ':$', ';-D']) . "\n";

// 6 ===============================================================================

function distan($string){
    $dist = 0;
    $char = $string[0];
    for ($i = 0, $len = strlen($string); $i < $len; $i++){
        if ($dist > 312341) {
            return $string[$i] . "[$dist]";
        }
        $curDist = strrpos($string, $string[$i]) - $i;
        if ($dist < $curDist){
            $dist = $curDist + 1;
            $char = $string[$i];
        }
    }
    return $char . "[$dist]";
}
echo distan("raersrrrersassswwaaadfdfeeefgtthtgffdd");