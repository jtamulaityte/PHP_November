<?php

/*
 6. Parašykite programą, kuri per argumentų padavimą terminale, paleidžiant 
 funkciją juos priimtų, sudaugintų tarpusavyje ir pakeltu kvadratu. 
 Atkreipkite dėmesį, kad jeigu argumentas yra paduodamas ne skaičius, reikia, kad
terminale gautumėme atitinkamą klaidos kodą ir pranešimą. (2 balai)
*/

//  php index.php  3 5 -->> Jūsų skaičius: 225


/* $number = readline("Įvesk pirmą skaičių: ");
$number2 = readline("Įvesk antrą skaičių: ");

if (is_numeric($number) === false || !(int)$number2) {
    echo "Įvestas ne skaičius!";
    exit(1);
}
echo "Rezultatas: " . pow(($number * $number2),2) . PHP_EOL; */

$num = (float)$argv[1];
$num2 = (float)$argv[2];
$formula = ($num * $num2)**2;

if (is_numeric($argv[1]) === false && is_numeric($argv[2]) === false ||
    is_numeric($argv[1]) === false && is_numeric($argv[2]) ||
    is_numeric($argv[1]) && is_numeric($argv[2]) === false) {
    echo "Prašome įvesti tik skaičius" . PHP_EOL;
    exit(1);
}

echo "Jūsų įvestų skaičių " . $num . ' ir ' . $num2 . " sandauga, pakelta kvadratu yra: " . $formula . PHP_EOL;
