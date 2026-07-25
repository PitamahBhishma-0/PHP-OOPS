# Topic 3I  Lab Questions

---

## Question 3I-Q1: jQuery Photo Gallery with Effects

**Scenario:** A photography portfolio page needs interactive image controls. Visitors should be able to show, hide, fade, and slide-toggle the gallery images with smooth animations. The page also needs dynamic caption management.

### Task

Create a single **HTML file** `3I-q1.html` that uses jQuery (loaded from CDN) to create an interactive photo gallery.

**HTML Structure:**

Create the following elements on the page:

| Element | ID | Description |
|---------|-----|-------------|
| `<h1>` | — | Title: `"3I-Q1 Gallery — YourName"` (use your name) |
| `<img>` | `"galleryImg"` | A placeholder image using `https://picsum.photos/300/200?random=1` as `src`, with `alt="Gallery Image"` |
| `<p id="caption">` | `"caption"` | Default text: `"Default Image"` |
| `<button>` | `"hideBtn"` | "Hide Image" |
| `<button>` | `"showBtn"` | "Show Image" |
| `<button>` | `"toggleBtn"` | "Toggle Image" |
| `<button>` | `"fadeBtn"` | "Fade Toggle" |
| `<button>` | `"slideBtn"` | "Slide Toggle" |
| `<button>` | `"changeImg"` | "Change Image" |
| `<ul id="captionList">` | `"captionList"` | Start with 3 `<li>` items: `"Image 1"`, `"Image 2"`, `"Image 3"` |
| `<input>` | `"captionInput"` | Text input for new caption |
| `<button>` | `"addCaptionBtn"` | "Add Caption" |
| `<button>` | `"removeCaptionBtn"` | "Remove Last Caption" |
| `<button>` | `"highlightBtn"` | "Highlight Captions" |
| `<button>` | `"resetBtn"` | "Reset Captions" |

**jQuery Behaviour (inside `$(document).ready()`):**

1. **Hide Image** — call `.hide(600)` on the image
2. **Show Image** — call `.show(600)` on the image
3. **Toggle Image** — call `.toggle(400)` on the image
4. **Fade Toggle** — call `.fadeToggle(800)` on the image
5. **Slide Toggle** — call `.slideToggle(500)` on the image
6. **Change Image** — change `src` to `https://picsum.photos/300/200?random=2` and update `#caption` text to `"Image changed at: " + current time`
7. **Add Caption** — read value from `#captionInput`, `.append()` a new `<li>` with that text to `#captionList`
8. **Remove Last Caption** — remove the last `<li>` using `li:last`
9. **Highlight Captions** — set all `<li>` elements' background to `"lightblue"` and padding to `"8px"`
10. **Reset Captions** — replace `#captionList` HTML back to the original 3 items

### The Personalized Twist

- The **page title** (`<title>`) must be: `"3I-Q1 — Student" . A . B . C`
  (e.g., A=8, B=5, C=15 → "3I-Q1 — Student8515")
- The **initial caption text** in `#caption` must be: `"Student" . D . "'s Gallery"`
  (e.g., D=2 → "Student2's Gallery")
- The **placeholder** for `#captionInput` must be: `"Caption (min " . (D+2) . " chars)"`
  (e.g., D=2 → "Caption (min 4 chars)")
- The **default image alt text** must be: `"Photo-" . A . "-" . B`
  (e.g., A=8, B=5 → "Photo-8-5")

### What to Submit (`3I-q1.html`)

- A single self-contained HTML file with inline `<style>` and `<script>` (jQuery from CDN)
- All 10 buttons wired up with jQuery event handlers
- jQuery UI is **not** required for this question (plain jQuery only)

**Expected behaviour:**

```
Initial state: Image visible, caption shows "Student2's Gallery", 3 list items
Click "Hide Image"    -> Image fades away over 600ms
Click "Show Image"    -> Image reappears over 600ms
Click "Fade Toggle"   -> Image fades out/in over 800ms
Click "Slide Toggle"  -> Image slides up/down over 500ms
Type "Sunset" in input, click "Add Caption" -> <li>Sunset</li> added to list
Click "Remove Last"   -> Last <li> removed
Click "Highlight"     -> All captions get lightblue background
Click "Reset"         -> List returns to original 3 items
```

---

## Question 3I-Q2: Task Manager with jQuery UI Widgets

**Scenario:** A simple task management dashboard needs jQuery UI widgets for date-based task scheduling and dialog-based task details. The page must also support adding/removing tasks with visual effects.

