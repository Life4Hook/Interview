<?php
function add_to_array($data, $a){
    for ($index = 0; $index < count($data); $index++){
        if (strpos($data[$index], "2") !== false){
            for ($new_index = count($data) - 1; $new_index > $index; $new_index--){
                $data[$new_index + 1] = $data[$new_index];
            }
            $index += 1;
            $data[$index] = $a;
        }
    }
    return $data;
}

$arr = [1, 32, 55, 82, 1596, 22, 19561];

print_r(add_to_array($arr, 'NEW'));
