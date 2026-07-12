# Topic 3C  Lab Questions

> ⚠️ **Remember:** Every PHP file must have a comment block with your name, registration number, and date at the top. Use your personal `A, B, C, D` values from the main README.

---

## Question 3C-Q1: Employee Salary with Encapsulation

**Scenario:** A company wants to ensure that employee salaries cannot be set to unreasonable values. Only authorized range-based updates should be allowed through controlled setter methods. Junior and Senior employees have different salary rules.

### Task

Create a **parent class** `Employee` with the following:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$name` | `public` | `string` | Employee name |
| `$id` | `protected` | `string` | Employee ID (accessible in child) |
| `$salary` | `private` | `float` | Monthly salary  ONLY accessible in Employee |

**Methods:**

1. `__construct(string $name, string $id, float $initialSalary)`  sets properties using the setter for salary (so validation applies even during construction)
2. `setSalary(float $amount): void`  **Setter with validation**:
   - If `$amount >= 10000 && $amount <= 200000`, set it
   - Else echo: `"Salary REJECTED: Rs. AMOUNT is outside valid range (10000-200000)"`
3. `getSalary(): float`  **Getter** returning the private salary
4. `displayInfo(): string`  returns `"ID: NAME  Rs. SALARY"`

### The Personalized Twist

- Use your **personalized initial salary**: `20000 + (C * 1000)`  
  (e.g., C=15 → Rs. 35000)
- Use your **employee ID** as: `"EMP-" . (100 + A) . (B + 1)`  
  (e.g., A=8, B=5 → "EMP-1086")

Now create a **child class** `SeniorDeveloper extends Employee`:

**Additional Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$bonusPercent` | `private` | `float` | Bonus percentage |

**Methods:**

1. `__construct(string $name, string $id, float $baseSalary, float $bonusPercent)`  calls parent constructor, then sets `$this->bonusPercent`
2. `setSalary(float $amount): void`  **Override** the parent setter with a **higher range**: `20000 to 500000`. Any amount outside this is rejected.
3. `getAnnualPackage(): float`  returns `(salary * 12) * (1 + bonusPercent/100)`
4. `displayInfo(): string`  **Override** to return: `"SENIOR: ID: NAME  Rs. SALARY/month | Bonus: BONUS% | Annual: Rs. PACKAGE"`

### What to Submit (`3C-q1.php`)

- Create one `Employee` object with your personalized values
- Try to set its salary to `5000` (should be rejected by validation)
- Print its info
- Create one `SeniorDeveloper` object with salary = `50000` and bonus = `(A + B + 5)%`  
  (e.g., A=8, B=5 → bonus = 18%)
- Try to set SeniorDeveloper's salary to `15000` (should be rejected because Senior range is 20000-500000)
- Try to set SeniorDeveloper's salary to `25000` (should be accepted)
- Print SeniorDeveloper's info, then print their annual package

**Expected output format (example):**

```
Salary REJECTED: Rs. 5000 is outside valid range (10000-200000)
ID: EMP-1086: Aarav  Rs. 35000
Salary REJECTED: Rs. 15000 is outside valid range (20000-500000)
SENIOR: EMP-2085: Aarav  Rs. 25000/month | Bonus: 18% | Annual: Rs. 354000
```

---

## Question 3C-Q2: E-Commerce Product with Price Control (5 marks)

**Scenario:** An online store needs a product management system where product prices have strict rules. Base products have one pricing rule, and discounted/vip products have another. A product's `$code` is sensitive and should only be readable, not writable from outside.

### Task

Create a class `Product` with:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$name` | `public` | `string` | Product name |
| `$code` | `private` | `string` | Product code  set once, never changed |
| `$price` | `private` | `float` | Unit price |

**Methods:**

1. `__construct(string $name, string $code, float $price)`  uses setter for price
2. `getCode(): string`  **public getter** for the private `$code` (read-only access)
3. `setPrice(float $price): void`  validates: price must be between `100` and `100000`. Reject otherwise with a message.
4. `getPrice(): float`  getter
5. `getInfo(): string`  returns `"[CODE] NAME  Rs. PRICE"`

### The Personalized Twist

- Create **3 Product objects** (regular products)
- Product codes must follow this pattern:
  - Product 1: `"PROD-" . A . "0" . B`  (e.g., A=8, B=5 → "PROD-805")
  - Product 2: `"PROD-" . D . C`         (e.g., D=2, C=15 → "PROD-215")
  - Product 3: `"PROD-" . B . A . D`     (e.g., B=5, A=8, D=2 → "PROD-582")
- Product names must contain exactly `D + 4` letters  
  (e.g., D=2 → 6 letters: "Kurkure" ✓, "Laptop" is 6 ✓  but "Biscuit" is 7 ✗)

Now create a child class `VIPProduct extends Product`:

**Methods:**

1. `__construct(string $name, string $code, float $basePrice, float $vipMarkup)`  calls parent with `$basePrice * (1 + $vipMarkup/100)` as the price
2. `setPrice(float $price): void`  **Override**: VIP products can have prices from `1000` to `500000`. Reject otherwise.
3. `getInfo(): string`  **Override** to: `"[CODE] NAME  Rs. PRICE [VIP ONLY]"`

### What to Submit (`3C-q2.php`)

- Create 3 regular `Product` objects with realistic items (food item, electronics, clothing)
- Display info of all 3
- Try setting Product 1's price to `50` (should be rejected)
- Set Product 2's price to `(999 + C * 10)` (e.g., C=15 → Rs. 1149)
- Create 1 `VIPProduct` with:
  - Name: must be `D + 8` characters long
  - Code: `"VIP-" . (A + B) . D`  (e.g., A=8, B=5, D=2 → "VIP-132")
  - Base price: `5000`
  - VIP markup: `(A + D)%`  (e.g., A=8, D=2 → 10%)
- Try setting VIPProduct's price to `500` (should be rejected due to VIP range)
- Print VIPProduct info

**Expected output format (example):**

```
[PROD-805] Kurkure  Rs. 20
[PROD-215] Laptop  Rs. 55000
[PROD-582] Tshirt  Rs. 1200
Price REJECTED: Rs. 50 is outside valid range (100-100000)
[PROD-215] Laptop  Rs. 1149
Price REJECTED: Rs. 500 is outside valid range (1000-500000)
[VIP-132] Bluetooth Speaker  Rs. 5500 [VIP ONLY]
```
