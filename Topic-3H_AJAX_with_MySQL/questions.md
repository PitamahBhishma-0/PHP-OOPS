# Topic 3H  Lab Questions

---

## Question 3H-Q1: Live Student Search with AJAX + MySQL

**Scenario:** A college wants a live search feature where typing a student's name instantly shows matching records from the database — without pressing any search button or reloading the page.

### Task

Create **two files** that work together:

#### Database Setup

Before starting, create a MySQL database and table using the following SQL:

```sql
CREATE DATABASE IF NOT EXISTS tu_lab_db;
USE tu_lab_db;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    dept VARCHAR(50) NOT NULL,
    semester VARCHAR(20) NOT NULL,
    score DECIMAL(5,2) NOT NULL
);

-- Insert sample data (use YOUR personalized values)
INSERT INTO students (name, dept, semester, score) VALUES
('StudentA', 'BCA', '4th Sem', 85.5),
('StudentB', 'BIT', '4th Sem', 72.0),
('StudentC', 'BCA', '2nd Sem', 91.0),
('Ram Prasad', 'BCA', '4th Sem', 88.0),
('Sita Devi', 'BIT', '6th Sem', 79.5);
```

#### File 1: `3H-q1-search.php` (PHP AJAX Endpoint)

- Set `Content-Type: application/json`
- Connect to `tu_lab_db` using `mysqli_connect("localhost", "root", "", "tu_lab_db")`
- If connection fails, return `{"error": "Database connection failed."}` and exit
- Read `$_GET['q']` (the search term), default to empty string
- If search term length < 1, return `[]` (empty JSON array)
- Use a **prepared statement** to prevent SQL injection:
  ```sql
  SELECT id, name, dept, semester, score FROM students WHERE name LIKE ? LIMIT 10
  ```
- Bind the parameter with: `"%" . $searchTerm . "%"`
- Execute, fetch all results with `mysqli_fetch_all($result, MYSQLI_ASSOC)`
- Echo the result as JSON
- Close statement and connection

#### File 2: `3H-q1-search.html` (Client Page)

Create an HTML page with:
- An `<input type="text" id="searchBox">` with placeholder text from the twist below
- An `<ul id="resultsList">` to display search results
- Style it minimally (CSS in `<style>` tag or inline)

**JavaScript (use `fetch()` with `onkeyup`):**
- Create a `liveSearch()` function
- On every keyup event, read the search box value
- Send a GET request to `3H-q1-search.php?q=VALUE`
- Clear `#resultsList` before adding new results
- If no results, show `<li>No matches found.</li>`
- Loop through the results and for each student, create:
  `<li>ID: s.id — s.name (s.dept, s.semester) — Score: s.score</li>`

### The Personalized Twist

- The **search box placeholder** must be: `"Search student name (min D chars)..."`  
  (e.g., D=2 → "Search student name (min 2 chars)...")
- The **page title** must be: `"3H-Q1 Search — StudentName"` (use your actual name)
- In the JavaScript, print the **number of results** found:  
  `"Found X result(s)"` above the list in a `<p id="resultCount">`
- After inserting the sample data, also insert **one more row** with:
  - name = `"Student" . A . B` (e.g., A=8, B=5 → "Student85")
  - dept = `"BCA"` if A is even, else `"BIT"`
  - semester = `(A % 4 + 2) . "th Sem"` (e.g., A=8 → 8%4+2=2 → "2nd Sem")
  - score = `60 + D * 5` (e.g., D=2 → 70.0)

### What to Submit

- `3H-q1-search.php`  the PHP AJAX endpoint with prepared statement
- `3H-q1-search.html`  the HTML + JavaScript client with live search

**Expected behaviour (typing "Ram" in the search box):**

```
Request: GET 3H-q1-search.php?q=Ram
Response: [{"id":4,"name":"Ram Prasad","dept":"BCA","semester":"4th Sem","score":"88.00"}]
Page displays:
  Found 1 result(s)
  • ID: 4 — Ram Prasad (BCA, 4th Sem) — Score: 88.00
```

---

## Question 3H-Q2: AJAX Student Registration Form (INSERT)

**Scenario:** A registration form allows new students to be added to the database via AJAX. The form submits without reloading the page, and the user gets instant feedback.

### Task

Create **two files** that work together:

Use the same `tu_lab_db` database and `students` table from Q1.

#### File 1: `3H-q2-insert.php` (PHP AJAX Endpoint)

- Set `Content-Type: application/json`
- Connect to `tu_lab_db`
- Check that request method is **POST**. If not, return: `{"error": "Method Not Allowed"}` and set HTTP 405
- Read JSON body using `file_get_contents("php://input")` and decode
- Extract `name`, `dept`, `semester`, and `score` (default to empty/0 if missing)
- Validate:
  - If `name` is empty, return: `{"error": "Name is required."}`
  - If `dept` is empty, return: `{"error": "Department is required."}`
  - If `semester` is empty, return: `{"error": "Semester is required."}`
  - If `score` is not numeric or `score < 0` or `score > 100`, return: `{"error": "Score must be between 0 and 100."}`
- On validation pass, use a **prepared statement** to INSERT:
  ```sql
  INSERT INTO students (name, dept, semester, score) VALUES (?, ?, ?, ?)
  ```
- On success: return `{"status": "success", "message": "Student NAME added successfully!", "new_id": ID}`
- On failure: return `{"status": "error", "message": "Database error: ERROR"}`
- Close statement and connection

#### File 2: `3H-q2-form.html` (Client Page)

Create an HTML form with:
- Input fields: `name`, `dept`, `semester`, `score` with appropriate `id` attributes
- A submit button `id="registerBtn"`
- A `<div id="message">` for feedback
- A `<div id="error">` for error messages (red text)

**JavaScript:**
- On button click, prevent default form submission
- Read all field values
- Build a JSON body object
- Send a **POST** request with `Content-Type: application/json`
- On success: display the `message` from response in green in `#message`, clear the form
- On error: display the `error` in red in `#error`
- Use try/catch for network errors

Also add a **"View All Students"** button (`id="viewBtn"`) that:
- Sends a GET request to `3H-q1-search.php?q=` (empty search = all students)
- Displays the total count and lists all students below the form in a `<div id="allStudents">`

### The Personalized Twist

- The **form page title** must be: `"3H-Q2 Registration — StudentName"`
- The **submit button** text must be: `"Register " . A . "." . B . "." . C . "." . D`
  (e.g., A=8, B=5, C=15, D=2 → "Register 8.5.15.2")
- Test the form by inserting a student with:
  - name = `"RegStudent" . A` (e.g., "RegStudent8")
  - dept = if A > B, use `"BCA"`, else use `"BIT"`
  - semester = `(C % 4 + 1) . "st Sem"`  (adjust suffix: 1→st, 2→nd, 3→rd, 4→th)
  - score = `65 + D * 5` (e.g., D=2 → 75.0)

### What to Submit

- `3H-q2-insert.php`  the PHP JSON POST endpoint with prepared INSERT statement
- `3H-q2-form.html`  the HTML + JavaScript registration form

**Expected behaviour (submitting with the personalized test data):**

```
Request: POST 3H-q2-insert.php
Body: {"name":"RegStudent8","dept":"BCA","semester":"4th Sem","score":75.0}
Response: {"status":"success","message":"Student RegStudent8 added successfully!","new_id":6}
Page displays (green): "✓ Student RegStudent8 added successfully! (ID: 6)"
```
