<?php
$numbersTrue = [
    "84951234567", "+74951234567", "8-495-1-234-567",
    "8 (8122) 56-56-56", "8-911-1234567", "8 (911) 12 345 67",
    "8-911 12 345 67", "8(911)1234567", "8 911 1234567",
    "8 ( 911 ) 123  45  67", "8 - 911 - 123 - 4 - 567", "+ 7 999 123 4567"
];
$numbersFail = [
    "02", "84951234567 позвать люсю", "849512345",
    "849512345678", "8 (409) 123-123-123", "7900123467",
    "5005005001", "8888-8888-88", "84951a234567",
    "8495123456a", "9441234567", "+1 234 5678901",
    "+8 234 5678901", "7 234 5678901"
];


function replaceNumbers($arrayNumbers) {
    $regExpReplace = ["/\+7|\+ 7/", "/[- ()]*/"];
    $replacements = ["8", ""];
    $changedNumbers = [];

    if (!is_array($arrayNumbers) || empty($arrayNumbers))
        return false;

    foreach ($arrayNumbers as $value) {
        $changedNumbers[] = preg_replace($regExpReplace, $replacements, $value);
    }

    return $changedNumbers;
}

function checkNumbers($arrayNumbers) {
    $regExp = "/^(\+7|\+ 7|8)([- ()])*(\d[- ()]*){10}$/";
    $correctNumbers = [];

    foreach ($arrayNumbers as $value) {
        if (!preg_match($regExp, $value))
            echo "Некорректный номер: $value\n";
        else
            $correctNumbers[] = $value;
    }

    if (empty($correctNumbers))
        return false;

    return $correctNumbers;
}

$correctNumbers = checkNumbers($numbersTrue);
$incorrectNumbers = checkNumbers($numbersFail);
$numbersResult = replaceNumbers($correctNumbers);
print_r($numbersResult);