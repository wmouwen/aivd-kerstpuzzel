<?php

function klinker(string $letter): bool
{
    return in_array($letter, ['a', 'e', 'i', 'o', 'u']);
}

function a(string $woord): int
{
    return array_sum(array_map(function($letter){
        return ord($letter) - ord('a');
    }, str_split($woord)));
}

function b(string $woord): int
{
    $sumKlinkers = 0;
    $sumMedeklinkers = 0;

    for ($position = 0; $position < strlen($woord); $position++) {
        if (klinker($woord[$position])) {
            $sumKlinkers +=  ord($woord[$position]) - ord('a');
        } else {
            $sumMedeklinkers +=  ord($woord[$position]) - ord('a');
        }
    }

    return $sumMedeklinkers * $sumKlinkers;
}

function c(string $woord): int
{
    $sumKlinkers = 0;
    $sumMedeklinkers = 0;

    for ($position = 0; $position < strlen($woord); $position++) {
        if (klinker($woord[$position])) {
            $sumKlinkers +=  ord($woord[$position]) - ord('a');
        } else {
            $sumMedeklinkers +=  ord($woord[$position]) - ord('a');
        }
    }

    return $sumMedeklinkers - $sumKlinkers;
}

const WORDS = [
    ['boommarter', null, 2496, null],
    ['bruinvis', 106, 2520, 1366],
    ['damhert', null, 232, 74],
    ['veldspitsmuis', 175, 5400, 1735],
    ['waterspitsmuis', 198, 6320, 1758],
    ['arend', 37, 132, 49],
    ['tuimelaar', 91, null, null],
    ['otter', 73, 990, 379],
];

fwrite(STDOUT, PHP_EOL);
foreach (WORDS as [$woord, $ca, $cb, $cc]) {
    fwrite(STDOUT, sprintf('%5s  %5s  %5s   | %5d  %5d  %5d  |  %s',
            $ca, $cb, $cc,
            a($woord), b($woord), c($woord),
            $woord
        ) . PHP_EOL);
}

$woord = 'hazelmuis';
fwrite(STDOUT, PHP_EOL);
fwrite(STDOUT, sprintf('A = %d', a($woord)) . PHP_EOL);
fwrite(STDOUT, sprintf('B = %d', b($woord)) . PHP_EOL);
fwrite(STDOUT, sprintf('C = %d', c($woord)) . PHP_EOL);
fwrite(STDOUT, PHP_EOL);
