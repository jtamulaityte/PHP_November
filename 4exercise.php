<?php

/*
 4. Pakoreguokite 3 užduotį taip, kad ji duomenis rašytų ne į terminalą, 
 o spausdintų į failą. (1 balas)
*/

//jei po viena eilute rasysim tai upendmode

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


echo "4 UŽDUOTIS" . PHP_EOL;

function unique_title(array $array, mixed $key): array
    {
        $temp_array = [];
        foreach ($array as &$element) {
            if (!isset($temp_array[$element[$key]]))
                $temp_array[$element[$key]] = &$element;
        }
        $array = array_values($temp_array);
        return $array;
    };

function exercises4(array $holidays): void
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
        $filename = "trips_Sum_up.txt";
        $file = fopen($filename, "a+") or die("File was not open");
        fwrite($file, 'Destination ' . $holidays['destination'] . PHP_EOL);
        fwrite($file, 'Titles: ' . $holidays['titles'] . PHP_EOL);
        fwrite($file, 'Total: ' . $holidays['total']) . PHP_EOL;
        fclose($file);

        $array_keys = array_keys($newHolidays);
        if (end($array_keys) !== $key) {
            $filename = "trips_Sum_up.txt";
            $file = fopen($filename, "a+") or die("File was not open");
            fwrite($file, PHP_EOL . '************' . PHP_EOL);
            fclose($file);
        }
    }
};

exercises4($holidays);

