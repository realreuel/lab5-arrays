<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 3: Bubble Sort & Linear Search [7 marks]
 *
 * IMPORTANT: You must write pseudocode AND a flowchart for BOTH
 * the bubble sort and linear search in your PDF report BEFORE
 * writing any code below.
 **
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 1: Array Declaration, Initialisation & Traversal [6 marks]
 *
 * @author     [Reuel Ng'ang'a]
 * @student    [ENE212-0058/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [22nd April 2026]
 */

// Working dataset
$data = [64, 34, 25, 12, 22, 11, 90, 47, 55, 38];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Manual Bubble Sort (ascending)

// ══════════════════════════════════════════════════════════════
// Implement bubble sort WITHOUT using PHP's sort() function.
// Use nested for loops.
// Rules:
//   - Outer loop: runs (n-1) times
//   - Inner loop: compares adjacent pairs
//   - Swap if left > right using a $temp variable
//   - Print the array after EACH full outer pass to show progress
//
// Expected: [11, 12, 22, 25, 34, 38, 47, 55, 64, 90]
//
// After sorting, answer in a comment:
// Q: How many comparisons does bubble sort make for n=10 elements
//    in the worst case? Show your working.

// TODO: Exercise A — Bubble Sort — your code here
echo "<h3>Exercise A — Manual Bubble Sort (ascending)</h3>";
echo "<p>Sorting: [" . implode(", ", $data) . "]</p>";
echo "<p>Printing array after each full outer pass:</p>";
echo "<pre style='background:#f5f5f5; padding:10px;'>";

$arr = $data; // work on a copy so original $data stays intact
$n   = count($arr);

// Outer loop: runs (n-1) times
for ($i = 0; $i < $n - 1; $i++) {
    // Inner loop: compares adjacent pairs
    // Each pass bubbles the largest unsorted element to its place
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            // Swap using $temp variable
            $temp        = $arr[$j];
            $arr[$j]     = $arr[$j + 1];
            $arr[$j + 1] = $temp;
        }
    }
    // Print array after each full outer pass
    echo "Pass " . ($i + 1) . ": [" . implode(", ", $arr) . "]\n";
}

echo "</pre>";
echo "<p><strong>Final sorted result:</strong> [" . implode(", ", $arr) . "]</p>";

// Q: Worst-case comparisons for n=10
// The outer loop runs (n-1) = 9 times.
// Pass 1: (n-1)   = 9 comparisons
// Pass 2: (n-2)   = 8 comparisons
// Pass 3: (n-3)   = 7 comparisons  ... and so on
// Total = 9+8+7+6+5+4+3+2+1 = 45 comparisons
// Formula: n*(n-1)/2 = 10*9/2 = 45 comparisons in worst case.
echo "<p><em>Worst-case comparisons for n=10: 9+8+7+6+5+4+3+2+1 = <strong>45</strong> comparisons (formula: n×(n-1)/2)</em></p>";

echo "<hr>";

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Optimised Bubble Sort
// ══════════════════════════════════════════════════════════════
// Modify your bubble sort to use a $swapped flag.
// If no swaps occur in a full pass, the array is already sorted
// — break early. This is the optimised version.
// Test it on an already-sorted array and show it exits early.

// TODO: Exercise B — Optimised Bubble Sort — your code here
echo "<h3>Exercise B — Optimised Bubble Sort (with \$swapped flag)</h3>";

// Test on an already-sorted array to demonstrate early exit
$sorted_input = [11, 12, 22, 25, 34, 38, 47, 55, 64, 90];
echo "<p>Testing on already-sorted array: [" . implode(", ", $sorted_input) . "]</p>";
echo "<pre style='background:#f5f5f5; padding:10px;'>";

$arr2 = $sorted_input;
$n2   = count($arr2);

