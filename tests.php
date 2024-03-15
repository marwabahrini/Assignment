<?php
// include random.php to access the generate_random_number() function
include 'random.php';

// define a function to run the unit tests
function run_unit_tests() {
    // test: check if the generated number is within the expected range
    $random_number = generate_random_number();
    assert($random_number >= 1 && $random_number <= 99,
        "test Case 1 Failed: Generated random number is outside the range.");

}

// execute the unit tests
try {
    run_unit_tests();
    echo "All tests passed.\n"; }
catch (Exception $e)
{echo "An error occurred during testing: " . $e->getMessage() . "\n"; }

