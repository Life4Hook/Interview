<?php
function add_to_array($data, $a){
    for ($val = 0; $val < count($data); $val++){
        if (strpos($data[$val], "2") !== false){
            $data[] = 0;
            for ($new_val = count($data) - 1; $new_val > $val; $new_val--){
                $data[$new_val] = $data[$new_val - 1];
            }
            $val += 1;
            $data[$val] = $a;
        }
    }
    return $data;
}

$arr = [1, 32, 55, 82, 1596, 22, 19561];

print_r(add_to_array($arr, 'NEW'));
