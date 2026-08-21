# Topic 3M  Lab Questions

---

## Question 3M-Q1: Install WordPress Locally

**Scenario:** Set up a WordPress site locally, from download to the admin dashboard.

### Task

1. **Start the local server** (XAMPP/WAMP/LAMP): Apache + MySQL
2. **Create a database** in phpMyAdmin:
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

### What to Submit
- Screenshot of the WordPress admin dashboard (`http://localhost/wordpress/wp-admin`)
- Screenshot of the frontend (`http://localhost/wordpress`)
- Short answer: *What is the WordPress equivalent of Joomla's `configuration.php`?*
---
