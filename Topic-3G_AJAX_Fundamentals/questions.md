# Topic 3G  Lab Questions

> ⚠️ **Remember:** Every PHP file must have a comment block with your name, registration number, and date at the top. Use your personal `A, B, C, D` values from the main README.

---

## Question 3G-Q1: Number Facts Checker (GET Request)

**Scenario:** A website wants to display interesting facts about numbers using a custom PHP backend. The user types a number, and the page fetches a fun fact about it from the server without reloading.

### Task

Create **two files** that work together:

#### File 1: `3G-q1-api.php` (PHP Endpoint)

This is a JSON API that receives a number via GET and returns a fact about it.

- Set the correct `Content-Type` header for JSON
- Read `$_GET['num']` (default to `0` if missing)
- Use `htmlspecialchars()` to sanitize the input
- Build an **associative array** `$response` with:
  - `"number"` => the submitted number
  - `"fact"` => a fact string based on rules below
  - `"category"` => the category the number falls into
- Encode and echo `$response` as JSON

**Category and fact rules:**

| Condition | Category | Fact format |
|-----------|----------|-------------|
| `$num == 0` | "zero" | `"Zero is neither positive nor negative."` |
| `$num > 0 && $num <= 10` | "small" | `"NUM is a small positive number."` |
| `$num > 10 && $num <= 100` | "medium" | `"NUM is a medium-sized number."` |
| `$num > 100` | "large" | `"NUM is a large number!"` |
| `$num < 0` | "negative" | `"NUM is a negative number."` |
| Not numeric | "invalid" | `"That's not a valid number."` |

#### File 2: `3G-q1.html` (Client Page)

Create an HTML page with:
- An input field labeled `"Enter a number:"` with `id="numInput"`
- A button `"Get Fact"` with `id="getFactBtn"`
- A `<div id="result">` to display the response
- A `<div id="error">` to display errors (styled in red)

**JavaScript (use `fetch()`):**
- On button click, read the number from the input field
- Send a **GET** request to `3G-q1-api.php?num=VALUE`
- Parse the JSON response
- Display the fact and category in `#result` (format: `"Category: CATEGORY | Fact: FACT"`)
- If the response is not ok or an error occurs, display in `#error`

### The Personalized Twist

- The input field's `placeholder` attribute must be: `"Enter a number (hint: A*B = VALUE)"`
  (e.g., A=8, B=5 → "Enter a number (hint: A*B = 40)")
- The page `<title>` must be: `"3G-Q1 by STUDENTNAME"` (substitute your actual name)
- The button text must be: `"Fact for " . C` (e.g., C=15 → "Fact for 15")
- Test with the number `A * B + C` (e.g., 8*5+15=55)  should print category "medium"

### What to Submit

- `3G-q1-api.php`  the PHP JSON endpoint
- `3G-q1.html`  the HTML + JavaScript client

**Expected behaviour (testing with num=55):**

```
Request: GET 3G-q1-api.php?num=55
Response: {"number":"55","fact":"55 is a medium-sized number.","category":"medium"}
Page displays: "Category: medium | Fact: 55 is a medium-sized number."
```

---

## Question 3G-Q2: Age Calculator (POST Request)

**Scenario:** A website calculates how many days old a person is based on their birth year. The user submits a name and birth year via AJAX without reloading the page.

### Task

Create **two files** that work together:

#### File 1: `3G-q2-api.php` (PHP Endpoint)

A JSON API that accepts **POST** requests.

- Set `Content-Type: application/json`
- Check `$_SERVER["REQUEST_METHOD"]` is `"POST"`. If not, set HTTP 405 status and return: `{"error": "Method Not Allowed"}`
- Read the raw POST body as JSON using `file_get_contents("php://input")` and decode it
- Extract `name` and `birthYear` from the decoded data (default to empty/null if missing)
- Validate:
  - If `name` is empty, return: `{"error": "Name is required."}`
  - If `birthYear` is not numeric or empty, return: `{"error": "Valid birth year is required."}`
  - If `birthYear < 1900` or `birthYear > 2025`, return: `{"error": "Birth year must be between 1900 and 2025."}`
- On success:
  - Calculate `$age = 2025 - $birthYear`
  - Calculate `$daysAlive = $age * 365`
  - Return: `{"name": "NAME", "birthYear": YEAR, "age": AGE, "daysAlive": DAYS, "message": "Hello NAME! You are AGE years old and have lived approximately DAYS days."}`

#### File 2: `3G-q2.html` (Client Page)

Create an HTML page with:
- An input field `"Your Name:"` with `id="nameInput"`
- An input field `"Birth Year:"` with `id="yearInput"`
- A button `"Calculate Age"` with `id="calcBtn"`
- A `<div id="result">` and a `<div id="error">`

**JavaScript:**
- On button click, read name and year values
- Build a JSON body: `JSON.stringify({name: value, birthYear: value})`
- Send a **POST** request with `Content-Type: application/json`
- Parse and display:
  - On success: show the `message` from the response in `#result`
  - On error: show the `error` message in `#error` (red text)
- Use the `try/catch` pattern for error handling

### The Personalized Twist

- The **submit button** text must be: `"Age calc for " . (2025 - A - B)`
  (e.g., A=8, B=5 → 2025-13=2012 → "Age calc for 2012")
- The **name input placeholder** must be: `"Enter name (min D+3 chars)"`
  (e.g., D=2 → "Enter name (min 5 chars)")
- Test with: name = `"User" . A` (e.g., "User8"), birthYear = `2000 + C % 20`
  (e.g., C=15 → 2000 + 15 = 2015)

### What to Submit

- `3G-q2-api.php`  the PHP JSON POST endpoint
- `3G-q2.html`  the HTML + JavaScript client

**Expected behaviour (testing with name="User8", birthYear=2015):**

```
Request: POST 3G-q2-api.php  {name: "User8", birthYear: 2015}
Response: {"name":"User8","birthYear":2015,"age":10,"daysAlive":3650,"message":"Hello User8! You are 10 years old and have lived approximately 3650 days."}
Page displays: "Hello User8! You are 10 years old and have lived approximately 3650 days."
```
