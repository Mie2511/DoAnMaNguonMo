<?php
$superheroes = array(
    "spider-man" => array(
        "name" => "Peter Parker",
        "email" => "peterparker@mail.com"
    ),
    "super-man" => array(
        "name" => "Clark Kent",
        "email" => "clarkkent@mail.com"
    ),
    "iron-man" => array(
        "name" => "Tony Stark",
        "email" => "tonystark@mail.com"
    )
);

foreach ($superheroes as $key => $value) {
    echo "Key: \n" . $key . "\n";
    echo "Value: \n";
    foreach ($value as $Key1 => $Value1) {
        echo $Key1 . ": " . $Value1 . "\n";
    }
    echo "\n";
}
?>