<?php

function countPairs(array $numbers, int $target): array {
    $countedArr = [];

    foreach ($numbers as $key => $value) {
        $newNumbers = subArray($key, $numbers);
        if (count($newNumbers) <= 1) break;

        setPair($value, $newNumbers, $target, $countedArr);
    }

    return $countedArr;
}

function subArray($keyInit, array $numbers): array {
    $newNumbers = [];

    foreach ($numbers as $key => $value) {
        if ($key > $keyInit) $newNumbers[] = $value;
    }

    return $newNumbers;
}

function setPair(int $x, array $newNumbers, int $target, array &$countedArr): void {
    foreach ($newNumbers as $key => $number) {
        $tmpPair = [];
        if ($number + $x == $target) {
            $tmpPair = [$x, $number];
        }
        else continue;

        if (!isPairExist($tmpPair, $countedArr)) {
            $countedArr[] = $tmpPair;
        }
    }
}

function isPairExist(array $arr1D, array $arr2D): bool {
    foreach ($arr2D as $key => $arr) {
        if (
            ($arr1D[0] == $arr[0])
            && ($arr1D[1] == $arr[1])
        ) {
            return true;
        }

        if (
            ($arr1D[0] == $arr[1])
            && ($arr1D[1] == $arr[0])
        ) {
            return true;
        }
    }

    return false;
}

function console(mixed $val) {
    echo json_encode($val);
    die;
}

$pairs1 = countPairs([1, 3, 2, 2, 3, 4], 5); // output 2
$pairs2 = countPairs([1, 1, 1, 1], 2); // Output: 1
$pairs3 = countPairs([1, 2, 3, 4, 5], 7); // Output: 2

console([
    'pairs1' => $pairs1,
    'pairs2' => $pairs2,
    'pairs3' => $pairs3,
]);