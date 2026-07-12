# Topic 3A  Lab Questions

> ⚠️ **Remember:** Every PHP file must have a comment block with your name, registration number, and date at the top. Use your personal `A, B, C, D` values from the main README.

---

## Question 3A-Q1: Book Class with Personalized Data

**Scenario:** A small library wants to digitize its book records. Each book has a title, author, genre, and a unique accession number.

### Task

Create a class `Book` with the following specifications:

**Properties:**
| Property | Type | Description |
|----------|------|-------------|
| `$title` | `string` | Title of the book |
| `$author` | `string` | Author of the book |
| `$genre` | `string` | Genre (e.g., "Fiction", "Academic") |
| `$accessionNo` | `string` | Unique ID like `ACC-001` |

**Methods:**

1. `setDetails(string $title, string $author, string $genre, string $accessionNo): void`  assigns all properties
2. `getDetails(): string`  returns a formatted string like: `"ACC-001: Programming in PHP by John Doe [Academic]"`
3. `matchesGenre(string $genre): bool`  returns `true` if the book's genre matches the given parameter

### The Personalized Twist

- Your **first book's accession number** must end with your `A` value.  
  e.g., if A=8 → `ACC-008`
- Your **second book's accession number** must end with your `B` value.  
  e.g., if B=5 → `ACC-005`
- The **third book** must be of genre `"Academic"` and its title must contain the **word count** equal to `C % 3 + 2`.  
  (So if C=15, 15%3+2 = 2 → title must be exactly 2 words long)

### What to Submit (`3A-q1.php`)

Create **3 Book objects** with realistic book details that satisfy the rules above. Then:

- Print details of all 3 books using `getDetails()`
- Call `matchesGenre("Fiction")` on the first book and print the result
- Call `matchesGenre("Academic")` on the third book and print the result

**Expected output format (example):**

```
ACC-008: Programming in PHP by John Doe [Academic]
ACC-005: Data Structures by Jane Smith [Academic]
ACC-112: Calculus by Dr. Miller [Academic]
Book 1 matches Fiction? 
Book 3 matches Academic? 1
```

---

## Question 3A-Q2: Laptop Inventory Class

**Scenario:** A computer store tracks laptops in stock. Each laptop has a brand, model, price, and stock quantity.

### Task

Create a class `Laptop` with the following:

**Properties:**
| Property | Type | Description |
|----------|------|-------------|
| `$brand` | `string` | Brand name |
| `$model` | `string` | Model name |
| `$price` | `float` | Price in NPR |
| `$stock` | `int` | Quantity in stock |

**Methods:**

1. `__construct(string $brand, string $model, float $price, int $stock)`  sets all properties
2. `applyDiscount(float $percent): void`  reduces price by given percentage
3. `sell(int $qty): bool`  reduces stock by `$qty` if enough stock exists, returns `true`; otherwise returns `false` and does nothing
4. `getInfo(): string`  returns `"BRAND MODEL  Rs. PRICE (QTY in stock)"`

### The Personalized Twist

- Create **3 Laptop objects**. The **price** of the first laptop must be `9999 + (C * 100)`  
  (e.g., C=15 → Rs. 9999 + 1500 = Rs. 11499)
- The **stock** of the second laptop must be equal to `A + B`  
  (e.g., A=8, B=5 → 13 units)
- For the **third laptop**, the brand name length must be exactly `D + 3` characters  
  (e.g., D=2 → brand name must be 5 letters, like "ASUS" is 4  no, try "Lenovo" is 6  match your D)

### What to Submit (`3A-q2.php`)

- Create 3 laptop objects with realistic brands (Dell, HP, Lenovo, Acer, ASUS  but respect the length rule for #3)
- Call `sell(int)` on the first laptop with `$qty = A + 1` and print whether it succeeded
- Apply a discount of `(A + B)%` to the second laptop, then print its info
- Try to sell `999` units of the third laptop (should fail), print the result
- Print info of all 3 laptops

**Expected output format (example):**

```
Sold 6 units of Dell? 1
HP Pavilion  Rs. 10349.1 (13 in stock)
Sold 999 units of Lenovo? 
Dell Inspiron  Rs. 69999 (4 in stock)
HP Pavilion  Rs. 10349.1 (13 in stock)
Lenovo IdeaPad  Rs. 45000 (7 in stock)
```
