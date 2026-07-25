# Topic 2C  Lab Questions

---

## Question 2C-Q1: User Registration Form (POST)

**Scenario:** A website needs a user registration page. The user fills in their details and submits the form. The PHP script receives the data via POST and displays a welcome message.

### Task

Create **two files** that work together:

#### File 1: `2C-q1.html` (HTML Form)

Create an HTML form with `method="POST"` and `action="2C-q1.php"` containing:

| Field | Type | Name | Notes |
|-------|------|------|-------|
| Full Name | text | `fullname` | |
| Email | email | `email` | |
| Age | number | `age` | |
| Course | select | `course` | Options: "BCA", "BIT", "BIM", "BSc.CSIT" |
| Submit | submit | `submit` | |

- The form title must be: `"Registration Form — Student" . A`
  (e.g., A=8 → "Registration Form — Student8")

#### File 2: `2C-q1.php` (PHP Processor)

1. Check if the form was submitted using `$_SERVER["REQUEST_METHOD"]`
2. If POST:
   - Read all fields using `$_POST`
   - Sanitize `$fullname` with `htmlspecialchars()`
   - Validate: if `$age < 18`, display error: `"Error: Age must be 18 or above."`
   - Otherwise display a summary card:
     ```
     === Registration Summary ===
     Name: Student8
     Email: student8@example.com
     Age: 20
     Course: BCA
     ============================
     ```
3. The **name** input's default/placeholder must use your `B` value:
   - `placeholder="Name (min " . (B+3) . " chars)"`
4. The **form action URL** must include a GET parameter: `2C-q1.php?ref=" . A . B`

### The Personalized Twist

- Form title uses `A`
- Placeholder uses `B`
- GET parameter `ref` uses `A` and `B`
- Test with: name = `"Student" . A`, age = `15 + B` (e.g., 15+5=20 — should pass validation)

### What to Submit

- `2C-q1.html` — the HTML form
- `2C-q1.php` — the PHP processor

**Expected behaviour (testing with A=8, B=5, age=20):**

```
Form submits -> displays:
=== Registration Summary ===
Name: Student8
Email: student8@example.com
Age: 20
Course: BCA
============================
```

---

## Question 2C-Q2: Profile Viewer (GET)

**Scenario:** A directory site passes user profile information through URL parameters. The PHP script reads these using `$_GET` and displays the profile.

### Task

Create a single PHP file `2C-q2.php` that:

1. Read URL parameters using `$_GET`:
   - `name` (default: `"Guest"`)
   - `age` (default: `"unknown"`)
   - `city` (default: `"Unknown"`)
   - `id` (default: `"N/A"`)

2. Sanitize all output with `htmlspecialchars()`

3. If **no parameters** are provided (i.e., the page is loaded without a query string), display a **form** (`method="GET"` action on itself) with fields for name, age, city, and a hidden field `id` with value = `"STU-" . A . B . C` (e.g., "STU-850")

4. If **parameters are provided**, display a profile card:
   ```
   ====================================
              STUDENT PROFILE
   ====================================
   ID: STU-850
   Name: Student8
   Age: 20
   City: Kathmandu
   ====================================
   ```

5. The page `<title>` must be: `"Profile Viewer — " . (A+B) . "_" . C`

### The Personalized Twist

- Hidden ID field: `"STU-" . A . B . C`
- Page title uses `A+B` and `C`
- Test by visiting: `2C-q2.php?name=StudentA&age=20&city=Kathmandu`

### What to Submit (`2C-q2.php`)

A single self-processing PHP file that shows a form when no parameters exist, and a profile when parameters exist.

**Expected behaviour:**

```
Visit: 2C-q2.php?name=Student8&age=20&city=Kathmandu&id=STU-850

Output:
====================================
           STUDENT PROFILE
====================================
ID: STU-850
Name: Student8
Age: 20
City: Kathmandu
====================================
```
