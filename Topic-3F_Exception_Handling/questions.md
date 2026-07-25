# Topic 3F  Lab Questions

---

## Question 3F-Q1: Bank Transaction with Custom Exceptions

**Scenario:** A banking system processes withdrawals and deposits. Invalid operations (overdraft, negative deposits, invalid account status) must be handled with custom exception types rather than letting the script crash.

### Task

Create **3 custom exception classes**:

1. `OverdraftException extends Exception`  thrown when withdrawal exceeds balance
2. `InvalidAmountException extends Exception`  thrown when deposit/withdrawal amount is zero or negative
3. `AccountFrozenException extends Exception`  thrown when trying to transact on a frozen account

Create a class `BankAccount` with the following:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$accountNo` | `public` | `string` | Account number |
| `$holderName` | `public` | `string` | Account holder's name |
| `$balance` | `private` | `float` | Current balance |
| `$isFrozen` | `private` | `bool` | Whether account is frozen |

**Methods:**

1. `__construct(string $accountNo, string $holderName, float $initialBalance)`  sets properties, sets `$isFrozen` to `false`
2. `deposit(float $amount): void`  
   - If `$amount <= 0`, throw `InvalidAmountException` with message: `"Deposit amount must be positive. Given: AMOUNT"`
   - If `$isFrozen`, throw `AccountFrozenException` with message: `"Account ACC_NO is frozen. Cannot deposit."`
   - Otherwise add to balance and echo: `"Deposited Rs. AMOUNT. New balance: Rs. BALANCE"`
3. `withdraw(float $amount): void`  
   - If `$isFrozen`, throw `AccountFrozenException` with message: `"Account ACC_NO is frozen. Cannot withdraw."`
   - If `$amount <= 0`, throw `InvalidAmountException` with message: `"Withdrawal amount must be positive. Given: AMOUNT"`
   - If `$amount > $this->balance`, throw `OverdraftException` with message: `"Insufficient balance! Required: Rs. AMOUNT, Available: Rs. BALANCE"`
   - Otherwise deduct and echo: `"Withdrew Rs. AMOUNT. New balance: Rs. BALANCE"`
4. `freezeAccount(): void`  sets `$isFrozen = true`
5. `getBalance(): float`  getter for private balance

### The Personalized Twist

- Your **account number** must be: `"ACC-" . (100 + A) . (B + C % 10)`  
  (e.g., A=8, B=5, C=15 → 15%10=5 → "ACC-10810")
- The **holder name** must contain exactly `D + 4` characters
  (e.g., D=2 → 6 letters: "Aarav" is 5 → no, try "Binod" is 5... "Prakash" is 7 → pick one matching your D)
- The **initial balance** must be: `10000 + (A * 1000)` (e.g., A=8 → Rs. 18000)

### What to Submit (`3F-q1.php`)

- Create 1 `BankAccount` with your personalized values
- Demonstrate **each exception type** being caught:
  - Try depositing `-500` (catches `InvalidAmountException`)
  - Freeze the account
  - Try depositing `2000` (catches `AccountFrozenException`)
  - Try withdrawing `999999` (catches `AccountFrozenException`)
  - (Note: since the account is frozen, the overdraft won't be reached yet)
- Now create a **second** BankAccount (any values) that is NOT frozen
  - Try withdrawing an amount = `50000 + C * 100` which exceeds the balance (catches `OverdraftException`)
  - Use a separate try/catch for each operation so the script continues
- Each catch block should print: `"ERROR: [ExceptionType] MESSAGE"`
- **At the end**, print: `"Script completed successfully."` using a `finally` block

**Expected output format (example):**

```
ERROR: [InvalidAmountException] Deposit amount must be positive. Given: -500
ERROR: [AccountFrozenException] Account ACC-10810 is frozen. Cannot deposit.
ERROR: [AccountFrozenException] Account ACC-10810 is frozen. Cannot withdraw.
ERROR: [OverdraftException] Insufficient balance! Required: Rs. 65000, Available: Rs. 10000
Script completed successfully.
```

---

## Question 3F-Q2: Student Score Validator

**Scenario:** A result management system needs to validate student scores before recording them. Multiple validation rules exist, and each type of violation should produce a specific exception type.

### Task

Create **3 custom exception classes**:

1. `InvalidScoreException extends Exception`  thrown when score is outside 0-100
2. `MissingFieldException extends Exception`  thrown when required data is empty/null
3. `DuplicateEntryException extends Exception`  thrown when a roll number already exists

Create a class `ResultManager` with the following:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$records` | `private` | `array` | Stores recorded results (associative array: rollNo => data) |

**Methods:**

1. `__construct()`  initialises empty `$records` array
2. `addResult(?string $rollNo, ?string $name, ?float $score): string`  
   - If `$rollNo` is null or empty, throw `MissingFieldException` with: `"Roll number is required."`
   - If `$name` is null or empty, throw `MissingFieldException` with: `"Student name is required."`
   - If `$score` is null or `$score < 0 || $score > 100`, throw `InvalidScoreException` with: `"Score VALUE is invalid. Must be between 0 and 100."`
   - If `array_key_exists($rollNo, $this->records)`, throw `DuplicateEntryException` with: `"Roll number ROLL already exists."`
   - Otherwise store in `$records[$rollNo] = ["name" => $name, "score" => $score]` and return: `"Result recorded: NAME (ROLL)  Score: SCORE"`
3. `getRecord(string $rollNo): ?array`  returns the record array or null if not found

### The Personalized Twist

Create an array of **4 test cases** that will trigger each scenario:

- Test case 1 (valid): rollNo = `"BCA-" . (100 + A)`, name = `"Student" . A`, score = `50 + C % 51`
  (e.g., A=8, C=15 → "BCA-108", "Student8", score=50+15=65)
- Test case 2 (missing field): rollNo = `null`, name = `"Test"`, score = `80.0`
- Test case 3 (invalid score): rollNo = `"BCA-" . (200 + B)`, name = `"Student" . B`, score = `150 + D`
  (e.g., B=5, D=2 → "BCA-205", "Student5", score=152)
- Test case 4 (duplicate): Use the same rollNo as test case 1, name = `"Duplicate"`, score = `90.0`

### What to Submit (`3F-q2.php`)

- Instantiate `ResultManager`
- Loop through the **4 test cases** and for each:
  - Wrap in try/catch
  - On success: print the returned message
  - On exception: print `"EXCEPTION: [CLASS] MESSAGE"` (use `get_class($e)` to get the short class name)
- Add a `finally` block inside the loop that prints: `"--- End of attempt for ROLL ---"`
- After the loop, print: `"All processing complete."`

**Expected output format (example):**

```
Result recorded: Student8 (BCA-108)  Score: 65
--- End of attempt for BCA-108 ---
EXCEPTION: [MissingFieldException] Roll number is required.
--- End of attempt for ---
EXCEPTION: [InvalidScoreException] Score 152 is invalid. Must be between 0 and 100.
--- End of attempt for BCA-205 ---
EXCEPTION: [DuplicateEntryException] Roll number BCA-108 already exists.
--- End of attempt for BCA-108 ---
All processing complete.
```
