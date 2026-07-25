# topic_demo — Worked Example

This folder shows you **exactly** how to take a question from `questions.md`, plug in your personal `A, B, C, D` values, and produce the final PHP file.

We'll use a mini-question similar to what you'll see in the real topics.

---

## Step 1: Know your A, B, C, D

From the main `README.md`:

> Take the **last 4 digits** of your registration number, then map them **right to left**.

| If Reg No = | Last 4 digits | A | B | C | D |
|-------------|---------------|----|----|----|----|
| BCA23058 | 3058 | 8 | 5 | 0 | 3 |
| 42107 | 2107 | 7 | 0 | 1 | 2 |

---

## Step 2: Read a question

Here's a mini-question (simplified, just for demo):

> **Question:** Create a class `Calculator` with:
> - `add()` returns `A + B + C + D`
> - `multiply()` returns `A * B`
> - `custom()` returns `(C * 100) + 5000`
> - `nameTag()` returns `"Student" . A . B`
>
> **Personalized Twist:** Use YOUR values.

---

## Step 3: Write the code

**`demo-calculator.php`** (the file you'd submit):

```php
<?php
/**
 * Demo Calculator — showing how A, B, C, D work
 * Name: Your Name
 * Reg No: BCA23058
 * Date: 2026-07-25
 *
 * A = 8, B = 5, C = 0, D = 3
 *
 * Calculations:
 *   add()    = A + B + C + D = 8 + 5 + 0 + 3 = 16
 *   multiply() = A * B = 8 * 5 = 40
 *   custom() = (C * 100) + 5000 = (0 * 100) + 5000 = 5000
 *   nameTag() = "Student" . 8 . 5 = "Student85"
 */

define('A', 8);
define('B', 5);
define('C', 0);
define('D', 3);

class Calculator {
    public function add(): int {
        return A + B + C + D;
    }

    public function multiply(): int {
        return A * B;
    }

    public function custom(): int {
        return (C * 100) + 5000;
    }

    public function nameTag(): string {
        return "Student" . A . B;
    }
}

$calc = new Calculator();
echo "add()         = " . $calc->add() . PHP_EOL;
echo "multiply()    = " . $calc->multiply() . PHP_EOL;
echo "custom()      = " . $calc->custom() . PHP_EOL;
echo "nameTag()     = " . $calc->nameTag() . PHP_EOL;

// Expected output:
// add()         = 16
// multiply()    = 40
// custom()      = 5000
// nameTag()     = Student85
```

---

## Step 4: Run it

```bash
php demo-calculator.php
```

Output:
```
add()         = 16
multiply()    = 40
custom()      = 5000
nameTag()     = Student85
```

---

## The Pattern

Every question in this lab follows the same pattern:

1. **Read the Scenario** — understand the real-world context
2. **Check the Task** — look at the properties table and methods list
3. **Apply the Personalized Twist** — replace `A, B, C, D` with YOUR values
4. **Follow What to Submit** — create the specified file(s) and match the expected output format
5. **Add the comment block** — name, reg no, date, A/B/C/D values, and show your math

That's it. Good luck! 🚀
