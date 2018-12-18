<?php

const INPUT = [
    'cdqiajneqgvajnkndwddqn',
    'azczdfpjqcjndcscydcqfpjncd',
    'cksioupcirkhhlpdnigglhrild',
    'fmkcmtsfhgqpskkmqvcvcmgmnhgnsinchgnmomddscehdn',
    'qmorlqditapofmqhcdah',
];

const KEYS = [
    'TODO Onbekend',
    'Charles Aznavour',
    'Koos Alberts',
    'Montserrat Caballe',
    'Queen of Soul',
];

function decrypt(string $encrypted, array $key)
{
    $decrypted = '';

    for ($i = 0; $i < strlen($encrypted); $i++) {
        $decrypted .= $key[$encrypted[$i]];
    }

    return $decrypted;
}

for ($i = 0; $i < 5; $i++) {
    $trueKey = [];

    foreach (str_split(strtolower(KEYS[$i])) as $letter) {
        if (in_array($letter, range('a', 'z')) && !in_array($letter, $trueKey)) {
            $trueKey[chr(ord('a') + count($trueKey))] = $letter;
        }
    }

    foreach (range('a', 'z') as $letter) {
        if (!in_array($letter, $trueKey)) {
            $trueKey[chr(ord('a') + count($trueKey))] = $letter;
        }
    }

    fwrite(STDOUT, '--- ' . KEYS[$i] . ' ---' . PHP_EOL);
    fwrite(STDOUT, decrypt(INPUT[$i], array_flip($trueKey)) . PHP_EOL);
    fwrite(STDOUT, PHP_EOL);
}
