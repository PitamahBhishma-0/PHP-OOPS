# Topic 3B — Lab Questions

> ⚠️ **Remember:** Every PHP file must have a comment block with your name, registration number, and date at the top. Use your personal `A, B, C, D` values from the main README.

---

## Question 3B-Q1: Bank Account with Constructor & Destructor

**Scenario:** A bank wants to track account creations and closures. Whenever an account is opened, the constructor should log it. When the account object is destroyed (e.g., account closed), the destructor should log that too.

### Task

Create a class `BankAccount` with the following:

**Properties:**
| Property | Type | Description |
|----------|------|-------------|
| `$accountNo` | `string` | Unique account number |
| `$holderName` | `string` | Account holder's name |
| `$balance` | `float` | Current balance |

**Methods:**

1. `__construct(string $accountNo, string $holderName, float $initialDeposit)` — sets all properties and **echoes**: `"Account XXXX created for NAME with Rs. BALANCE deposit."`
2. `deposit(float $amount): void` — adds to balance, echoes: `"Deposited Rs. AMOUNT. New balance: Rs. BALANCE"`
3. `withdraw(float $amount): bool` — if sufficient balance, deducts and returns `true`; otherwise echoes `"Insufficient balance!"` and returns `false`
4. `__destruct()` — echoes: `"Account XXXX closed. Final balance: Rs. BALANCE. Goodbye, NAME!"`

### The Personalized Twist

- Your **account number** format must be: `"ACC-" . (1000 + C)`  
  (e.g., C=15 → "ACC-1015")
- The **initial deposit** must be `5000 + (A * 1000)`  
  (e.g., A=8 → Rs. 13000)
- The holder's **first name** must contain exactly `B` characters  
  (e.g., B=5 → "Aarav" is 5 letters ✓ — "Ram" is 3 letters ✗)

### What to Submit (`3B-q1.php`)

- Create **1 BankAccount** object with details satisfying the rules above
- Deposit an amount equal to `C * 100` (e.g., C=15 → Rs. 1500)
- Try to withdraw an amount equal to `5000 + (A + B) * 100`  
  (e.g., A=8, B=5 → Rs. 6300) — this may or may not succeed depending on your values
- Unset the object to trigger the destructor
- **At the very end of the file**, add a comment with your calculated balance check showing the math

**Expected output format (example):**

```
Account ACC-1015 created for Aarav with Rs. 13000 deposit.
Deposited Rs. 1500. New balance: Rs. 14500
Withdrew Rs. 6300. New balance: Rs. 8200
Account ACC-1015 closed. Final balance: Rs. 8200. Goodbye, Aarav!
```

---

## Question 3B-Q2: Course Enrollment Tracker

**Scenario:** A university offers various courses. Each time a student enrolls, the enrollment is logged. When the script ends, a summary of all enrollments is printed via destructors.

### Task

Create a class `Enrollment` with the following:

**Properties:**
| Property | Type | Description |
|----------|------|-------------|
| `$studentName` | `string` | Student's full name |
| `$courseCode` | `string` | e.g., "CACS252" |
| `$semester` | `string` | e.g., "4th Sem" |
| `$fee` | `float` | Tuition fee for this course |

**Methods:**

1. `__construct(string $studentName, string $courseCode, string $semester, float $fee)` — set all properties, echo `"ENROLLED: NAME in COURSE (SEMESTER) — Rs. FEE"`
2. `__destruct()` — echo `"UNENROLLED: NAME — COURSE. Refund processed for Rs. FEE."`

**Static property (class-level):**

- `public static int $totalEnrollments = 0;` — increment inside constructor

### The Personalized Twist

- Create exactly **3 Enrollment objects**
- The **studentName** values must use variations of your own name:
  - Enrollment 1: your first name + " " + "BCA" + A (e.g., A=8 → "Aarav BCA8")
  - Enrollment 2: your first name + " " + "BIT" + B (e.g., B=5 → "Aarav BIT5")
  - Enrollment 3: your first name + " " + "BCA" + D (e.g., D=2 → "Aarav BCA2")
- The **fee** for each course must use your `C` value:
  - Enrollment 1: `12000 + C * 50`
  - Enrollment 2: `15000 + C * 30`
  - Enrollment 3: `8000 + C * 100`

### What to Submit (`3B-q2.php`)

- Create 3 enrollment objects
- After creating all 3, echo: `"Total enrollments this session: " . Enrollment::$totalEnrollments`
- Do NOT manually `unset()` any objects — let the script end trigger destructors naturally
- The destructors will fire in reverse order of creation (LIFO)

**Expected output format (example):**

```
ENROLLED: Aarav BCA8 in CACS252 (4th Sem) — Rs. 12750
ENROLLED: Aarav BIT5 in CACS253 (4th Sem) — Rs. 15450
ENROLLED: Aarav BCA2 in CACS254 (4th Sem) — Rs. 9500
Total enrollments this session: 3
UNENROLLED: Aarav BCA2 — CACS254. Refund processed for Rs. 9500.
UNENROLLED: Aarav BIT5 — CACS253. Refund processed for Rs. 15450.
UNENROLLED: Aarav BCA8 — CACS252. Refund processed for Rs. 12750.
```
