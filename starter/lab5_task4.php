<?php
//**
 /**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 1: Array Declaration, Initialisation & Traversal [6 marks]
 *
 * @author     [Reuel Ng'ang'a]
 * @student    [ENE212-0058/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [22nd April 2026]
 */

// ── Scenario: Bridge Load Sensor Analysis ────────────────────
// A bridge has 8 load sensors recording weight in tonnes.
// Analyse the readings to support a structural safety report.

$sensor_readings = [12.4, 8.7, 15.2, 19.8, 7.3, 14.6, 11.9, 16.3];
$sensor_labels   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
$max_safe_load   = 18.0; // tonnes — safety threshold

// ── STEP 1: Basic statistics ─────────────────────────────────
// Compute WITHOUT using array_sum(), max(), min() PHP functions
// Use loops only:
//   $mean   — average of all readings (2 decimal places)
//   $max    — highest reading + which sensor
//   $min    — lowest reading + which sensor
//   $total  — sum of all readings

// TODO: Step 1 — your code here
// Compute WITHOUT using array_sum(), max(), min() PHP functions
// Use loops only

$total       = 0;
$max         = $sensor_readings[0];
$min         = $sensor_readings[0];
$max_sensor  = $sensor_labels[0];
$min_sensor  = $sensor_labels[0];

for ($i = 0; $i < count($sensor_readings); $i++) {
    $reading = $sensor_readings[$i];

    // accumulate total
    $total += $reading;

    // track maximum
    if ($reading > $max) {
        $max        = $reading;
        $max_sensor = $sensor_labels[$i];
    }

    // track minimum
    if ($reading < $min) {
        $min        = $reading;
        $min_sensor = $sensor_labels[$i];
    }
}

$mean = round($total / count($sensor_readings), 2);

echo "<h3>Step 1 — Basic Statistics (loops only)</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse;'>";
echo "<tr style='background:#1F3864;color:#fff;'><th>Statistic</th><th>Value</th><th>Sensor</th></tr>";
echo "<tr><td>Total load</td><td>{$total}t</td><td>—</td></tr>";
echo "<tr style='background:#EBF3FB;'><td>Mean load</td><td>{$mean}t</td><td>—</td></tr>";
echo "<tr><td>Maximum reading</td><td>{$max}t</td><td><strong>{$max_sensor}</strong></td></tr>";
echo "<tr style='background:#EBF3FB;'><td>Minimum reading</td><td>{$min}t</td><td><strong>{$min_sensor}</strong></td></tr>";
echo "</table>";

// ── STEP 2: Above-average count ──────────────────────────────
// Count how many sensors recorded ABOVE the mean.
// Store their labels in an $above_avg array.
// Print: "X of 8 sensors recorded above-average load"
// Print the list of those sensor labels.

// TODO: Step 2 — your code here
//── STEP 2: Above-average count ──────────────────────────────
$above_avg   = [];
$above_count = 0;

for ($i = 0; $i < count($sensor_readings); $i++) {
    if ($sensor_readings[$i] > $mean) {
        $above_avg[] = $sensor_labels[$i];
        $above_count++;
    }
}

echo "<h3>Step 2 — Above-Average Sensors</h3>";
echo "<p>" . count($sensor_readings) . " sensors analysed. Mean = {$mean}t</p>";
echo "<p><strong>{$above_count} of " . count($sensor_readings) . " sensors recorded above-average load</strong></p>";
echo "<p>Above-average sensors: <strong>" . implode(", ", $above_avg) . "</strong></p>";

// ── STEP 3: Safety threshold check ───────────────────────────
// Check each sensor against $max_safe_load (18.0 tonnes)
// If reading > $max_safe_load: flag as "UNSAFE"
// Otherwise: "SAFE"
// Print a formatted safety report table:
//   Sensor | Reading | Status
//   S1     | 12.4t   | SAFE
//   S4     | 19.8t   | UNSAFE  ← flag clearly

