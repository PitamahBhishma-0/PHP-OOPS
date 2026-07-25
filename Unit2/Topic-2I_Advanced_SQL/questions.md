# Topic 2I  Lab Questions

---

## Question 2I-Q1: Student Statistics Dashboard

**Scenario:** A department head needs a statistics dashboard that shows aggregate data about students — total count, average age, oldest/youngest, and breakdown by major.

### Task

Create a PHP file `2I-q1.php` that:

1. Connect to `lab_mysql`
2. First, insert **5 sample students** if the table is empty (check with `SELECT COUNT(*)` first):
   - Use these INSERT statements as a fallback:
     ```sql
     INSERT INTO students (name, age, major) VALUES
     ('Ram', 20, 'CS'), ('Sita', 22, 'CS'),
     ('Hari', 25, 'IT'), ('Gita', 19, 'IT'),
     ('Nabin', D + 20, 'CS')
     ```

3. Run and display the following **aggregate queries** in a structured dashboard:

   ```
   =================================
       Student Statistics Dashboard
   =================================

   1. Total Students: X

   2. Age Statistics:
      Average Age: X
      Youngest: X (NAME)
      Oldest: X (NAME)

   3. Students per Major:
      CS: X student(s) — Average Age: Y
      IT: X student(s) — Average Age: Y

   4. Majors with more than X student(s):
      (use HAVING with threshold = A % 2 + 1)

   5. All students ordered by age (descending):
      NAME — AGE (MAJOR)
      ...
   =================================
   ```

   Use these SQL queries:
   - `SELECT COUNT(*) AS total FROM students`
   - `SELECT AVG(age) AS avg_age FROM students`
   - `SELECT MIN(age) AS min_age FROM students` (also fetch the name separately)
   - `SELECT MAX(age) AS max_age FROM students`
   - `SELECT major, COUNT(*) AS cnt, AVG(age) AS avg_age FROM students GROUP BY major`
   - `SELECT major, COUNT(*) AS cnt FROM students GROUP BY major HAVING cnt > THRESHOLD`
   - `SELECT name, age, major FROM students ORDER BY age DESC`

### The Personalized Twist

- The HAVING threshold = `A % 2 + 1` (if A=8 → 1, if A=7 → 2)
- The dashboard title must be: `"Student" . A . "'s Dashboard"`
- The `Nabin` student's age = `D + 20`

### What to Submit (`2I-q1.php`)

A single PHP file displaying the statistics dashboard.

**Expected output format (partial example with A=8, B=5, C=0, D=3):**

```
=================================
    Student8's Dashboard
=================================

1. Total Students: 5

2. Age Statistics:
   Average Age: 21.4
   Youngest: 19 (Gita)
   Oldest: 25 (Hari)

3. Students per Major:
   CS: 3 student(s) — Average Age: 20.33
   IT: 2 student(s) — Average Age: 23.5

4. Majors with more than 1 student(s):
   CS (3), IT (2)

5. All students ordered by age (descending):
   Hari — 25 (IT)
   Nabin — 23 (CS)
   Sita — 22 (CS)
   Ram — 20 (CS)
   Gita — 19 (IT)
```

---

## Question 2I-Q2: Grade Summary Report

**Scenario:** A professor wants a grade summary report showing how many students received each grade letter, the average score per grade, and the top performer.

### Task

Create a PHP file `2I-q2.php` that:

Assume we have a `results` table (create it if not exists):
```sql
CREATE TABLE IF NOT EXISTS results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(50),
    subject VARCHAR(50),
    marks DECIMAL(5,2)
);
```

1. Connect to `lab_mysql`, create the `results` table if not exists
2. Insert **6 sample records**:
   - Use your `A, B, C, D` values in the marks:

   | student_name | subject | marks |
   |-------------|---------|-------|
   | "StudentA" | "PHP" | 75 + A |
   | "StudentB" | "PHP" | 60 + B |
   | "StudentC" | "MySQL" | 80 + C |
   | "StudentD" | "MySQL" | 55 + D |
   | "StudentA" | "JS" | 70 + A |
   | "StudentB" | "JS" | 65 + B |

3. Run and display:
   ```
   ================================
        Grade Summary Report
   ================================

   Per-Subject Stats:
   PHP — Count: 2, Average: X, Max: Y
   MySQL — Count: 2, Average: X, Max: Y
   JS — Count: 2, Average: X, Max: Y

   Overall:
   Total Records: 6
   Overall Average: X

   Top Scorer: NAME — MARKS (SUBJECT)

   Grade Distribution:
   A (>=90): 0
   B (>=75): X
   C (>=60): X
   D (>=40): X
   F (<40): 0
   ================================
   ```
   (Use `SUM(CASE WHEN ...)` or PHP logic for grade distribution)

4. Use `ORDER BY marks DESC LIMIT 1` to find the top scorer

### The Personalized Twist

- All marks use YOUR `A, B, C, D`
- The "Top Scorer" line must highlight using your `D` value (if D even, uppercase; if D odd, lowercase)

### What to Submit (`2I-q2.php`)

A single PHP file with grade summary report.

**Expected output (example with A=8, B=5, C=0, D=3):**

```
================================
     Grade Summary Report
================================

Per-Subject Stats:
PHP — Count: 2, Average: 74, Max: 83
MySQL — Count: 2, Average: 69, Max: 80
JS — Count: 2, Average: 74, Max: 78

Overall:
Total Records: 6
Overall Average: 72.33

Top Scorer: Student8 — 83 (PHP)
```
