<?php

/*
 Užduotis nuo 1 iki 4 atlikite galite į vieną failą, rekomenduojame 5, 6, 7 užduotis
 atlikti atskiruose failuose. 
 Funkcijų ir kintamųjų pavadinimus vadinkite suprantamai,
 taip kad kiti galėtu suprasti ką funkicija daro ar kintamasis saugo (vertinime
 atsižvelgsime į teisingus namingus)
 Pabandykite laikykis code standartų, tiek kiek esame apie juos šnekėje.
 */

/*
 1.  Grąžinkite visų lyginių skaičių, esančių $numbers masyve, sumą (1 balas)
  +0.5 jeigu array funkcijos naudojamos
*/

$numbers = [
    15,
    55,
    66,
    91,
    100,
    995,
    17,
    550,
];

echo "1 UŽDUOTIS" . PHP_EOL;

function exercises1(array $numbers)
{
    $sumEven = array_sum(array_filter($numbers, function($evenNum) 
    {
        return $evenNum % 2 == 0;
    }));
    return $sumEven;
};

echo "Masyvo lyginių skaičių suma lygi " . (exercises1($numbers)) . "." . PHP_EOL;

/*
 2. Grąžinkite visų skaičių, esančių $numbers2 masyve, sandaugą (1 balas), 
 +0.5 jeigu array funkcijos naudojamos
*/
// visus skaiciu susdauginti 1*3*5*55*87*100*12
// masyvas masye, galim daryti su ciklais

$numbers2 = [
    [1, 3, 5],
    [55, 87, 100],
    [12],
    [],
];

echo "2 UŽDUOTIS" . PHP_EOL;

function exercises2(array $numbers2)
{
    return array_reduce($numbers2, function (int $product, array $newArray) {
        foreach ($newArray as $number)
        $product *= $number;
        return $product;
        },
        1);
}
echo exercises2($numbers2);

/*
 3. Masyve $holidays turime kelionių agentūros siūlomas keliones su kaina ir
  dalyvių skaičiumi.
 Terminale išspausdinkite santrauką, kurioje matytusi miesto pavadinimas, 
 kelionių pavadinimai ir dalyvių sumokėta suma
 Dėmesio! Santraukoje nerodykite tų kelionių, kurių kaina yra null. (2 balai)
*/

//   Destination "Paris".
//   Titles: "Romantic Paris", "Hidden Paris"
//   Total: 99500
//   ************
//   Destination "New York"


//pirma pasiziureti ar neturi null, ir gruopuoti paris (price suma)

$holidays = [
    [
        'title' => 'Romantic Paris',
        'destination' => 'Paris',
        'price' => 1500,
        'tourists' => 55,
    ],
    [
        'title' => 'Amazing New York',
        'destination' => 'New York',
        'price' => 2699,
        'tourists' => 21,
    ],
    [
        'title' => 'Spectacular Sydey',
        'destination' => 'Sydey',
        'price' => 4130,
        'tourists' => 9,
    ],
    [
        'title' => 'Hidden Paris',
        'destination' => 'Paris',
        'price' => 1700,
        'tourists' => 10,
    ],
    [
        'title' => 'Emperors of the past',
        'destination' => 'Beijing',
        'price' => null,
        'tourists' => 10,
    ],
];

echo "3 UŽDUOTIS" . PHP_EOL;

function unique_title(array $array, mixed $key): array
    {
        $temp_array = [];
        foreach ($array as &$element) {
            if (!isset($temp_array[$element[$key]]))
                $temp_array[$element[$key]] = &$element;
        }
        $array = array_values($temp_array);
        return $array;
    }

function exercises3(array $holidays): void
{
    $newHolidays = [];
    for ($i = 0; $i < count($holidays); $i++) {
        if (isset($holidays[$i]['price'])) {
            $sumHolidays = [
                'destination' => $holidays[$i]['destination'],
                'titles' => [$holidays[$i]['title']],
                'total' => $holidays[$i]['price'] * $holidays[$i]['tourists']
            ];
            foreach ($holidays as $holiday) {
                if ($sumHolidays['destination'] === $holiday['destination'] && !in_array($holiday['title'], $sumHolidays['titles'], true)) {
                    $sumHolidays['titles'][] = $holiday['title'];
                    $sumHolidays['total'] += $holiday['price'] * $holiday['tourists'];
                }
            }
            $sumHolidays['titles'] = implode(", ", $sumHolidays['titles']);
            $newHolidays[] = $sumHolidays;
        };
    };

    $newHolidays = unique_title($newHolidays, 'destination');

    foreach ($newHolidays as $key => $holidays) {
        echo 'Destination ' . $holidays['destination'] . PHP_EOL;
        echo 'Titles: ' . $holidays['titles'] . PHP_EOL;
        echo 'Total: ' . $holidays['total'] . PHP_EOL;

        $array_keys = array_keys($newHolidays);
        if (end($array_keys) !== $key) {
            echo '************' . PHP_EOL;
        }
    };
}
exercises3($holidays);

