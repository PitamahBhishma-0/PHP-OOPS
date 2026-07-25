# Topic 2B  Lab Questions

---

## Question 2B-Q1: Student Grading System with Loops

**Scenario:** A school needs a PHP script that takes an array of student marks, grades each one using conditional logic, and displays the results using loops.

### Task

Create a PHP script `2B-q1.php` that:

1. Create an **indexed array** `$marks` with exactly **4 values**:
   - Element 0: `A * 10 + 5` (e.g., A=8 → 85)
   - Element 1: `B * 10 + A` (e.g., B=5 → 58)
   - Element 2: `C * 10 + B` (e.g., C=0 → 5)
   - Element 3: `D * 15 + A` (e.g., D=3 → 53)

2. Define a **function** `getGrade(int $mark): string` that returns:
   - `"Distinction"` if `$mark >= 80`
   - `"First Division"` if `$mark >= 60`
   - `"Second Division"` if `$mark >= 40`
   - `"Fail"` otherwise

3. Use a **`foreach` loop** to iterate through `$marks` and for each mark display:
   ```
   Mark: 85 -> Grade: Distinction
   ```

4. Use a **`for` loop** to calculate and display the **average mark**:
   - Sum all marks inside the loop
   - After the loop, display: `"Average mark: X"`

5. Use an **`if/elseif/else`** to display the overall class result:
   - If average >= 60: `"Overall Result: Pass"`
   - Else: `"Overall Result: Fail"`

### The Personalized Twist

- All 4 array values use YOUR `A, B, C, D`
- The grading thresholds (80, 60, 40) are fixed

### What to Submit (`2B-q1.php`)

A single PHP file with the grading logic.

**Expected output format (example with A=8, B=5, C=0, D=3):**

```
Mark: 85 -> Grade: Distinction
Mark: 58 -> Grade: Second Division
Mark: 5 -> Grade: Fail
Mark: 53 -> Grade: Second Division
Average mark: 50.25
Overall Result: Fail
```

---

## Question 2B-Q2: Multiplication Table Generator

**Scenario:** A tutor wants a PHP script that generates a customized multiplication table using nested loops and an associative array of multipliers.

### Task

Create a PHP script `2B-q2.php` that:

1. Create an **associative array** `$multipliers` with:
   - Key `"A"` => value = `A + 1` (e.g., A=8 → 9)
   - Key `"B"` => value = `B + 2` (e.g., B=5 → 7)
   - Key `"C"` => value = `C + 3` (e.g., C=0 → 3)
   - Key `"D"` => value = `D + 4` (e.g., D=3 → 7)

2. Use a **`foreach`** loop to iterate through `$multipliers` and for each:
   - Display the heading: `"Table for KEY (multiplier: VALUE):"`
   - Use a **nested `for`** loop (1 to 10) to print the multiplication table
   - Print a blank line after each table

3. Define a **function** `isEven(int $num): bool` that returns `true` if the number is even
4. After each table, use a **`switch`** statement on the multiplier value to print:
   - If value % 3 == 0: `"(multiple of 3)"`
   - If value % 3 == 1: `"(remainder 1)"`
   - If value % 3 == 2: `"(remainder 2)"`

### The Personalized Twist

- All multiplier values use YOUR `A, B, C, D`

### What to Submit (`2B-q2.php`)

A single PHP file that generates the multiplication tables.

**Expected output format (example with A=8, B=5, C=0, D=3) — partial:**

```
Table for A (multiplier: 9):
9 x 1 = 9
9 x 2 = 18
...
9 x 10 = 90
(remainder 2)

Table for B (multiplier: 7):
7 x 1 = 7
...
```
