# Topic 3D — Lab Questions

> ⚠️ **Remember:** Every PHP file must have a comment block with your name, registration number, and date at the top. Use your personal `A, B, C, D` values from the main README.

---

## Question 3D-Q1: Abstract Vehicle System with Polymorphism

**Scenario:** A transport company has different types of vehicles (Car, Bike, Truck). Each vehicle can calculate its fuel cost differently. The company wants a common system where all vehicles are treated uniformly but each calculates costs in its own way.

### Task

Create an **abstract class** `Vehicle`:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$brand` | `protected` | `string` | Vehicle brand |
| `$model` | `protected` | `string` | Vehicle model |
| `$year` | `protected` | `int` | Manufacture year |

**Methods:**

1. `__construct(string $brand, string $model, int $year)` — set all properties
2. `abstract public function fuelEfficiency(): float` — returns km per liter
3. `abstract public function maxSpeed(): int` — returns max speed in km/h
4. `public function getInfo(): string` — returns `"YEAR BRAND MODEL"`
5. `public function compare(Vehicle $other): string` — return `"INFO is more efficient than OTHER_INFO"` if this vehicle's fuel efficiency is higher, or `"INFO is less efficient than OTHER_INFO"` otherwise. Use late binding — call `$this->fuelEfficiency()` and `$other->fuelEfficiency()`.

### The Personalized Twist

**Create 3 concrete classes** that extend `Vehicle`:

#### 1. `Car`

- `fuelEfficiency()`: return `15.0 + (A * 0.5)`  (e.g., A=8 → 15 + 4 = 19.0 kmpl)
- `maxSpeed()`: return `180 + (B * 5)`  (e.g., B=5 → 180 + 25 = 205 km/h)
- Additional property: `private int $doors`
- Constructor: takes brand, model, year, and doors

#### 2. `Bike`

- `fuelEfficiency()`: return `35.0 + (C * 0.3)`  (e.g., C=15 → 35 + 4.5 = 39.5 kmpl)
- `maxSpeed()`: return `120 + (A * 3)`  (e.g., A=8 → 120 + 24 = 144 km/h)
- Additional property: `private bool $hasSidecar`
- Constructor: takes brand, model, year, and hasSidecar

#### 3. `Truck`

- `fuelEfficiency()`: return `6.0 + (D * 0.8)`  (e.g., D=2 → 6 + 1.6 = 7.6 kmpl)
- `maxSpeed()`: return `100 + (B * 4)`  (e.g., B=5 → 100 + 20 = 120 km/h)
- Additional property: `private float $loadCapacity` (in tons)
- Constructor: takes brand, model, year, and loadCapacity

### What to Submit (`3D-q1.php`)

- Create 1 Car, 1 Bike, 1 Truck with realistic details and your personalized formulas
- Store all 3 in an array
- **Polymorphism loop:** iterate over the array and for each vehicle, print:
  - `getInfo()`
  - `"Fuel Efficiency: X kmpl"`
  - `"Max Speed: Y km/h"`
- Compare the Car with the Bike using `compare()` method and print the result
- Compare the Truck with the Car and print the result

**Expected output format (example):**

```
2022 Toyota Camry
Fuel Efficiency: 19 kmpl
Max Speed: 205 km/h
2021 Honda CB Shine
Fuel Efficiency: 39.5 kmpl
Max Speed: 144 km/h
2020 Tata Ace
Fuel Efficiency: 7.6 kmpl
Max Speed: 120 km/h
2022 Toyota Camry is less efficient than 2021 Honda CB Shine
2020 Tata Ace is less efficient than 2022 Toyota Camry
```

---

## Question 3D-Q2: Payment System with Interface & Abstract Class

**Scenario:** An e-commerce platform accepts multiple payment methods (Credit Card, eSewa/Khalti, Cash on Delivery). Each payment method processes differently, but all must follow a common contract.

### Task

Create an **interface** `PaymentMethod`:

**Methods (signatures only, no body):**

1. `public function processPayment(float $amount): string` — processes payment, returns a transaction ID
2. `public function getPaymentType(): string` — returns the type name
3. `public function validatePayment(): bool` — returns whether the payment is valid

Now create an **abstract class** `OnlinePayment implements PaymentMethod`:

**Properties:**
| Property | Visibility | Type | Description |
|----------|-----------|------|-------------|
| `$transactionId` | `protected` | `string` | Auto-generated |
| `$amount` | `protected` | `float` | Payment amount |
| `$currency` | `protected` | `string` | e.g., "NPR" |

**Methods:**

1. `__construct(float $amount, string $currency)` — generate a unique transaction ID as: `"TXN-" . strtoupper(substr(md5(rand()), 0, 6))`
2. `abstract public function processPayment(float $amount): string` (still abstract, children will implement)
3. `public function getPaymentType(): string` — return the class short name

### The Personalized Twist

**Create 3 concrete classes:**

#### 1. `CreditCard extends OnlinePayment`

- Additional property: `private string $cardNumber`
- Constructor: takes amount, currency, and cardNumber (store as `"XXXX-XXXX-XXXX-" . substr($cardNumber, -4)`)
- `validatePayment()`: return `true` if the card number length (of the full original) is 16 AND amount is >= `100`
- `processPayment(float $amount)`: generate $fee = `$amount * (1.5 / 100)`, set `$this->amount = $amount - $fee`, return `"CREDIT-CARD:" . $this->transactionId . ":Rs." . $this->amount`

#### 2. `DigitalWallet extends OnlinePayment`

- Additional property: `private string $walletProvider` ("eSewa" or "Khalti")
- **The wallet provider must be:** If A is even → "eSewa", if A is odd → "Khalti"
- Constructor: takes amount, currency, and walletProvider
- `validatePayment()`: return `true` if amount is between `10` and `50000`
- `processPayment(float $amount)`: set `$this->amount = $amount * (1 - (D / 100))`, return `"WALLET(" . $this->walletProvider . "):" . $this->transactionId . ":Rs." . $this->amount`

#### 3. `CashOnDelivery implements PaymentMethod`

- Properties: `private string $address`, `private float $amount`
- Constructor: takes address and amount
- `processPayment(float $amount)`: return `"COD:" . strtoupper(substr(md5($this->address), 0, 8)) . ":Rs." . $amount`
- `getPaymentType()`: return `"Cash on Delivery"`
- `validatePayment()`: return `true` if `strlen($this->address) > 10`

### What to Submit (`3D-q2.php`)

- Create:
  - 1 CreditCard with amount = `10000 + (C * 100)`, currency = "NPR", and card number = your reg number padded to 16 digits
  - 1 DigitalWallet with amount = `5000 + (A * 500)`, currency = "NPR", and appropriate provider based on your A
  - 1 CashOnDelivery with address = `"YourCity-" . A . B . C . ", Nepal"` and amount = `3000`
- Store all 3 in an array of type `PaymentMethod[]`
- **Polymorphism loop:** iterate and for each:
  - Print `getPaymentType()`
  - Print whether `validatePayment()` returns true/false
  - Print the result of `processPayment()` with the original amount
  - Print a separator line

**Expected output format (example):**

```
--- Payment Method: CreditCard ---
Valid: 1
CREDIT-CARD:TXN-A3F8K2:Rs.11500.0

--- Payment Method: DigitalWallet ---
Valid: 1
WALLET(eSewa):TXN-B7D1M9:Rs.5400.0

--- Payment Method: Cash on Delivery ---
Valid: 1
COD:A9C3F2B1:Rs.3000
```
