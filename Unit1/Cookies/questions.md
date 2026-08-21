# Cookies — Lab Question

---

## Question Q1: Remember My Name

**Scenario:** A page that stores the visitor's name in a cookie, reads it back, and can delete it.

### Task

Create `cookies-q1.html` with an internal `<script>` that:

1. Declares `const A, B, C, D` with your values
2. **Set a cookie** named `student` with value `"Student" + A`, expiring in `B` days:

   ```js
   let d = new Date();
   d.setTime(d.getTime() + (B * 24 * 60 * 60 * 1000));
   document.cookie = "student=Student" + A + "; expires=" + d.toUTCString() + "; path=/";
   ```

3. **Read** all cookies with `document.cookie` and print them
4. **Set a second cookie** `visits` with value `C + D` and path `/`
5. Print `document.cookie` again
6. **Delete** the `student` cookie by setting its expiry to a past date:

   ```js
   document.cookie = "student=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
   ```

7. Print `document.cookie` after deletion

### The Personalized Twist
- The cookie value uses your `A` value
- The expiry days use your `B` value
- The `visits` cookie value is `C + D`

### What to Submit
- `cookies-q1.html`

**Expected result (with A=8, B=5, C=0, D=3):**
- After step 3, the console shows `student=Student8`
- After step 5, the console shows `student=Student8; visits=3`
- After step 7, the console shows only `visits=3` (the `student` cookie is gone)
