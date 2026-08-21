# Event Handling — Lab Question

---

## Question Q1: Button Click Counter & Form Guard

**Scenario:** A page with a button that counts clicks, and a form whose default submission is stopped.

### Task

Create `events-q1.html` with an internal `<script>`.

**HTML:**
- A `<div id="outer">` wrapping a `<button id="btn">Click me</button>`
- A `<p id="count">Clicks: 0</p>`
- A `<form id="myForm"><input type="text"><button type="submit">Submit</button></form>`

**JavaScript:**

1. Declares `const A, B, C, D` with your values
2. Attaches a **`click`** listener to the button using `addEventListener`
3. Inside the listener:
   - increment a `clicks` counter
   - update `#count` text to `"Clicks: " + clicks`
   - log `e.type` and `e.target.tagName` to the console
   - when `clicks` reaches `B`, log `"Reached " + B + " clicks, Student" + A`
4. Attaches a **`submit`** listener to the form that:
   - calls `e.preventDefault()`
   - logs `"Form submit blocked by Student" + C + D`
5. Attaches a `click` listener to `#outer` that logs `"Bubbled to outer"` (demonstrates bubbling)

### The Personalized Twist
- The click-threshold message uses your `A` value
- The click threshold is your `B` value
- The blocked-form message uses your `C` and `D` values

### What to Submit
- `events-q1.html`

**Expected result (with A=8, B=5, C=0, D=3):**
- Each button click increments `Clicks: 1`, `2`, ...
- The console logs `click` and `BUTTON` on each click
- On the 5th click: `Reached 5 clicks, Student8`
- Every click also logs `Bubbled to outer` (because of bubbling)
- Submitting the form logs `Form submit blocked by Student03` and does **not** reload the page
