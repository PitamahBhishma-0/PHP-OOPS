# Form Validation — Lab Question

---

## Question Q1: Registration Form Validator

**Scenario:** A registration form that validates name, email, and password before it can be submitted.

### Task

Create `validation-q1.html` with an internal `<script>`.

**HTML:**
- A form with fields: `name`, `email`, `pass`, `confirm`, and a submit button
- A `<p id="msg"></p>` to show validation messages

**JavaScript:**

1. Declares `const A, B, C, D` with your values
2. On `submit`, calls `e.preventDefault()` and runs `validateForm()`
3. `validateForm()` checks, in order:
   - Name is at least `B` characters long
   - Email matches the regex `/^[^\s@]+@[^\s@]+\.[^\s@]+$/`
   - Password length is at least `8 + D`
   - Password contains at least `C + 1` digit(s), using `/[0-9]/g`
   - Password and confirm match
4. If all pass, show `"Registration successful for Student" + A` in `#msg`
5. Otherwise show the first error found (e.g., `"Email is invalid"`) and return `false`

### The Personalized Twist
- The success message uses your `A` value
- The minimum name length is your `B` value
- The required digit count is `C + 1`
- The minimum password length is `8 + D`

### What to Submit
- `validation-q1.html`

**Expected result (with A=8, B=5, C=0, D=3):**
- Name shorter than 5 chars → `Name must be at least 5 characters`
- Bad email → `Email is invalid`
- Password shorter than 11 chars → `Password must be at least 11 characters`
- Password without a digit → `Password must contain at least 1 number`
- Mismatched confirm → `Passwords do not match`
- All valid → `Registration successful for Student8`
