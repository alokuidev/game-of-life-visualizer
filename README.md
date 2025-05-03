# Game of Life – PHP Implementation

This project shows **Game of Life** with:
****An original grid
****The next generation grid (side by side comparison)

## 🔥 How to run:

1. Place this folder inside `C:\xampp\htdocs\gameoflife`
2. Start Apache from XAMPP
3. Open browser at: [http://localhost/gameoflife/](http://localhost/gameoflife/index.php)

You will see both grids side by side.

## --> Files:

- `index.php` → main PHP file
- `styles.css` → CSS styling
- `README.md` → this file

## Pattern:

Currently it displays a custom starting pattern in the middle of a 25x25 grid.

Feel free to change the pattern inside `index.php` by modifying these lines:

```php
$grid[$mid-1][$mid] = 1;
$grid[$mid][$mid+1] = 0;
$grid[$mid+1][$mid-1] = 1;
$grid[$mid+1][$mid] = 1;
$grid[$mid+1][$mid+1] = 1;
