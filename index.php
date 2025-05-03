<!DOCTYPE html>
<html>
<head>
    <title>Game of Life : Original vs Next Gen</title>
    <!-- Linking external CSS file -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>

<div class="container">

    <!-- FIRST GRID: Original Grid -->
    <div>
        <h3>Original Grid</h3>
        <div class="grid">
        <?php
        $size = 25; // Total grid size: 25x25 cells

        // Initialize the grid: fill with 0 (all cells dead initially)
        $grid = array_fill(0, $size, array_fill(0, $size, 0));

        // Set up a custom starting pattern at the center
        $mid = intdiv($size, 2);  // Find center index
        $grid[$mid-1][$mid] = 1;      // Alive cell (top middle)
        $grid[$mid][$mid+1] = 0;      // Dead cell (right middle)
        $grid[$mid+1][$mid-1] = 1;    // Alive cell (bottom left)
        $grid[$mid+1][$mid] = 1;      // Alive cell (bottom middle)
        $grid[$mid+1][$mid+1] = 1;    // Alive cell (bottom right)

        // Function to count how many alive neighbors a cell has
        function countNeighbors($grid, $x, $y, $size) {
            $count = 0;
            for ($i = -1; $i <= 1; $i++) {        // Loop over rows around the cell
                for ($j = -1; $j <= 1; $j++) {    // Loop over columns around the cell
                    if ($i == 0 && $j == 0) continue; // Skip counting the cell itself
                    $nx = $x + $i;  // Neighbor row index
                    $ny = $y + $j;  // Neighbor column index
                    // Check if neighbor is inside grid boundaries
                    if ($nx >= 0 && $nx < $size && $ny >= 0 && $ny < $size) {
                        $count += $grid[$nx][$ny];  // Add neighbor's alive state (1 or 0)
                    }
                }
            }
            return $count; // Total alive neighbors
        }

        // Display the original grid
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                // If cell is alive → show black box; else → show white box
                echo $grid[$i][$j] ? "<div class='alive'></div>" : "<div class='dead'></div>";
            }
        }
        ?>
        </div>
    </div>

    <!-- SECOND GRID: Next Generation -->
    <div>
        <h3>Next Generation</h3>
        <div class="grid">
        <?php
        $nextGrid = $grid;  // Create a copy of the original grid to calculate next generation

        // Apply Game of Life rules to each cell
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $neighbors = countNeighbors($grid, $i, $j, $size); // Count alive neighbors

                if ($grid[$i][$j] == 1) {  // If the cell is currently alive
                    // Survival: stays alive if 2 or 3 neighbors, else dies
                    $nextGrid[$i][$j] = ($neighbors == 2 || $neighbors == 3) ? 1 : 0;
                } else {  // If the cell is currently dead
                    // Reproduction: becomes alive if exactly 3 neighbors
                    $nextGrid[$i][$j] = ($neighbors == 3) ? 1 : 0;
                }
            }
        }

        // Display the next generation grid
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                // Print alive or dead box for next generation
                echo $nextGrid[$i][$j] ? "<div class='alive'></div>" : "<div class='dead'></div>";
            }
        }
        ?>
        </div>
    </div>

</div>
<footer>
        Created by Alok | Game of Life PHP Assignment
</footer>
</body>
</html>
