# Topic 3M  Lab Questions

---

## Question 3M-Q1: Install WordPress Locally

**Scenario:** Set up a WordPress site locally, from download to the admin dashboard.

### Task

Install WordPress following these steps, using YOUR `A, B, C, D` values.

1. **Start the local server** (XAMPP/WAMP/LAMP): Apache + MySQL
2. **Create a database** in phpMyAdmin:
   - Name: `wp_<A><B><C><D>` (e.g., A=8, B=5, C=0, D=3 → `wp_8503`)
   - Collation: `utf8mb4_general_ci`
3. **Download & extract WordPress** from https://wordpress.org/download/
   - Extract into `htdocs/wordpress/` (XAMPP) or `/var/www/html/wordpress/` (LAMP)
4. **Run the installer** at `http://localhost/wordpress`:
   - Select your language
   - Database Name: `wp_<A><B><C><D>`
   - Username: `root`, Password: *(blank on default XAMPP)*, Host: `localhost`
   - Table Prefix: `wp<A><B><C><D>_` (e.g., `wp8503_`)
5. **Site details:**
   - Site Title: `Student<A> Blog`
   - Username: `admin<A>`
   - Password: at least `8 + D` characters
   - Email: `student<A>@example.com`
6. Click **Install WordPress**, then **Log In**

### The Personalized Twist
- Database name `wp_<A><B><C><D>`
- Table prefix `wp<A><B><C><D>_`
- Site title and admin username use `A`
- Password minimum length `8 + D`

### What to Submit
- Screenshot of the WordPress admin dashboard (`http://localhost/wordpress/wp-admin`)
- Screenshot of the frontend (`http://localhost/wordpress`)
- Short answer: *What is the WordPress equivalent of Joomla's `configuration.php`?*

**Expected result (with A=8, B=5, C=0, D=3):**
- Frontend shows `Student8 Blog`
- `wp-admin` dashboard loads
- `wp-config.php` exists in the `wordpress/` folder

---

## Question 3M-Q2: Administrator Tasks — Theme, Page, Post, Widget

**Scenario:** Apply the core administrator tasks after installing WordPress.

### Task

1. **Theme:** Appearance → Themes → activate a default theme (e.g., Twenty Twenty-Four)
2. **Page:** Pages → Add New → create a page:
   - Title: `"About Us"`
   - Content: one paragraph
   - Publish
3. **Post:** Posts → Categories → add category `"Announcements"`
   - Posts → Add New → Title: `"Semester Routine for Student" + A`
   - Assign the category, add a tag `"batch" + B`
   - Publish
4. **Widget:** Appearance → Widgets → add a `Search` widget (and/or `Recent Posts`) to the sidebar/footer area

### The Personalized Twist
- The post title uses your `A` value
- The tag uses your `B` value (e.g., `batch5`)

### What to Submit
- Screenshot of the activated theme (Appearance → Themes)
- Screenshot of the "About Us" page
- Screenshot of the published post showing its category and tag
- Screenshot of the widget in the sidebar/footer

**Expected result (with A=8, B=5):**
- Theme activated
- `About Us` page and `Semester Routine for Student8` post visible on the frontend
- `Search` widget visible in the sidebar/footer
