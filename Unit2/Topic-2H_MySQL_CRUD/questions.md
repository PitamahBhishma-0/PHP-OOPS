# Topic 2H  Lab Questions

---

## Question 2H-Q1: Student CRUD Operations

**Scenario:** An admin panel needs full CRUD (Create, Read, Update, Delete) functionality for a students table using PHP and MySQL.

### Task

Create a PHP file `2H-q1.php` that performs the following operations **sequentially** (run once, see all results):

#### Step 1: Connect
- Connect to `lab_mysql` using `mysqli_connect()`. Die with error on failure.

#### Step 2: INSERT — Add 3 Students
Insert **3 records** into the `students` table:

| Name | Age | Major |
|------|-----|-------|
| `"Student" . A` | `18 + B` | `"Computer Science"` |
| `"Student" . B` | `20 + C` | `"Information Systems"` |
| `"Student" . D` | `22 + A` | if A even → `"Data Science"`, else `"Software Engineering"` |

After each insert, print:
```
✓ Inserted: NAME (ID: INSERTED_ID)
```
Use `mysqli_insert_id($conn)` to get the auto-generated ID.

#### Step 3: SELECT — Display All Students
- Run `SELECT * FROM students`
- Display in an HTML `<table border="1">` with headers: ID, Name, Age, Major
- If no rows, show: `"No students found."`

#### Step 4: UPDATE — Modify a Record
- Update the student whose `id = ` (the ID of the second inserted student)
- Set their `major` to `"Artificial Intelligence"`
- Print: `"✓ Updated " . mysqli_affected_rows($conn) . " record(s)."`

#### Step 5: DELETE — Remove a Record
- Delete the student whose `age > (25 + D)` (e.g., D=3 → age > 28)
- Print: `"✗ Deleted " . mysqli_affected_rows($conn) . " record(s)."`

#### Step 6: SELECT — Display All Students Again
- Re-run the SELECT query and display the updated table

### The Personalized Twist

- All student names and ages use YOUR `A, B, C, D`
- The major for the third student depends on whether `A` is even or odd
- The DELETE threshold uses `D`

### What to Submit (`2H-q1.php`)

A single PHP file that runs all CRUD operations sequentially.

**Expected output format (example with A=8, B=5, C=0, D=3):**

```
✓ Inserted: Student8 (ID: 1)
✓ Inserted: Student5 (ID: 2)
✓ Inserted: Student3 (ID: 3)

=== All Students ===
| ID | Name      | Age | Major                |
|----|-----------|-----|----------------------|
| 1  | Student8  | 23  | Computer Science     |
| 2  | Student5  | 20  | Information Systems  |
| 3  | Student3  | 30  | Data Science         |

✓ Updated 1 record(s).
✗ Deleted 1 record(s).

=== Updated Students ===
| ID | Name      | Age | Major                  |
|----|-----------|-----|------------------------|
| 1  | Student8  | 23  | Computer Science       |
| 2  | Student5  | 20  | Artificial Intelligence |
```

---

## Question 2H-Q2: Student Search & Filter

**Scenario:** A search tool lets users filter students by age range and major using an HTML form and PHP-MySQL queries.

### Task

Create a PHP file `2H-q2.php` that:

#### Form (displayed at top)
- Min Age: `<input type="number" name="min_age">` with placeholder = `A + 10` (e.g., 18)
- Max Age: `<input type="number" name="max_age">` with placeholder = `B + 25` (e.g., 30)
- Major: `<select name="major">` with options: All, Computer Science, Information Systems, Data Science
- Submit button: `"Search Students " . C` (e.g., "Search Students 0")

#### PHP Logic

1. Connect to `lab_mysql`
2. If form submitted (`$_GET`), build a **dynamic WHERE clause**:
   - Start with `WHERE 1=1` (always true)
   - If `min_age` is not empty, add `AND age >= min_age`
   - If `max_age` is not empty, add `AND age <= max_age`
   - If `major` is not `"All"`, add `AND major = 'SELECTED_MAJOR'`
3. Run the query: `SELECT * FROM students WHERE ... ORDER BY age ASC`
4. Display results in an HTML table
5. Show: `"Found X result(s)"` above the table
6. If no results: `"No students match your criteria."`

#### Fallback (no form submitted)
- Display ALL students in the table

### The Personalized Twist

- Placeholder values use `A` and `B`
- Submit button uses `C`
- The page `<h1>` must be: `"2H-Q2 Student Finder — " . D`

### What to Submit (`2H-q2.php`)

A single self-processing PHP file with search form.

**Expected behaviour:**

```
Without search: Shows all students
Search with min_age=20, max_age=25, Major=All:
  Found 2 result(s) showing students aged 20-25
Search with Major=Data Science:
  Shows only Data Science students
```
