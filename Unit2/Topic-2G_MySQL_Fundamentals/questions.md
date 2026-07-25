# Topic 2G  Lab Questions

---

## Question 2G-Q1: Database Explorer

**Scenario:** A developer needs a PHP tool that connects to MySQL and explores what databases and tables exist on the server.

### Task

Create a PHP file `2G-q1.php` that:

1. **Connect** to MySQL using `mysqli_connect("localhost", "root", "", "lab_mysql")`
2. If connection fails, die with: `"Connection failed: " . mysqli_connect_error()`
3. **List all databases** using `SHOW DATABASES`:
   - Use `mysqli_query()` to run the query
   - Use a `while` loop with `mysqli_fetch_row()` to fetch each row
   - Display in an unordered HTML list: `<li>DATABASE_NAME</li>`
   - Skip databases named `"information_schema"`, `"performance_schema"`, `"mysql"`, `"sys"` using `continue`
4. **List tables** in `lab_mysql` using `SHOW TABLES`:
   - Display as a numbered HTML list
5. **Describe** the `students` table using `DESCRIBE students`:
   - Display in an HTML `<table border="1">` with columns: Field, Type, Null, Key, Default, Extra
   - Use `mysqli_fetch_assoc()` to fetch each row

### The Personalized Twist

- The page `<h1>` title must be: `"2G-Q1 Explorer — Student" . A` (e.g., "2G-Q1 Explorer — Student8")
- If `A` is even, highlight your database row with yellow background. If odd, use lightblue.
- Use your `B` value for the table border: `border="B % 3 + 1"` (e.g., B=5 → 5%3+1 = 3)

### What to Submit (`2G-q1.php`)

A single PHP file that explores the MySQL server.

**Expected output format:**

```
2G-Q1 Explorer — Student8

Databases:
  • information_schema (skipped)
  • lab_mysql
  ... (other databases)

Tables in lab_mysql:
  1. students
  2. grades
  3. scholarships

Structure of 'students':
| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id    | int  | NO   | PRI | NULL    | auto_increment |
| name  | varchar(50) | NO |     | NULL    | |
| age   | int  | NO   |     | NULL    | |
| major | varchar(30) | YES |    | NULL    | |
```

---

## Question 2G-Q2: Database Connection Checker

**Scenario:** A PHP diagnostic tool that tests database connectivity and displays connection status and server info.

### Task

Create a PHP file `2G-q2.php` that:

1. Attempt to connect to MySQL with **host** = `"localhost"`, **user** = `"root"`, **pass** = `""`, **db** = `"lab_mysql"`
2. Display a connection status card:
   ```
   ================================
        Database Connection Test
   ================================
   Status: CONNECTED
   Server: SERVER_INFO
   Protocol: PROTOCOL_VERSION
   Character Set: CHARSET
   Database: lab_mysql
   ================================
   ```
   Use these mysqli functions:
   - `mysqli_get_server_info($conn)` — server version
   - `mysqli_get_proto_info($conn)` — protocol version
   - `mysqli_character_set_name($conn)` — current charset

3. If connection fails, display:
   ```
   ================================
        Database Connection Test
   ================================
   Status: FAILED
   Error: CONNECTION_ERROR_MESSAGE
   Error No: ERROR_NUMBER
   ================================
   ```

4. Test a simple query `SELECT 1 AS test` and display:
   - `"Test query: " . $row['test']` (should output "Test query: 1")

5. Close the connection with `mysqli_close($conn)`

### The Personalized Twist

- The page `<title>` must be: `"2G-Q2 — " . A . "_" . B . "_" . C` (e.g., "2G-Q2 — 8_5_0")
- The `<h1>` must be: `"Student" . D . "'s Connection Test"` (e.g., "Student3's Connection Test")
- Use a **constant** `DB_NAME = "lab_mysql_" . A` for the database name (e.g., "lab_mysql_8").  
  This will fail since the database is "lab_mysql" — catch the failure and show it, then reconnect with the correct name in a second attempt.

### What to Submit (`2G-q2.php`)

A single PHP file that tests connectivity.

**Expected behaviour:**

```
First connection with "lab_mysql_8" -> FAILED
Second connection with "lab_mysql" -> CONNECTED
Server info displayed
Test query: 1
```
