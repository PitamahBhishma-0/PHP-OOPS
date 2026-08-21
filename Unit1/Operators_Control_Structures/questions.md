# Operators & Control Structures — Lab Question

---

## Question Q1: Grade Checker

**Scenario:** A college wants a script that calculates a student's total marks and prints their grade using operators and control structures.

### Task

Create `operators-q1.html` with an internal `<script>` that:

1. Declares `const A, B, C, D` with your values
2. Calculates:
   - `total = A + B + C + D + 50`
   - `average = total / 4`
3. Uses the **ternary operator** to set `status`:
   `status = (total >= 60) ? "Pass" : "Fail"`
4. Uses **if / else if / else** to set `grade`:
   - `>= 80` → `"Distinction"`
   - `>= 60` → `"First Division"`
   - `>= 40` → `"Second Division"`
   - else → `"Fail"`
5. Uses a **`for` loop** to print `"Subject " + i` for `i = 1` to `B`
6. Uses a **`switch`** on `D` to print a remark:
   - `case 0`: `"Excellent"`
   - `case 1`: `"Very Good"`
   - `case 2`: `"Good"`
   - `case 3`: `"Average"`
   - `default`: `"Keep Trying"`

### The Personalized Twist
- `total` must use all four values `A + B + C + D`
- The loop must run exactly `B` times
- The switch remark is chosen by your `D` value

### What to Submit
- `operators-q1.html`

**Expected output (with A=8, B=5, C=0, D=3):**

```
Total: 66
Average: 16.5
Status: Pass
Grade: First Division
Subjects:
Subject 1
Subject 2
Subject 3
Subject 4
Subject 5
Remark: Average
```

*Note: `66` comes from `8 + 5 + 0 + 3 + 50`. Your total will differ with your own A, B, C, D.*