for ($i = 0; $i < $n2 - 1; $i++) {
    $swapped = false; // reset flag at start of each pass

    for ($j = 0; $j < $n2 - $i - 1; $j++) {
        if ($arr2[$j] > $arr2[$j + 1]) {
            $temp          = $arr2[$j];
            $arr2[$j]      = $arr2[$j + 1];
            $arr2[$j + 1]  = $temp;
            $swapped       = true; // a swap occurred
        }
    }

    echo "Pass " . ($i + 1) . ": [" . implode(", ", $arr2) . "]";

    // If no swaps occurred in this pass, array is already sorted — exit early
    if (!$swapped) {
        echo "  ← no swaps, exiting early!\n";
        break;
    } else {
        echo "\n";
    }
}

echo "</pre>";
echo "<p><strong>Result:</strong> Optimised sort exits after Pass 1 because no swaps were needed — the array was already sorted.</p>";

echo "<hr>";


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Linear Search
// ══════════════════════════════════════════════════════════════
// Implement a linear search function:
//   linearSearch(array $arr, $target): int|false
// Returns the INDEX of $target if found, false if not found.
// Do NOT use in_array() or array_search() — implement manually.
//
// Test with:
//   linearSearch($data, 22)  → should return index 4 (original array)
//   linearSearch($data, 99)  → should return false
//
// Print clearly: "Found 22 at index 4" or "99 not found"

// TODO: Exercise C — Linear Search — your code here
// Linear search function — no in_array() or array_search() used
function linearSearch(array $arr, $target): int|false
{
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === $target) {
            return $i; // return index immediately when found
        }
    }
    return false; // target not found in array
}

// Test 1: search for 22 in original $data
$result22 = linearSearch($data, 22);
if ($result22 !== false) {
    echo "linearSearch(\$data, 22): <strong>Found 22 at index $result22</strong><br>";
} else {
    echo "linearSearch(\$data, 22): 22 not found<br>";
}

// Test 2: search for 99 — not in array
$result99 = linearSearch($data, 99);
if ($result99 !== false) {
    echo "linearSearch(\$data, 99): Found 99 at index $result99<br>";
} else {
    echo "linearSearch(\$data, 99): <strong>99 not found</strong><br>";
}

echo "<hr>";


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Sort then Search
// ══════════════════════════════════════════════════════════════
// 1. Sort $data using your bubble sort from Exercise A
// 2. Run linearSearch() on the sorted array for value 47
// 3. In a comment, explain: after sorting, has the index of 47
//    changed compared to the original array? Why does this matter?

// TODO: Exercise D — your code here
echo "<h3>Exercise D — Sort then Search</h3>";

// 1. Sort $data using bubble sort
$data_sorted = $data; // copy original
$ns = count($data_sorted);
for ($i = 0; $i < $ns - 1; $i++) {
    for ($j = 0; $j < $ns - $i - 1; $j++) {
        if ($data_sorted[$j] > $data_sorted[$j + 1]) {
            $temp               = $data_sorted[$j];
            $data_sorted[$j]    = $data_sorted[$j + 1];
            $data_sorted[$j + 1]= $temp;
        }
    }
}

echo "<p>Original array: [" . implode(", ", $data) . "]</p>";
echo "<p>Sorted array:   [" . implode(", ", $data_sorted) . "]</p>";

// 2. Run linearSearch() on sorted array for value 47
$result47 = linearSearch($data_sorted, 47);
if ($result47 !== false) {
    echo "<p>linearSearch(sorted, 47): <strong>Found 47 at index $result47</strong></p>";
} else {
    echo "<p>linearSearch(sorted, 47): 47 not found</p>";
}

// Comment: After sorting, has the index of 47 changed?
// In the original array, 47 is at index 7.
// After bubble sort (ascending), 47 is at index 6.
// YES — the index changes after sorting because elements are
// rearranged into a new order. This matters because if you sort
// first and then search, you must use the index relative to the
// SORTED array, not the original. For finding a VALUE, linear
// search still works correctly — but the index it returns now
// refers to the sorted array's position, not the original.
echo "<p><em>Note: In the original array, 47 was at index 7. After sorting, it moved to index $result47. The index changes because sorting rearranges elements — always note which array version an index refers to.</em></p>";