// TODO: Step 3 — your code here
echo "<h3>Step 3 — Safety Threshold Check (threshold = {$max_safe_load}t)</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse; width:400px;'>";
echo "<tr style='background:#1F3864;color:#fff;'><th>Sensor</th><th>Reading</th><th>Status</th></tr>";

for ($i = 0; $i < count($sensor_readings); $i++) {
    $reading = $sensor_readings[$i];
    $label   = $sensor_labels[$i];

    if ($reading > $max_safe_load) {
        $status   = "UNSAFE";
        $bg       = "background:#FFCCCC;";
        $fw       = "font-weight:bold; color:#CC0000;";
    } else {
        $status   = "SAFE";
        $bg       = "background:#CCFFCC;";
        $fw       = "color:#006600;";
    }

    $row_bg = $i % 2 === 0 ? "" : "background:#f9f9f9;";
    echo "<tr style='{$bg}'>";
    echo "<td>{$label}</td>";
    echo "<td>{$reading}t</td>";
    echo "<td style='{$fw}'>{$status}</td>";
    echo "</tr>";
}
echo "</table>";


// ── STEP 4: Sorted safety report ─────────────────────────────
// Sort the sensor readings in DESCENDING order using your
// bubble sort from Task 3 (copy the function here).
// Print the sorted readings alongside their original sensor labels.
// Note: you must track which label belongs to which reading
// as you sort — use a parallel array technique.

// TODO: Step 4 — your code here
echo "<h3>Step 4 — Sorted Safety Report (descending)</h3>";

// Copy both arrays so originals are preserved
$sorted_readings = $sensor_readings;
$sorted_labels   = $sensor_labels;
$n               = count($sorted_readings);

// Bubble sort descending — sort readings and labels together
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($sorted_readings[$j] < $sorted_readings[$j + 1]) {
            // Swap readings
            $temp_r              = $sorted_readings[$j];
            $sorted_readings[$j] = $sorted_readings[$j + 1];
            $sorted_readings[$j + 1] = $temp_r;

            // Swap labels in parallel to keep them matched
            $temp_l              = $sorted_labels[$j];
            $sorted_labels[$j]   = $sorted_labels[$j + 1];
            $sorted_labels[$j + 1] = $temp_l;
        }
    }
}

echo "<p>Sensors ranked highest load to lowest:</p>";
echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse; width:400px;'>";
echo "<tr style='background:#1F3864;color:#fff;'><th>Rank</th><th>Sensor</th><th>Reading</th><th>Status</th></tr>";

for ($i = 0; $i < $n; $i++) {
    $reading  = $sorted_readings[$i];
    $label    = $sorted_labels[$i];
    $status   = ($reading > $max_safe_load) ? "UNSAFE" : "SAFE";
    $status_style = ($status === "UNSAFE") ? "color:#CC0000;font-weight:bold;" : "color:#006600;";
    $bg = $i % 2 === 0 ? "" : "background:#EBF3FB;";

    echo "<tr style='{$bg}'>";
    echo "<td>" . ($i + 1) . "</td>";
    echo "<td>{$label}</td>";
    echo "<td>{$reading}t</td>";
    echo "<td style='{$status_style}'>{$status}</td>";
    echo "</tr>";
}
echo "</table>";

// ── Required Test Data Sets — screenshot each ────────────────
// Set A (default above): expect S4 UNSAFE, mean ~13.28t
// Set B: [5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8]
//        → all SAFE, mean 5.45t, above-avg = 4 sensors
// Set C: [20.1, 21.3, 19.9, 22.0, 18.5, 20.8, 19.2, 21.7]
//        → all UNSAFE (all exceed 18.0t)


// ── Required Test Data Sets — screenshot each ────────────────
// Set A (default above): expect S4 UNSAFE, mean ~13.28t
// Set B: [5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8]
//        → all SAFE, mean 5.45t, above-avg = 4 sensors
// Set C: [20.1, 21.3, 19.9, 22.0, 18.5, 20.8, 19.2, 21.7]
//        → all UNSAFE (all exceed 18.0t)
