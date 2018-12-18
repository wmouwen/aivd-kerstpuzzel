<?php

function recurse(array &$todo, array &$values)
{
    if (empty($todo)) {
        $kerst = intval($values['k'] . $values['e'] . $values['r'] . $values['s'] . $values['t']);
        $rekenen = intval($values['r'] . $values['e'] . $values['k'] . $values['e'] . $values['n'] . $values['e'] . $values['n']);
        $met = intval($values['m'] . $values['e'] . $values['t']);
        $tien = intval($values['t'] . $values['i'] . $values['e'] . $values['n']);
        $letters = intval($values['l'] . $values['e'] . $values['t'] . $values['t'] . $values['e'] . $values['r'] . $values['s']);
        $minstreel = intval($values['m'] . $values['i'] . $values['n'] . $values['s'] . $values['t'] . $values['r'] . $values['e'] . $values['e'] . $values['l']);
        $rekenles = intval($values['r'] . $values['e'] . $values['k'] . $values['e'] . $values['n'] . $values['l'] . $values['e'] . $values['s']);

        if ($kerst === $rekenen + $met * $tien - $letters) {
            fwrite(STDOUT, 'KERST = REKENEN + MET * TIEN - LETTERS' . PHP_EOL);
            fwrite(STDOUT, $kerst . ' = ' . $rekenen . ' + ' . $met . ' * ' . $tien . ' - ' . $letters . PHP_EOL);
            fwrite(STDOUT, 'MINSTREEL = ' . $minstreel . PHP_EOL);
            fwrite(STDOUT, 'REKENLES = ' . $rekenles . PHP_EOL);
            fwrite(STDOUT, PHP_EOL);
        }
        return;
    }

    $key = array_shift($todo);

    foreach (range(0, 9) as $value) {
        if (in_array($value, $values)) {
            continue;
        }

        $values[$key] = $value;

        recurse($todo, $values);

        unset($values[$key]);
    }

    array_unshift($todo, $key);
}

$todo = ['k', 'e', 'r', 's', 't', 'n', 'm', 'i', 'l'];
$values = [];

recurse($todo, $values);
