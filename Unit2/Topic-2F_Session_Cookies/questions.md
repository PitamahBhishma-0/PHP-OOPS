# Topic 2F  Lab Questions

---

## Question 2F-Q1: Session-Based Visit Counter

**Scenario:** A website tracks how many times a user has visited different pages during their session using PHP sessions.

### Task

Create a single PHP file `2F-q1.php` that:

1. Call `session_start()` at the very top (before any HTML output)
2. Create/update a session counter array `$_SESSION['page_views']`:
   - On each load, increment `$_SESSION['page_views']['home']` by 1
3. Display the visit count:
   ```
   ==============================
      Session Visit Tracker
   ==============================
   Session ID: SESSION_ID
   You have visited this page X times.
   ==============================
   ```
   (Replace `SESSION_ID` with `session_id()`, and `X` with the counter value)

4. Add a **Reset button** (`<a href="2F-q1.php?reset=1">Reset Session</a>`):
   - If `$_GET['reset'] == 1`, call `session_destroy()` and redirect to the same page (without the reset param) using `header("Location: 2F-q1.php")` then `exit`

5. Store a session variable `$_SESSION['username']` on first visit:
   - If it doesn't exist, set it to `"Student" . A` (e.g., "Student8")
   - Display: `"Welcome back, USERNAME!"`

6. The page `<title>` must be: `"2F-Q1 by Student" . A . B` (e.g., "2F-Q1 by Student85")

### The Personalized Twist

- `$_SESSION['username']` uses `A`
- Page title uses `A` and `B`
- If `D` is even, display the session ID. If `D` is odd, hide it.

### What to Submit (`2F-q1.php`)

A single PHP file with session tracking.

**Expected behaviour:**

```
First visit:
  Session ID: abc123def456
  You have visited this page 1 times.
  Welcome back, Student8!

Second visit:
  You have visited this page 2 times.
  Welcome back, Student8!

Click "Reset Session":
  Session destroyed, page reloads -> back to 1 visit.
```

---

## Question 2F-Q2: Theme Selector with Cookies

**Scenario:** A website lets users choose between light and dark themes. The preference is stored in a cookie that expires in 30 minutes.

### Task

Create a single PHP file `2F-q2.php` that:

#### Part A: Form

Show a form with:
- A dropdown `<select name="theme">` with options: `"light"`, `"dark"`, `"blue"`
- A submit button with text: `"Set Theme " . D` (e.g., "Set Theme 3")

#### Part B: Set Cookie (when form submitted)

1. Check if `$_POST['theme']` is set
2. Get the theme value (sanitize)
3. Set a cookie `"theme_pref"` with:
   - Value = selected theme
   - Expiry = `time() + (60 * (A + B))` (e.g., A=8, B=5 → 60*13 = 780 seconds = 13 minutes)
   - Path = `"/"`
4. Display: `"Theme set to THEME for " . (A+B) . " minutes!"`

#### Part C: Display Current Theme

1. Read `$_COOKIE['theme_pref']` (fallback to `"light"` if not set)
2. Apply the theme by outputting inline CSS in `<style>`:
   - If theme is `"dark"`: background `#333`, text `#fff`
   - If theme is `"light"`: background `#fff`, text `#000`
   - If theme is `"blue"`: background `#e3f2fd`, text `#1565c0`
3. Display:
   ```
   ==============================
        Theme: THEME_NAME
   ==============================
   Current time: HH:MM:SS
   Cookie expires in: EXPIRY seconds
   ==============================
   ```
   (Calculate remaining expiry by storing the expiry time in a second cookie `"theme_expiry"` when setting the theme, then compute `$_COOKIE['theme_expiry'] - time()`)

### The Personalized Twist

- Button text uses `D`
- Cookie duration uses `A + B`
- Store the expiry timestamp in a cookie `"theme_expiry_" . A` (e.g., "theme_expiry_8")

### What to Submit (`2F-q2.php`)

A single PHP file with cookie-based theme selection.

**Expected behaviour (A=8, B=5):**

```
First load: Theme is "light" (default), page has white background
Select "dark" from dropdown, click "Set Theme 3":
  -> Cookie set for 13 minutes
  -> Page reloads with dark background
  -> "Theme set to dark for 13 minutes!"
  -> "Cookie expires in: 780 seconds"
```