### Task

Create a single **HTML file** `3I-q2.html` that uses both **jQuery** and **jQuery UI** (loaded from CDN).

**HTML Structure:**

| Element | ID | Description |
|---------|-----|-------------|
| `<h1>` | — | Title: `"Task Manager — YourName"` |
| `<input>` | `"taskInput"` | Text input for new task name |
| `<input>` | `"dateInput"` | Date picker input (turned into jQuery UI datepicker) |
| `<button>` | `"addTaskBtn"` | "Add Task" |
| `<button>` | `"clearBtn"` | "Clear All Tasks" |
| `<ul id="taskList">` | `"taskList"` | Starts with 3 sample tasks: `"Task A"`, `"Task B"`, `"Task C"` |
| `<div id="taskDialog">` | `"taskDialog"` | A hidden div with title `"Task Details"` containing a `<p id="dialogContent">` |
| `<p id="totalTasks">` | `"totalTasks"` | Shows: `"Total tasks: 3"` (updates dynamically) |

**jQuery + jQuery UI Behaviour (inside `$(document).ready()`):**

1. **Datepicker** — Call `.datepicker()` on `#dateInput`, set the `dateFormat` to `"dd-mm-yy"`
2. **Add Task** — On click:
   - Read task name from `#taskInput` and date from `#dateInput`
   - If task name is empty, show a **jQuery UI dialog** with title `"Error"` and text `"Task name cannot be empty!"`
   - Otherwise, `.append()` a new `<li>` with text format: `"TASK_NAME (Due: DATE)"` to `#taskList`
   - The new `<li>` should **fade in** over 500ms (hint: hide it first with `.hide().appendTo(...).fadeIn(500)` or similar)
   - Clear the inputs and update `#totalTasks` text
3. **Clear All Tasks** — On click:
   - Show a **jQuery UI dialog** with title `"Confirm"` and message `"Delete all X tasks?"`
   - Add "OK" and "Cancel" buttons to the dialog (use jQuery UI dialog's `buttons` option)
   - On OK: empty `#taskList` with `.slideUp(400)` effect, then update `#totalTasks`
   - On Cancel: close the dialog
4. **Double-click on a task** (`<li>`) — Show the `#taskDialog` as a modal dialog with:
   - Title: `"Task: TASK_NAME"`
   - Content: `"Task: TASK_NAME\nAdded on: current_date\nStatus: Pending"`
   - Use jQuery UI `.dialog("open")`
5. **Remove task** — Click on a task's delete span/button (add a `<span class="delete">[x]</span>` to each `<li>`) — remove the parent `<li>` with `.fadeOut(300, function() { $(this).remove(); })` and update `#totalTasks`
6. **Total tasks counter** — After any add/remove, update `#totalTasks` to show `"Total tasks: N"`

### The Personalized Twist

- The **page title** (`<title>`) must be: `"3I-Q2 — " . (A+B) . "_" . (C+D)`
  (e.g., A=8, B=5, C=15, D=2 → "3I-Q2 — 13_17")
- The **3 default tasks** must be:
  - Task 1: `"Task-" . A)` (e.g., A=8 → "Task-8")
  - Task 2: `"Task-" . B)` (e.g., B=5 → "Task-5")
  - Task 3: `"Task-" . C)` (e.g., C=15 → "Task-15")
- The **dateInput placeholder** must be: `"DD-MM-YYYY (hint: " . (A+1) . "-0" . (B%9+1) . "-2026)"`
  (e.g., A=8, B=5 → "DD-MM-YYYY (hint: 9-06-2026)")
- The **add button text** must be: `"Add Task " . D` (e.g., D=2 → "Add Task 2")

### What to Submit (`3I-q2.html`)

- A single self-contained HTML file with inline `<style>` and `<script>`
- Load **jQuery** and **jQuery UI** (CSS + JS) from CDN
- All 6 interactive features working: datepicker, add task with fade-in, clear with confirm dialog, double-click detail dialog, individual delete with fade-out, live counter

**Expected behaviour:**

```
Initial: 3 tasks visible, datepicker shows calendar on click, total = 3
Type "Homework" in input, pick a date from datepicker, click "Add Task 2"
  -> <li>Homework (Due: 15-07-2026)</li> fades into list, total = 4
Double-click a task -> Modal dialog appears with task details
Click [x] on a task -> Task fades out, total = 3
Click "Clear All Tasks" -> Confirm dialog appears
  -> OK: all tasks slide up and disappear, total = 0
  -> Cancel: nothing changes
```
