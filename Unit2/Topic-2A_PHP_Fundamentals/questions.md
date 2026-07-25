# Topic 2A  Lab Questions

---

## Question 2A-Q1: Student Profile Card

**Scenario:** A college needs a simple PHP script to display student profile cards. Each card shows the student's name, age, course, and grade status — all generated using variables, constants, and operators.

### Task

Create a PHP script `2A-q1.php` that:

1. Define a **constant** `COLLEGE_NAME` with value `"TU BCA"`
2. Create **variables** for:
   - `$studentName` = `"Student" . A` (e.g., A=8 → "Student8")
   - `$age` = `18 + B` (e.g., B=5 → 23)
   - `$course` = `"CACS252"`
   - `$score` = `A * 10 + B` (e.g., A=8, B=5 → 85)
3. Use the **ternary operator** to set `$grade`:
   - If `$score >= 80`, grade = `"Distinction"`
   - Else if `$score >= 60`, grade = `"First Division"`
   - Else grade = `"Fail"`
4. Use **string concatenation** (`.`) to build and echo a formatted profile card:
   ```
   === Student Profile Card ===
   College: TU BCA
   Name: Student8
   Age: 23
   Course: CACS252
   Score: 85
   Grade: Distinction
   ============================
   ```
5. Use a **multi-line comment** at the top explaining what the script does

### The Personalized Twist

- Use YOUR values for `A`, `B`, `C`, `D`
- `$studentName` must use `A` in the name (e.g., "Student8")
- `$age` = `18 + B`
- `$score` = `A * 10 + B`
- The grade thresholds (80, 60) remain fixed for all students

### What to Submit (`2A-q1.php`)

A single PHP file that outputs the profile card as shown above.

**Expected output format (example with A=8, B=5):**

```
=== Student Profile Card ===
College: TU BCA
Name: Student8
Age: 23
Course: CACS252
Score: 85
Grade: Distinction
============================
```

---

## Question 2A-Q2: Arithmetic Calculator

**Scenario:** A simple calculator that takes two numbers and performs multiple arithmetic operations, demonstrating PHP operators and type juggling.

### Task

Create a PHP script `2A-q2.php` that:

1. Define **two variables**:
   - `$num1` = `A + 5` (e.g., A=8 → 13)
   - `$num2` = `B * 3` (e.g., B=5 → 15)
2. Calculate and display:
   - Sum: `$num1 + $num2`
   - Difference: `$num1 - $num2`
   - Product: `$num1 * $num2`
   - Quotient: `$num1 / $num2`
   - Modulus: `$num1 % $num2`
   - Power: `$num1 ** 2` (square of first number)
3. **Type juggling demo**: Concatenate `$num1` with a string `" plus "` and `$num2` to show PHP auto-converts numbers to strings:  
   `$result = $num1 . " plus " . $num2 . " = " . ($num1 + $num2);`
4. Use a **constant** `CALC_NAME` with value `"Calculator-" . C` (e.g., C=0 → "Calculator-0")
5. Display the constant at the top

### The Personalized Twist

- `$num1` = `A + 5`
- `$num2` = `B * 3`
- `CALC_NAME` = `"Calculator-" . C`

### What to Submit (`2A-q2.php`)

A single PHP file that outputs the calculator results.

**Expected output format (example with A=8, B=5, C=0):**

```
=== Calculator-0 ===
Numbers: 13 and 15
Sum: 28
Difference: -2
Product: 195
Quotient: 0.86666666666667
Modulus: 13
13 squared: 169
Type Juggling: 13 plus 15 = 28
```
