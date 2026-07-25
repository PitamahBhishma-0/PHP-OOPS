# Lab: Unit 2 — Server Side Scripting with Database Connectivity

**Course:** CACS252 | **BCA 4th Semester**
**Language:** PHP, SQL, HTML
**Total Topics:** 11 (2A–2K)

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

> 📁 Check the **`topic_demo/`** folder (in Unit 3 lab) for a complete worked example showing how A, B, C, D flow through a real question.

---

## Topic Index

| Topic | Folder | Questions |
|-------|--------|-----------|
| 2A | `Topic-2A_PHP_Fundamentals/` | Syntax, Variables, Constants, Operators |
| 2B | `Topic-2B_Control_Structures/` | if/else, Loops, Arrays, Functions |
| 2C | `Topic-2C_State_Data_Ingestion/` | Form Handling, `$_GET`, `$_POST`, `$_REQUEST` |
| 2D | `Topic-2D_PHP_Utilities/` | `date()`, `include/require`, Email |
| 2E | `Topic-2E_File_Handling/` | Read, Write, File Upload |
| 2F | `Topic-2F_Session_Cookies/` | Sessions, Cookies |
| 2G | `Topic-2G_MySQL_Fundamentals/` | Data Types, Connection, `SHOW`/`DESCRIBE` |
| 2H | `Topic-2H_MySQL_CRUD/` | INSERT, SELECT, UPDATE, DELETE |
| 2I | `Topic-2I_Advanced_SQL/` | Aggregates, GROUP BY, ORDER BY |
| 2J | `Topic-2J_Subqueries/` | Subqueries with IN / EXISTS |
| 2K | `Topic-2K_MySQL_Joins/` | INNER, LEFT, RIGHT JOIN |

---

## MySQL Database Setup (Topics 2G–2K)

Before starting Topics 2G through 2K, run the shared setup file once:

```bash
mysql -u root < db_setup.sql
```

Or paste the contents of `db_setup.sql` into phpMyAdmin SQL tab.

This creates:
- `lab_mysql` database
- `students` table (id, name, age, major)
- `grades` table (student_id, course, grade)
- `scholarships` table (student_id, amount)

All MySQL topics (2G–2K) use this same database.

---

## Submission Instructions

1. Complete all questions in each topic folder
2. Include the comment block at the top of every `.php` file
3. Verify your output matches the expected format shown in the question
4. Submit the `.php` / `.html` / `.sql` files for each topic

---

*TU BCA 4th Semester — Scripting Language (CACS252)*
