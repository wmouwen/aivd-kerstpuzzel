<?php

foreach (range('d', 'l') as $c) {
//foreach (range('d', 'l') as $c) {
    $d = chr((ord('m') - ord('a') + 1) - (ord($c) - ord('a') + 1) + ord('a') - 1);
    $b = chr((ord($d) - ord('a') + 1) + (ord('d') - ord('a') + 1) + ord('a') - 1);
    $a = chr((ord('m') - ord('a') + 1) + (ord($b) - ord('a') + 1) + ord('a') - 1);

    foreach (['e', 'i', 'r'] as $e) {
    //foreach (range('a', 'v') as $e) {
        $f = chr((ord('w') - ord('a') + 1) - (ord($e) - ord('a') + 1) + ord('a') - 1);

        foreach (['i', 'w'] as $g) {
        //foreach (range('f', 'z') as $g) {
            $h = chr((ord($g) - ord('a') + 1) - (ord('e') - ord('a') + 1) + ord('a') - 1);

            fwrite(STDOUT, sprintf(
                    'De_%sm%s%s%sd_w%s%sdz%se%send toen CB een windei cadeau gaf',
                    $a, $b, $c, $d, $e, $f, $g, $h
                ) . PHP_EOL);
        }
    }
}
