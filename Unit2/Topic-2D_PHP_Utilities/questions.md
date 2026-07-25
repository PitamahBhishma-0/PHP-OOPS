# Topic 2D  Lab Questions

---

## Question 2D-Q1: Date & Time Dashboard with Include

**Scenario:** A dashboard page needs to display the current date and time in multiple formats. The site name and footer should be managed through a reusable config file.

### Task

Create **three files** that work together:

#### File 1: `2D-q1-config.php` (Configuration)

Define constants:
- `SITE_NAME` = `"Lab 2D-Q1 — Student" . A` (e.g., "Lab 2D-Q1 — Student8")
- `TIMEZONE` = `"Asia/Kathmandu"`

#### File 2: `2D-q1-footer.php` (Footer)

Create a simple footer that echoes:
```
<hr><p>&copy; 2026 SITE_NAME. All rights reserved.</p>
```
(Replace `SITE_NAME` with the actual constant value)

#### File 3: `2D-q1.php` (Main Script)

1. `require_once` the config file
2. Set timezone using the constant: `date_default_timezone_set(TIMEZONE)`
3. Display date/time in these formats using `date()`:
   - Full date: `"Date: d-m-Y"` (e.g., "Date: 25-07-2026")
   - Time: `"Time: H:i:s"` (e.g., "Time: 14:30:00")
   - Day name: `"Day: l"` (e.g., "Day: Saturday")
   - Custom format: `"Custom: " . date("l, jS F Y — h:i A")`
4. Calculate and display `"Days remaining in " . date("Y") . ": " . (365 - (int)date("z"))`
5. `include_once` the footer file
6. Use a `logMessage()` function that appends to `2D-q1-log.txt` with timestamp:  
   `"[YYYY-MM-DD HH:MM:SS] Dashboard loaded"`

### The Personalized Twist

- `SITE_NAME` uses `A`
- The log file name must include `A`: `"2D-q1-" . A . "-log.txt"`
- Test the include chain works correctly

### What to Submit

- `2D-q1-config.php` — configuration file
- `2D-q1-footer.php` — footer template
- `2D-q1.php` — main dashboard script

**Expected output format (example with A=8):**

```
=== Lab 2D-Q1 — Student8 ===
Date: 25-07-2026
Time: 14:30:00
Day: Saturday
Custom: Saturday, 25th July 2026 — 02:30 PM
Days remaining in 2026: 159
<hr>
<p>&copy; 2026 Lab 2D-Q1 — Student8. All rights reserved.</p>
```

---

## Question 2D-Q2: Multi-Page Site with Includes

**Scenario:** A small site needs a header, navigation, and footer shared across multiple pages using include/require.

### Task

Create **four files** that work together:

#### File 1: `2D-q2-config.php`

- `define('SITE_NAME', 'MyLab-' . A . B)` (e.g., A=8, B=5 → "MyLab-85")
- `define('AUTHOR', 'Student' . C)` (e.g., C=0 → "Student0")

#### File 2: `2D-q2-header.php`

- Use `<h1>` with `SITE_NAME`
- Use a `require_once` for config
- Navigation links:
  - `"Home (Page " . A . ")"` → `2D-q2-home.php`
  - `"About (Page " . B . ")"` → `2D-q2-about.php`

#### File 3: `2D-q2-home.php`

- `require_once` the config
- `include_once` the header
- Display: `<h2>Welcome to SITE_NAME</h2><p>Author: AUTHOR</p>`
- Display current year using `date("Y")`
- `require_once` a footer (create `2D-q2-footer.php` with a copyright line)

#### File 4: `2D-q2-about.php`

- Same include structure as home
- Display: `<h2>About SITE_NAME</h2><p>Created by AUTHOR for CACS252.</p>`
- Display the current date using `date("d-m-Y")`

### The Personalized Twist

- `SITE_NAME` uses `A` and `B`
- `AUTHOR` uses `C`

### What to Submit

- `2D-q2-config.php`, `2D-q2-header.php`, `2D-q2-footer.php`, `2D-q2-home.php`, `2D-q2-about.php`

**Expected behaviour (visiting home page with A=8, B=5, C=0):**

```
MyLab-85 (as h1)
Navigation: Home (Page 8) | About (Page 5)
Welcome to MyLab-85
Author: Student0
Year: 2026
<footer>&copy; 2026 MyLab-85</footer>
```
