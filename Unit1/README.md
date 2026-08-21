# Lab: Unit 1 — Client-Side Scripting with JavaScript

**Course:** CACS252 | **BCA 4th Semester**
**Language:** JavaScript, HTML
**Total Topics:** 9 (one question each)

---

## How This Lab Works

Each topic folder contains a `questions.md` with **1 lab question**.
Every question uses **personalized values** (`A, B, C, D`) that you derive from your registration number.

### Your A, B, C, D Values

Take the **last 4 digits** of your registration number, then map them **right to left**:

```
Example: Reg No = BCA23058
          Last 4 digits = 3058

    A = last digit          → 8
    B = second-last digit   → 5
    C = third-last digit    → 0
    D = fourth-last digit   → 3
```

### Using the Values in Code

At the top of your JavaScript (or inside your HTML `<script>`), declare constants so the formulas work automatically:

```js
/**
 * Your Name
 * Reg No: BCA23058
 * Date: 2026-08-21
 */

const A = 8;   // last digit
const B = 5;   // second-last
const C = 0;   // third-last
const D = 3;   // fourth-last
```

Then whenever a question says something like `score = 50 + (C + 2)`, JavaScript computes `50 + (0 + 2) = 52` using your values.

---

## Topic Index

| Topic | Folder | Concept |
|-------|--------|---------|
| 1 | `Embedding_JavaScript/` | Inline, internal, external JS + `<noscript>` |
| 2 | `Operators_Control_Structures/` | Operators, if/else, switch, loops |
| 3 | `Arrays_Functions/` | Arrays, array methods, `forEach`, functions |
| 4 | `Builtin_Objects/` | String, Math, Number, Date |
| 5 | `BOM_Dialogs_Timers/` | `alert`/`confirm`/`prompt`, timers, `location` |
| 6 | `DOM_Manipulation/` | Selectors, content, style, classes, nodes |
| 7 | `Event_Handling/` | `addEventListener`, event object, `preventDefault` |
| 8 | `Cookies/` | Set, read, delete cookies |
| 9 | `Form_Validation/` | Client-side validation with RegEx |

---

## Study Notes

The questions follow the sections in the Unit 1 notes:

`../../unit1/BCA_Unit1_JavaScript_Detailed_Notes.md`

Each topic `README.md` tells you which section to review.

---

## Running Your Code

JavaScript runs in the browser, not the terminal. Open your `.html` file in a web browser:

- **Inline / internal scripts** run as soon as the page loads.
- **Console output** (`console.log`) appears in the browser's Developer Tools → Console tab.
- **`alert` / `confirm` / `prompt`** show dialog boxes.

To see results quickly, open the file (double-click) or press `Ctrl+O` in your browser.

---

## Submission Instructions

1. Complete the question in each topic folder
2. Include the comment block at the top of every file
3. Verify your output matches the expected format shown in the question
4. Submit the `.html` / `.js` file(s) for each topic

---

*TU BCA 4th Semester — Scripting Language (CACS252)*
