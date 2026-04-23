<?php
/**
 * /**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 1: Array Declaration, Initialisation & Traversal [6 marks]
 *
 * @author     [Reuel Ng'ang'a]
 * @student    [ENE212-0058/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [22nd April 2026]
 */

// Working dataset — use this array for ALL exercises below
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Counting & Summing
// ══════════════════════════════════════════════════════════════
// Use count() to print total number of scores
// Use array_sum() to print total marks
// Compute and print average (to 2 decimal places)

// TODO: Exercise A — your code here


// ══════════════════════════════════════════════════════════════
// EXERCISE B — Sorting
// ══════════════════════════════════════════════════════════════
// 1. Sort $scores ascending using sort() — print result
// 2. Sort $scores descending using rsort() — print result
// 3. Sort $scores ascending again and use array_reverse()
//    to get descending — print result
// Note: explain in a comment why sort() modifies the original array

// TODO: Exercise B — your code here


/**
 * Exercise A — Counting & Summing
 * Basic calculations for total count, sum, and average.
 */

$scores = [85, 91, 72, 88, 91, 65, 98, 77];

// count() — total number of scores
$count = count($scores);
echo "Total number of scores: " . $count . "<br>";

// array_sum() — total marks
$total_marks = array_sum($scores);
echo "Total marks: " . $total_marks . "<br>";

// Average to 2 decimal places
$average = $total_marks / $count;
echo "Average score: " . number_format($average, 2) . "<br>";




// ══════════════════════════════════════════════════════════════
// EXERCISE C — Searching
// ══════════════════════════════════════════════════════════════
// 1. Use in_array() to check if 88 exists — print true/false
// 2. Use in_array() to check if 100 exists — print true/false
// 3. Use array_search() to find the index of 91 — print it
// 4. Use array_search() on a value that doesn't exist —
//    show how to handle the false return value safely

// TODO: Exercise C — your code here
/**
 * Exercise C — Searching
 * Locating values and handling boolean/integer returns.
 */

// in_array() checks
echo "Contains 88: " . (in_array(88, $scores) ? "true" : "false") . "\n";
echo "Contains 100: " . (in_array(100, $scores) ? "true" : "false") . "\n";

// array_search() for index
$index = array_search(91, $scores);
echo "Index of 91: " . $index . "\n";

// Safe handling of false
$search_val = 100;
$result = array_search($search_val, $scores);
if ($result !== false) {
    echo "Found $search_val at index: " . $result . "\n";
} else {
    echo "Value $search_val not found.\n";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Transformation Functions
// ══════════════════════════════════════════════════════════════
// Use the original $scores array (re-declare if needed)
// 1. array_unique() — remove duplicates, print result
// 2. array_slice($scores, 2, 5) — print the slice and
//    explain what the parameters mean in a comment
// 3. implode(", ", $scores) — print as comma-separated string
// 4. array_reverse() — print reversed array

// TODO: Exercise D — your code here
/**
 * Exercise D — Transformation
 * Changing the structure and presentation of array data.
 */

// array_unique() — remove duplicates
$unique = array_unique($scores);
echo "Unique scores: " . implode(", ", $unique) . "\n";

/**
 * array_slice($scores, 2, 5) parameters:
 * 1. $scores: The source array.
 * 2. 2: Starting index (offset).
 * 3. 5: Number of elements to extract (length).
 */
$sliced = array_slice($scores, 2, 5);
echo "Sliced (2, 5): " . implode(", ", $sliced) . "\n";

// implode() — convert to string
echo "Imploded string: " . implode(", ", $scores) . "\n";

// array_reverse() — reverse order
$final_reverse = array_reverse($scores);
echo "Reversed: " . implode(", ", $final_reverse) . "\n";
?>
