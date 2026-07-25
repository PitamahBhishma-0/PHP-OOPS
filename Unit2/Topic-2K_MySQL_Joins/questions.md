# Topic 2K  Lab Questions

---

## Question 2K-Q1: Join Explorer Dashboard

**Scenario:** A school wants to see a combined view of students and their grades. The dashboard should demonstrate all three join types (INNER, LEFT, RIGHT) and explain the differences.

### Task

Create a PHP file `2K-q1.php` that:

#### Setup: Seed Data

Insert students and grades:

```sql
-- Students (skip if already exist)
INSERT IGNORE INTO students (id, name, age, major) VALUES
(1, 'Student' . A, 20, 'CS'),
(2, 'Student' . B, 22, 'IT'),
(3, 'Student' . C, 21, 'CS'),
(4, 'Student' . D, 23, 'DS');

-- Grades (some students have grades, some don't)
INSERT INTO grades (student_id, course, grade) VALUES
(1, 'PHP', 'A'), (1, 'MySQL', 'B'),
(2, 'PHP', 'B'),
(5, 'DBMS', 'C');  -- student_id 5 doesn't exist in students (orphan)
```

#### Part 1: INNER JOIN

```sql
SELECT s.id, s.name, g.course, g.grade
FROM students s
INNER JOIN grades g ON s.id = g.student_id
ORDER BY s.id
```

Display in an HTML table with caption: `"INNER JOIN — Only students WITH grades"`

#### Part 2: LEFT JOIN

```sql
SELECT s.id, s.name, g.course, g.grade
FROM students s
LEFT JOIN grades g ON s.id = g.student_id
ORDER BY s.id
```

Display with caption: `"LEFT JOIN — All students, NULL if no grade"`
Highlight rows where grade is NULL with a light red background.

#### Part 3: RIGHT JOIN

```sql
SELECT s.id, s.name, g.course, g.grade
FROM students s
RIGHT JOIN grades g ON s.id = g.student_id
```

Display with caption: `"RIGHT JOIN — All grades, NULL if student missing"`
Note which rows show NULL for student name (orphan grades).

#### Part 4: Summary

After all three tables, display a summary:
```
=== JOIN Summary ===
INNER JOIN returned: X rows (students with matching grades)
LEFT JOIN returned: Y rows (all students)
RIGHT JOIN returned: Z rows (all grades including orphans)
```

### The Personalized Twist

- Student names in seed data use YOUR `A, B, C, D`
- The page `<h1>` must be: `"2K-Q1 Joins — " . A . "v" . B`
- Use `D` for the table cell padding: `<table border="1" cellpadding="D+2">`

### What to Submit (`2K-q1.php`)

A single PHP file demonstrating all 3 join types.

**Expected output (example with A=8, B=5, C=0, D=3):**

```
2K-Q1 Joins — 8v5

INNER JOIN — Only students WITH grades
| 1 | Student8 | PHP | A |
| 1 | Student8 | MySQL | B |
| 2 | Student5 | PHP | B |

LEFT JOIN — All students, NULL if no grade
| 1 | Student8 | PHP | A |
| 1 | Student8 | MySQL | B |
| 2 | Student5 | PHP | B |
| 3 | Student0 | NULL | NULL |   (highlighted)
| 4 | Student3 | NULL | NULL |   (highlighted)

RIGHT JOIN — All grades, NULL if student missing
| 1 | Student8 | PHP | A |
| 1 | Student8 | MySQL | B |
| 2 | Student5 | PHP | B |
| NULL | NULL | DBMS | C |      (orphan grade)
```

---

## Question 2K-Q2: Multi-Table Report with Filtered Joins

**Scenario:** A reporting system needs to join students, grades, and scholarships tables to generate a comprehensive academic report with optional filters.

### Task

Create a PHP file `2K-q2.php` that:

#### Setup: Add more data

```sql
-- Add some grades for remaining students
INSERT IGNORE INTO grades (student_id, course, grade) VALUES
(3, 'Python', 'A'),
(4, 'Java', 'B');

-- Ensure scholarship records match
INSERT IGNORE INTO scholarships (student_id, amount) VALUES
(1, 10000), (2, 8000), (3, 12000);
```

#### Part 1: Three-Table Join

Write a query joining `students`, `grades`, and `scholarships`:
```sql
SELECT s.id, s.name, g.course, g.grade,
       COALESCE(sch.amount, 0) AS scholarship
FROM students s
LEFT JOIN grades g ON s.id = g.student_id
LEFT JOIN scholarships sch ON s.id = sch.student_id
ORDER BY s.id, g.course
```

Display as table with columns: ID, Name, Course, Grade, Scholarship

#### Part 2: Filtered Join (with HAVING)

Show only students who have **more than 1 grade record**:
```sql
SELECT s.id, s.name, COUNT(g.course) AS num_courses,
       GROUP_CONCAT(g.course SEPARATOR ', ') AS courses
FROM students s
INNER JOIN grades g ON s.id = g.student_id
GROUP BY s.id, s.name
HAVING num_courses > 1
```

Display with caption: `"Students with Multiple Courses"`

#### Part 3: Self-Join Style — Students with Similar Majors

Find pairs of students who share the same major (but are not the same person):
```sql
SELECT s1.name AS student1, s2.name AS student2, s1.major
FROM students s1
INNER JOIN students s2 ON s1.major = s2.major AND s1.id < s2.id
ORDER BY s1.major
```

Display with caption: `"Student Pairs Sharing a Major"`

#### Part 4: Filter

Add a filter form at the top:
- Dropdown to select join type: "All", "INNER only", "LEFT only"
- Submit button: `"Generate " . A . " Report"` (e.g., "Generate 8 Report")
- If "INNER only" is selected, only show Part 1 with INNER JOIN
- If "LEFT only", only show Part 1 with LEFT JOIN
- Default "All" shows everything

### The Personalized Twist

- Submit button uses `A`
- Page title: `"2K-Q2: Student" . A . B . C . D`
- The scholarship COALESCE fallback = `D * 1000` (e.g., D=3 → 3000)

### What to Submit (`2K-q2.php`)

A single PHP file with multi-table joins and filter form.

**Expected behaviour:**

```
All mode: Shows all 4 parts
INNER only: Shows only Part 1 with INNER JOIN
LEFT only: Shows only Part 1 with LEFT JOIN

Part 1 sample:
| 1 | Student8 | PHP | A | 10000 |
| 1 | Student8 | MySQL | B | 10000 |
| 2 | Student5 | PHP | B | 8000 |
| 3 | Student0 | Python | A | 12000 |
| 4 | Student3 | Java | B | 0 |

Part 2 sample:
Students with Multiple Courses: Student8 (PHP, MySQL)

Part 3 sample:
Student Pairs: [none if majors differ]
```
