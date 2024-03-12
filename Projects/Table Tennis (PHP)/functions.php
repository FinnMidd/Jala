<?php

//* ---------------------------------- *//
//* Backend Table Tennis Function Code *//
//* ---------------------------------- *//
//? WIP new functions

// READ JSON FILE
function read_json($file) {
    // get contents
    $json_data = file_get_contents($file);

    // check valid
    if ($json_data === false) {
        return false; // file read error
    }

    // decode data
    $decoded_data = json_decode($json_data, true);

    //  check valid
    if ($decoded_data === null) {
        return false; // decoding error
    }

    // return valid data
    return $decoded_data;
}

//* ---------------------------------- *//

// KEY VALUE SEARCH
// WARNING: $search parameter accepts a string of the key value pair e.g $search = '"id": 99'
function object_search($data, $search) {
    // decode search
    $search = json_decode('{'.$search.'}', true);

    // create match array
    $matched_items = [];

    // loop data
    foreach ($data as $key => $objects) {
        // loop objects
        foreach ($objects as $object) {
            // check for match
            if (isset($object[key($search)]) && $object[key($search)] == $search[key($search)]) {
                // add to array
                $matched_objects[] = $object;
            }
        }
    }

    // return array
    return $matched_items;
}

//* ---------------------------------- *//

// CALCULATE AVERAGE
function calculate_average($values) {
    // calculate sum
    $sum = array_sum($values);

    // calculate amount
    $amount = count($values);

    // calculate average
    $average = $amount > 0 ? $sum / $amount : 0; 

    // return average
    return $average;
}

//* ---------------------------------- *//

// GET IMG FROM ID
// Made redundant
function idToImg($id) {
    return "img/profile_$id.png";
}

?>