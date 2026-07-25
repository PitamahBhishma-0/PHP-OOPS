# Topic 2J  Lab Questions

---

## Question 2J-Q1: Subquery Explorer

**Scenario:** A data analyst needs to find students who are above average age, and students who belong to specific majors using subqueries.

### Task

Create a PHP file `2J-q1.php` that:

#### Setup: Seed Data
First, check if `students` table has data. If empty, insert these records:
```sql
INSERT INTO students (name, age, major) VALUES
('Ram', A + 18, 'Computer Science'),
('Sita', B + 19, 'Information Systems'),
('Hari', C + 20, 'Computer Science'),
('Gita', D + 21, 'Data Science'),
('Nabin', A + B + 18, 'Computer Science');
```

#### Queries to Run

1. **Scalar Subquery — Students above average age**
   ```sql
   SELECT name, age, major FROM students
   WHERE age > (SELECT AVG(age) FROM students)
   ```
   Display as:
   ```
   === Students Above Average Age ===
   Average age of all students: X
   NAME — AGE (MAJOR)
   ...

   ```

2. **Subquery with IN — Students in specific majors**
   First create a table of `popular_majors`:
   ```sql
   CREATE TABLE IF NOT EXISTS popular_majors (
       major_name VARCHAR(50) PRIMARY KEY
   );
   INSERT IGNORE INTO popular_majors VALUES
   ('Computer Science'), ('Data Science');
   ```
   Then query:
   ```sql
   SELECT name, major FROM students
   WHERE major IN (SELECT major_name FROM popular_majors)
   ```
   Display as:
   ```
   === Students in Popular Majors ===
   NAME — MAJOR
   ...

   ```

3. **NOT EXISTS — Students without scholarships**
   ```sql
   SELECT name FROM students s
   WHERE NOT EXISTS (
       SELECT 1 FROM scholarships sch WHERE sch.student_id = s.id
   )
   ```
   Display as:
   ```
   === Students Without Scholarships ===
   NAME
   ...

   ```

4. **EXISTS — Students who have scholarships**
   Insert one scholarship record first:
   ```sql
   INSERT INTO scholarships (student_id, amount)
   VALUES (1, 5000 + A * 1000)
   ```
   Then run the EXISTS query and display results.

### The Personalized Twist

- Seed data ages use YOUR `A, B, C, D`
- Scholarship amount uses `A`
- The page title must be: `"2J-Q1 by " . A . "." . B`

### What to Submit (`2J-q1.php`)

A single PHP file that shows results of 4 subquery types.

**Expected output (example with A=8, B=5, C=0, D=3):**

```
=== Students Above Average Age ===
Average age of all students: 23.4
Nabin — 31 (Computer Science)
...

=== Students in Popular Majors ===
Ram — Computer Science
Hari — Computer Science
Gita — Data Science
Nabin — Computer Science

=== Students Without Scholarships ===
Sita
Hari
Gita
Nabin

=== Students With Scholarships ===
Ram — Amount: Rs. 13000
```

---

## Question 2J-Q2: Subquery Comparison Report

**Scenario:** A developer needs to compare the results of `IN` vs `EXISTS` and understand when to use each approach.

### Task

Create a PHP file `2J-q2.php` that:

#### Setup
Ensure the `scholarships` table has at least 3 records:
```sql
INSERT IGNORE INTO scholarships (student_id, amount) VALUES
(1, 10000 + A * 100),
(2, 8000 + B * 100),
(3, 12000 + C * 100);
```

#### Part 1: IN Subquery
Find students whose ID appears in the `scholarships` table:
```sql
SELECT s.id, s.name, s.major
FROM students s
WHERE s.id IN (SELECT student_id FROM scholarships)
```
Display in table format:
```
=== Students WITH Scholarships (using IN) ===
| ID | Name | Major |
```

#### Part 2: NOT IN Subquery
Find students whose ID does NOT appear in scholarships:
```sql
SELECT id, name FROM students
WHERE id NOT IN (SELECT student_id FROM scholarships)
```

#### Part 3: EXISTS vs IN Comparison
Run the same query two ways and display the results:
- Query A (IN): `SELECT * FROM students WHERE id IN (SELECT student_id FROM scholarships WHERE amount > 5000)`
- Query B (EXISTS): `SELECT * FROM students s WHERE EXISTS (SELECT 1 FROM scholarships sch WHERE sch.student_id = s.id AND sch.amount > 5000)`
- Display both results labeled. If they match, print: `"✓ Both queries returned the same X record(s)."`
- If they differ, print: `"✗ Results differ! IN returned X, EXISTS returned Y."`

#### Part 4: Scalar Subquery in SELECT
Display each student with their scholarship amount (or NULL):
```sql
SELECT s.name,
      (SELECT amount FROM scholarships sch WHERE sch.student_id = s.id) AS scholarship_amount
FROM students s
```

### The Personalized Twist

- Scholarship amounts use `A, B, C`
- The amount threshold in Part 3 = `5000 + D * 500`
- Page title: `"2J-Q2: Student" . A . " vs Student" . B`

### What to Submit (`2J-q2.php`)

A single PHP file comparing IN vs EXISTS subqueries.

**Expected output (example with A=8, B=5, C=0, D=3):**

```
=== Students WITH Scholarships (using IN) ===
| 1 | Ram | Computer Science |
| 2 | Sita | Information Systems |
| 3 | Hari | Computer Science |

✓ Both queries returned the same 3 record(s).

=== Scholarship Amounts ===
Ram: Rs. 10800
Sita: Rs. 8500
Hari: Rs. 12000
Nabin: NULL
```
