<?php

const ROMAN_NUMBERS = [
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1,
];

function is_prime(int $num): bool
{
    return true;
}

function romint(string $roman): int
{
    $result = 0;

    foreach (ROMAN_NUMBERS as $key => $value) {
        while (strpos($roman, $key) === 0) {
            $result += $value;
            $roman = substr($roman, strlen($key));
        }
    }

    return $result;
}

function recurse(array &$grid, int $location = 0)
{
    if ($location === 20) {
        $f = romint($grid[0][0] . $grid[1][0] . $grid[2][0] . $grid[3][0] . $grid[4][0]);
        $g = romint($grid[0][1] . $grid[1][1] . $grid[2][1] . $grid[3][1] . $grid[4][1]);
        $h = romint($grid[0][2] . $grid[1][2] . $grid[2][2] . $grid[3][2] . $grid[4][2]);
        $i = romint($grid[0][3] . $grid[1][3] . $grid[2][3] . $grid[3][3] . $grid[4][3]);
        $j = romint($grid[0][4] . $grid[1][4] . $grid[2][4] . $grid[3][4] . $grid[4][4]);
        $e = romint(implode($grid[0]));
        $d = romint(implode($grid[1]));
        $c = romint(implode($grid[2]));
        $b = romint(implode($grid[3]));
        $a = romint(implode($grid[4]));

        if (
            ($f % 2) === 1
            && $d === $f
            && is_prime($c)
            && ($b + $e) === ($g + $h)
            && ($e % $j) === 0
            && ($c - $d + $i) === ($c + $i + $i)
            && $d > $g
        ) {
            fwrite(STDOUT, 'match ' . $a . PHP_EOL);
        }

        return;
    }

    foreach (ROMAN_NUMBERS as $key => $value) {
        $grid[intval($location / 5)][$location % 5] = $key;
        recurse($grid, $location + 1);
    }
}

$grid = [[], [], [], [], ['V', 'I', 'C', 'I', 'I']];
recurse($grid);
