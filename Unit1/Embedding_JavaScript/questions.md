# Embedding JavaScript — Lab Question

---

## Question Q1: Three Ways to Embed JavaScript

**Scenario:** A new developer wants to see the difference between the three ways JavaScript can be added to a web page.

### Task

Create two files that together use **all three** embedding methods.

**`embedding-q1.html`**

1. **Inline:** add a `<button>` with `onclick="alert('Inline says Hi, Student' + A)"`
2. **Internal:** add a `<script>` block in `<head>` that runs:
   `console.log("Internal script loaded by Student" + B);`
3. **External:** link an external file with `<script src="embedding-q1.js" defer></script>`
4. Add a `<noscript>` block showing the text `"Please enable JavaScript to view this page."`

**`embedding-q1.js`**

5. Write a heading into the page:
   `document.write("<h2>External script by Student" + C + D + "</h2>");`

### The Personalized Twist
- The inline alert must include your `A` value
- The internal console message must include your `B` value
- The external heading must include your `C` and `D` values

### What to Submit
- `embedding-q1.html`
- `embedding-q1.js`

**Expected result (with A=8, B=5, C=0, D=3):**
- Clicking the button shows an alert: `Inline says Hi, Student8`
- The browser console shows: `Internal script loaded by Student5`
- The page shows a heading: `External script by Student03`
