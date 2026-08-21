# Lab: Unit 3 — Advanced Server Side Scripting

**Course:** CACS252 | **BCA 4th Semester**  
**Language:** PHP, JavaScript, HTML, CSS  
**Total Topics:** 11 (3A–3J, 3M)

---

## How This Lab Works

Each topic folder contains a `questions.md` with 2 lab questions.
Every question uses **personalized values** (`A, B, C, D`) that you derive from your registration number.

### Your A, B, C, D Values

Take the **last 4 digits** of your registration number, then map them **right to left**:

```
Example: Reg No = BCA23058
          Last 4 digits = 3058

    A = last digit          → 8
    B = second-last digit   → 5
    C = third-last digit    → 0
    D = fourth-last digit   → 3
```

```
Another example: Reg No = 42107
     Last 4 digits = 2107

    A = last digit          → 7
    B = second-last digit   → 0
    C = third-last digit    → 1
    D = fourth-last digit   → 2
```

### Using the Values in Code

At the top of your PHP file, define constants so the formulas work automatically:

```php
<?php
/**
 * Your Name
 * Reg No: BCA23058
 * Date: 2026-07-25
 */

define('A', 8);   // last digit
define('B', 5);   // second-last
define('C', 0);   // third-last
define('D', 3);   // fourth-last
```

Then whenever a question says something like `price = 9999 + (C * 100)`, PHP will compute `9999 + (0 * 100) = 9999` using your values.

> 📁 Check the **`topic_demo/`** folder for a complete worked example showing how A, B, C, D flow through a real question.

---

## Topic Index

| Topic | Directory                            | Questions                                          |
| ----- | ------------------------------------ | -------------------------------------------------- |
| 3A    | `Topic-3A_OOP_Basics/`               | Classes, Objects, Properties, Methods              |
| 3B    | `Topic-3B_Constructors_Destructors/` | `__construct()`, `__destruct()`, lifecycle         |
| 3C    | `Topic-3C_Encapsulation_Overriding/` | Visibility, Getters/Setters, Overriding            |
| 3D    | `Topic-3D_Inheritance_Polymorphism/` | `extends`, abstract, interfaces                    |
| 3E    | `Topic-3E_Static_Members/`           | Static properties/methods, `::`, constants         |
| 3F    | `Topic-3F_Exception_Handling/`       | `try`/`catch`/`throw`/`finally`, custom exceptions |
| 3G    | `Topic-3G_AJAX_Fundamentals/`        | `fetch()`, JSON endpoints, GET/POST                |
| 3H    | `Topic-3H_AJAX_with_MySQL/`          | Prepared statements, live search, AJAX INSERT      |
| 3I    | `Topic-3I_jQuery/`                   | Hide/Show/Fade/Slide, DOM manipulation, jQuery UI  |
| 3J    | `Topic-3J_Joomla_Installation/`      | CMS, Joomla installation, `configuration.php`      |
| 3M    | `Topic-3M_WordPress_Administration/` | WordPress install, themes, pages, posts, widgets   |

---

## Submission Instructions

1. Complete all questions in each topic folder
2. Include the comment block at the top of every `.php` file
3. Verify your output matches the expected format shown in the question
4. Submit the `.php` / `.html` files for each topic (screenshots for the CMS topics 3J and 3M)

---

*TU BCA 4th Semester — Scripting Language (CACS252)*
