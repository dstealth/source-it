<?php
header("Content-Type: text/html; charset=utf-8");
// Built-in functions that was in HW

echo '<h1>String Functions</h1>';
/**
 * //========================================== echo
 */
echo '<h3>echo</h3>';
$x = 3;
echo <<<END
Привет мир $x <br/>
это все пишется вот так с помощью <br/>
echo <<< END <br/>
 bla-bla-bla <br/>
 END; <br/>
END;
echo 'Hello World!<br/>';

/**
 * //=========================================== trim, ltrim, rtrim
 */
echo '<h3>trim, ltrim, rtrim</h3>';
$str = '     Hello, my name is Dima ';

// trim()
var_dump(
    trim($str, "Hel am")
);
echo '<br/>';
var_dump(
    trim($str)
);
echo '<br/>';

// ltrim()
var_dump(
    ltrim($str)
);

// rtrim()
var_dump(
    rtrim($str)
);
echo '<br/>';

/**
 * //============================================ explode, implode
 */
echo '<h3>explode, implode</h3>';
$str2 = '/home/foo:/bin/sh';
var_dump(
    explode('/', $str2)
);
echo '<br/>';
$str3 = ['home', 'dmitry', 'etc', 'loading', 'my_photo'];
var_dump(
    implode('\\', $str3)
);

/**
 * //============================================= printf, sprintf
 */
echo '<h3>printf, sprintf</h3>';

/**
 * //============================================== strlen
 */
echo '<h3>strlen</h3>';
var_dump(
    strlen($str)
);

/**
 *=============================================== strtolower, strtoupper, ucfirst, ucwords
 */
echo '<h3>strtolower, strtoupper, ucfirst, ucwords</h3>';
// strtolower()
var_dump(
    strtolower($str)
);

// strtoupper()
var_dump(
    strtoupper($str)
);


//ucfirst
$str4 = 'dima';
var_dump(
    ucfirst($str4)
);


// ucwords()
var_dump(
    ucwords($str)
);

/**
 * //============================================== strpos, stripos, strrpos
 */
echo '<h3>strpos, stripos, strrpos</h3>';

// strpos()
var_dump(
    strpos($str, 'Dima')
);

// stripos()
var_dump(
    strpos($str, 'dima')
);
var_dump(
    stripos($str, 'dima')
);

// strrpos()
var_dump(
    strrpos($str, 'Hello')
);

/**
 * =================================================== strstr, stristr
 */
echo '<h3>strstr, stristr</h3>';

// strstr()
var_dump(
    strstr($str, 'ello')
);

// stristr
var_dump(
    stristr($str, 'NaMe')
);

/**
 * ====================================================== substr
 */
echo '<h3>substr</h3>';
var_dump(
    substr($str, 6)
);

var_dump(
    substr($str, 2, 8)
);

/**
 * ========================================================= str_replace
 */
echo '<h3>str_replace</h3>';
var_dump(
    str_replace('b', 'a', 'Gblb')
);


/**
 *
 *
 * ======================================= A r r a y    F u n c t i o n s
 *
 *
 */
echo '<h1>Array Functions</h1>';

$arr = range(1, 20);

/**
 * ========================================================== count
 */
echo '<h3>count()</h3>';
// count()
var_dump(
    count($arr)
);

/**
 * ============================================================= array_key_exists
 */

echo '<h3>array_key_exist</h3>';
// array_key_exist
var_dump(
    array_key_exists(6, $arr)
);

var_dump(
    array_key_exists('sd', $arr)
);

/**
 * =========================================================== array_keys, array_values
 */
echo '<h3>array_keys()</h3>';
var_dump(
    array_keys($arr)
);

echo '<h3>array_values()</h3>';
var_dump(
    array_values
    ([
        'a' => 2,
        'f' => 32,
        'fd' => 'jvccwskdc',
    ])
);

/**
 * ============================================================ array_reverse
 */
echo '<h3>array_reverse()</h3>';
var_dump(
    array_reverse($arr)
);

/**
 * =================================================== in_array, array_search
 */

echo '<h3>in_array()</h3>';
var_dump(
    in_array(19, $arr)
);

var_dump(
    in_array(32, $arr)
);

echo '<h3>array_search()</h3>';
var_dump(
    array_search(10, $arr)
);

/**
 * ==================================================== array_sum()
 */
echo '<h3>array_sum()</h3>';
var_dump(
    array_sum($arr)
);

/**
 * ==================================================== array_unique
 */
echo '<h3>array_unique()</h3>';
var_dump(
    array_unique
    ([
        1 => 23,
        43,
        22,
        23,
        43,
        43,
    ])
);

/**
 * =================================================== sort, asort, usort, uasort, ksort
 */
echo '<h3>sort()</h3>';
var_dump(
    sort($arr)
);