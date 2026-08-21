# Built-in Objects — Lab Question

---

## Question Q1: Text & Number Utilities

**Scenario:** A utility script that shows off JavaScript's built-in String, Math, Number, and Date objects.

### Task

Create `builtin-q1.html` with an internal `<script>` that:

1. Declares `const A, B, C, D` with your values
2. **String:**
   - `let text = "bca scripting language";`
   - Print `text.toUpperCase()`
   - Print `text.length`
   - Print `text.indexOf("script")`
   - Print `text.slice(B, B + 5)`
3. **Math:**
   - Print `Math.round(Math.sqrt(A * A + B * B))`
   - Print `Math.round(4.6 + C)`
   - Print `Math.random()`
4. **Number:**
   - Print `Number.isInteger(A)`
   - Print `(A / (B + 1)).toFixed(2)`
5. **Date:**
   - `let d = new Date();`
   - Print `d.toDateString()`
   - Print `d.getFullYear()`

### The Personalized Twist
- `slice` uses your `B` value as the start index
- `Math.sqrt` uses `A` and `B`
- `Math.round` uses `C`
- The `toFixed` division uses `A` and `B`

### What to Submit
- `builtin-q1.html`

**Expected output (with A=8, B=5, C=0, D=3):**

```
BCA SCRIPTING LANGUAGE
22
4
cript
sqrt rounded: 9
round(4.6): 5
random: 0.438213...
isInteger(8): true
8 / 6 = 1.33
Today: Fri Aug 21 2026
Year: 2026
```

*Note: `text.indexOf("script")` returns 4, and `slice(5, 10)` returns "cript". The `random` and `Date` lines change every run.*
