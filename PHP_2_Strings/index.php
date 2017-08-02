<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<pre>
    <?php

    // 1 ================================================================
    $var = "var_test_text";
    echo str_replace("_t", "T", $var) . "\n";

    // 2 ================================================================
    $reversFunc = function ($value){
        preg_match_all('/./us', $value, $array);
        return join("", array_reverse($array[0]));
    };

    $str = 'ФЫВА олдж';
    $newArray = array_map($reversFunc, explode(" ", $str));
    print_r(join(" ", $newArray));
    echo "\n";

    // 3 ================================================================
    $a = [342, 55, 33, 123, 66, 63, 9];
    $callable = function ($value){
        $v = substr_count(strval($value), "3");
        if ($v > 0){
            echo $value . "\n";
        }
    };
    array_walk($a, $callable);

    // 4 ================================================================
    $reduce = function ($carry , $item){
        $carry += substr_count(strval($item), "3");
        return $carry;
    };
    $a = [342, 55, 33, 123, 66, 63, 9];
    echo array_reduce($a, $reduce, 0) . "\n";

    // 5 ================================================================
    function endsWith($haystack, $needle)
    {
        return (substr($haystack, -1) === $needle);
    }

    function newBandName ($str){
        $first = substr($str, 0, 1);
        if (endsWith($str, $first)){
            $res = $str . substr($str, 1);
            return ucfirst($res);
        } else {
            return "The " . ucfirst($str);
        }
    }

    echo newBandName("dolphin") . "\n";
    echo newBandName("alaska") . "\n";
    echo newBandName("europe") . "\n";

    // 6 ================================================================
    function replace($inputStr){
        $repl = ["A" => "T", "C" => "G", "T" => "A", "G" => "C"];
        return strtr($inputStr, $repl);
    }
    echo replace("ATTGC") . "\n";
    echo replace("GTAT") . "\n";
    ?>
</pre>
</body>
</html>
