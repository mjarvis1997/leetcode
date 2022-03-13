#!/usr/bin/php
<?php

echo "\n";
echo "Here are the PHP solutions currently available:\n";

$solutions = [
    'reverseInteger',
    'addTwoNumbers',
    'longestSubstringWithoutRepeatingCharacters',
    'findMedianSortedArrays'
];
$count = 0;
foreach ($solutions as $solution) {
    echo (string)$count . ". ";
    echo $solution . "\n";
    ++$count;
}
echo "\n";


$input = readline("Which would you like to use?");
?>