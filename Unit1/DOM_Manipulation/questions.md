# DOM Manipulation — Lab Question

---

## Question Q1: Dynamic To-Do List

**Scenario:** A page that lets JavaScript build and style a simple to-do list using the DOM.

### Task

Create `dom-q1.html` with an HTML body and an internal `<script>`.

**HTML:**
- A `<div id="app"></div>`
- A `<ul id="todo"></ul>`
- A `<style>` block with a `.done { text-decoration: line-through; }` rule

**JavaScript:**

1. Declares `const A, B, C, D` with your values
2. Uses `getElementById("app")` to set the title:
   `app.innerHTML = "<h1>To-Do List of Student" + A + "</h1>";`
3. Uses `document.createElement` + `appendChild` to add `B` `<li>` items to `#todo`, each named `"Task " + (i + 1)`
4. Uses `querySelector("#todo li")` to select the first item and:
   - change its text with `textContent` to `"First task (priority " + C + ")"`
   - set its color with `style.color = "blue"`
5. Uses `querySelectorAll("#todo li")`, then removes the second item with `items[1].remove()`
6. Re-selects all items and prints `"Total tasks: " + items.length`
7. Adds the `done` class to the last item with `classList.add("done")`

### The Personalized Twist
- The heading uses your `A` value
- The number of tasks is your `B` value
- The priority text uses your `C` value
- The `.done` rule's font size uses your `D` value, e.g. `font-size: (14 + D)px`

### What to Submit
- `dom-q1.html`

**Expected result (with A=8, B=5, C=0, D=3):**
- Heading: `To-Do List of Student8`
- 5 tasks are added, then the 2nd is removed → 4 remain
- First task reads `First task (priority 0)` in blue
- Last task is struck through (`.done`)
- Console prints `Total tasks: 4`
