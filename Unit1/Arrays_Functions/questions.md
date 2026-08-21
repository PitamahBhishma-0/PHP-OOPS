# Arrays & Functions — Lab Question

---

## Question Q1: Shopping List Manager

**Scenario:** A small shop wants a script that manages a list of items using arrays and reusable functions.

### Task

Create `arrays-q1.html` with an internal `<script>` that:

1. Declares `const A, B, C, D` with your values
2. Creates an array `items = ["Rice", "Oil", "Sugar"]`
3. Uses `push()` to add `"Salt"` and `"Tea"` (now 5 items)
4. Uses `pop()` to remove the last item, then prints the array
5. Uses `splice(B % items.length, 1)` to remove one item, then prints the array
6. Uses `forEach` to print each remaining item as `"Item i: name"`
7. Defines a **function declaration** `totalPrice(price, qty)` that returns `price * qty`
8. Defines an **arrow function** `discount = (price) => price - (price * (D / 100))`
9. Calls both functions with personalized values:
   - `bill = totalPrice(50 + C, A)`
   - `final = discount(bill)`

### The Personalized Twist
- The `splice` index must use your `B` value
- The bill unit price is `50 + C` and quantity is your `A` value
- The discount percent must be your `D` value

### What to Submit
- `arrays-q1.html`

**Expected output (with A=8, B=5, C=0, D=3):**

```
After pop: Rice,Oil,Sugar,Salt
After splice: Rice,Sugar,Salt
Item 0: Rice
Item 1: Sugar
Item 2: Salt
Bill: 400
Final after 3% discount: 388
```

*Note: `splice(5 % 4, 1)` = `splice(1, 1)` removes "Oil". Your result depends on your B value.*
