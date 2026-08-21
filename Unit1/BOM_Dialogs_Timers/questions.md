# BOM: Dialogs & Timers — Lab Question

---

## Question Q1: Welcome & Countdown

**Scenario:** A page that greets the visitor using BOM dialogs, then runs a short countdown using timers.

### Task

Create `bom-q1.html` with an internal `<script>` that:

1. Declares `const A, B, C, D` with your values
2. Uses `prompt()` to ask for the visitor's name and store it in a variable
3. Uses `alert()` to show: `"Welcome " + name + ", Student" + A`
4. Uses `confirm()` to ask: `"Do you want to start a " + B + " second countdown?"`
   - If `true`, start the countdown (step 5)
   - If `false`, `alert("Countdown cancelled")`
5. Uses `setInterval` to print a countdown from `B` down to `0` in the console, then `clearInterval`:

   ```js
   let count = B;
   let timer = setInterval(() => {
       console.log("Countdown: " + count);
       count--;
       if (count < 0) {
           console.log("Done! (C=" + C + ", D=" + D + ")");
           clearInterval(timer);
       }
   }, 1000);
   ```

6. Prints browser info:
   - `window.location.href`
   - `window.navigator.userAgent`
   - `window.screen.width + " x " + window.screen.height`

### The Personalized Twist
- The alert greeting uses your `A` value
- The countdown length is your `B` value (in seconds)
- The `Done!` message includes your `C` and `D` values

### What to Submit
- `bom-q1.html`

**Expected behavior (with A=8, B=5, C=0, D=3):**
- A prompt asks for the name
- An alert shows `Welcome <name>, Student8`
- A confirm asks about a `5` second countdown
- The console prints `Countdown: 5`, `4`, `3`, `2`, `1`, `0`, then `Done! (C=0, D=3)`
- The console prints the page URL, browser user agent, and screen size
