# Topic 3E  Lab Questions

---

## Question 3E-Q1: University Course Registration Counter

**Scenario:** A university wants to track how many students have registered for courses across different sections. Each registration increments a shared counter. The system should also track registrations per course section using a static method.

### Task

Create a class `Registration` with the following:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$studentName` | `public` | `string` | Student's full name |
| `$courseCode` | `public` | `string` | Course code (e.g., "CACS252") |
| `$section` | `public` | `string` | Section name (e.g., "A", "B") |
| `$feePaid` | `private` | `float` | Fee amount paid |

**Static Members:**
| Member | Type | Description |
|--------|------|-------------|
| `$totalRegistrations` | `public static int` | Starts at 0, incremented in constructor |
| `$totalRevenue` | `public static float` | Starts at 0.0, accumulates fees in constructor |
| `MAX_STUDENTS_PER_SECTION` | `const int` | Class constant = `50` |

**Methods:**

1. `__construct(string $studentName, string $courseCode, string $section, float $feePaid)`  sets all properties, increments `$totalRegistrations`, adds fee to `$totalRevenue`, echoes: `"REGISTERED: NAME for COURSE-SECTION (Rs. FEE)"`
2. `static function getStats(): string`  returns `"Total registrations: X | Total revenue: Rs. Y | Max per section: Z"`
3. `getFeePaid(): float`  getter for private fee

### The Personalized Twist

- Create exactly **3 Registration objects**.
- The **student names** must follow this pattern:
  - Reg 1: `"Student" . A` (e.g., A=8 → "Student8")
  - Reg 2: `"Student" . B` (e.g., B=5 → "Student5")
  - Reg 3: `"Student" . C` (e.g., C=15 → "Student15")
- The **course codes** must be:
  - Reg 1: `"CACS" . (200 + A)` (e.g., A=8 → "CACS208")
  - Reg 2: `"CACS" . (200 + B)` (e.g., B=5 → "CACS205")
  - Reg 3: `"CACS" . (200 + D)` (e.g., D=2 → "CACS202")
- The **section** values must be:
  - Reg 1: `"Section-" . chr(65 + A % 4)` (e.g., A=8 → 8%4=0 → chr(65)="A")
  - Reg 2: `"Section-" . chr(65 + B % 4)` (e.g., B=5 → 5%4=1 → chr(66)="B")
  - Reg 3: `"Section-" . chr(65 + C % 4)` (e.g., C=15 → 15%4=3 → chr(68)="D")
- The **fee** for each must be:
  - Reg 1: `8000 + A * 200`
  - Reg 2: `10000 + B * 150`
  - Reg 3: `12000 + C * 100`

### What to Submit (`3E-q1.php`)

- Create 3 registration objects with the personalized values above
- After creating all 3, call `Registration::getStats()` and print the result
- Also print `Registration::MAX_STUDENTS_PER_SECTION` directly
- Print the fee paid for Registration 2 using the getter

**Expected output format (example):**

```
REGISTERED: Student8 for CACS208-Section-A (Rs. 9600)
REGISTERED: Student5 for CACS205-Section-B (Rs. 10750)
REGISTERED: Student15 for CACS202-Section-D (Rs. 13500)
Total registrations: 3 | Total revenue: Rs. 33850 | Max per section: 50
Max students per section: 50
Fee paid by Student5: Rs. 10750
```

---

## Question 3E-Q2: Product Inventory with Static Counter

**Scenario:** A warehouse tracks all products in stock. Each product created adds to a shared inventory count. A static utility method checks whether the warehouse is at capacity.

### Task

Create a class `Product` with the following:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$name` | `public` | `string` | Product name |
| `$sku` | `public` | `string` | Stock keeping unit code |
| `$price` | `private` | `float` | Unit price |
| `$quantity` | `public` | `int` | Quantity in stock |

**Static Members:**
| Member | Type | Description |
|--------|------|-------------|
| `$productCount` | `private static int` | Starts at 0, incremented in constructor |
| `$totalValue` | `private static float` | Accumulates `price * quantity` in constructor |
| `WAREHOUSE_CAPACITY` | `const int` | Class constant = `1000` |

**Methods:**

1. `__construct(string $name, string $sku, float $price, int $quantity)`  sets all properties, increments `$productCount`, adds `$price * $quantity` to `$totalValue`
2. `static function getProductCount(): int`  static getter for private static counter
3. `static function getAverageValue(): float`  returns `$totalValue / $productCount`, or `0.0` if no products exist
4. `static function isNearCapacity(): bool`  returns `true` if `$productCount >= WAREHOUSE_CAPACITY * 0.9`, else `false`
5. `getInfo(): string`  returns `"SKU: NAME  Rs. PRICE (QTY: X)"`

### The Personalized Twist

- The **sku** codes must follow this format:
  - Product 1: `"SKU-" . A . "A" . B` (e.g., A=8, B=5 → "SKU-8A5")
  - Product 2: `"SKU-" . B . "B" . C` (e.g., B=5, C=15 → "SKU-5B15")
  - Product 3: `"SKU-" . C . "C" . A` (e.g., C=15, A=8 → "SKU-15C8")
- The **price** for each product:
  - Product 1: `150 + A * 10` (e.g., A=8 → Rs. 230)
  - Product 2: `250 + B * 15` (e.g., B=5 → Rs. 325)
  - Product 3: `500 + C * 20` (e.g., C=15 → Rs. 800)
- The **quantity** for each:
  - Product 1: `A * 5` (e.g., A=8 → 40 units)
  - Product 2: `B * 8` (e.g., B=5 → 40 units)
  - Product 3: `D * 3` (e.g., D=2 → 6 units)
- **Product names** must contain exactly `A % 3 + 5` letters
  (e.g., A=8 → 8%3+5=8 letters, like "Keyboard" ✓)

### What to Submit (`3E-q2.php`)

- Create 3 Product objects with realistic names fitting the length rule
- Print info of all 3 products
- Print the total product count using the static method
- Print the average value across all products using the static method
- Print whether the warehouse is near capacity (using `isNearCapacity()`)

**Expected output format (example):**

```
SKU-8A5: Keyboard  Rs. 230 (QTY: 40)
SKU-5B15: Monitor  Rs. 325 (QTY: 40)
SKU-15C8: Harddisk  Rs. 800 (QTY: 6)
Total products: 3
Average value: Rs. 660
Near capacity?
```
