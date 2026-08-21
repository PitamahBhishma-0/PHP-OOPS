# Topic 3J  Lab Questions

---

## Question 3J-Q1: Install Joomla Locally

**Scenario:** You need to set up a Joomla CMS site locally for practice, from download to a working frontend and backend.

### Task

Install Joomla following these steps, using YOUR `A, B, C, D` values for the personalized settings.

1. **Start the local server** (XAMPP/WAMP/LAMP): start Apache and MySQL
2. **Create a database** in phpMyAdmin:
   - Name: `joomla_<A><B><C><D>`  (e.g., A=8, B=5, C=0, D=3 → `joomla_8503`)
   - Collation: `utf8mb4_general_ci`
3. **Download & extract Joomla:**
   - Download the latest `.zip` from https://www.joomla.org/download.html
   - Extract into the web root as `htdocs/joomla/` (XAMPP) or `/var/www/html/joomla/` (LAMP)
4. **Run the web installer** at `http://localhost/joomla`:
   - Site Name: `TU BCA Student<A> Site`
   - Admin Email: `student<A>@example.com`
   - Admin Username: `admin<A><B>`
   - Admin Password: at least `8 + D` characters (record it)
5. **Database configuration screen:**
   - Database Type: `MySQLi`
   - Host Name: `localhost`
   - Username: `root`
   - Password: *(blank on default XAMPP)*
   - Database Name: `joomla_<A><B><C><D>`
   - Table Prefix: set a custom prefix `j<A><B><C><D>_` (e.g., `j8503_`)
6. **Finalise:** review the overview screen, click **Install**
7. **Remove the `/installation` folder** (Joomla refuses to run otherwise)

### What to Submit
- Screenshot of the Joomla installer **overview** screen
- Screenshot of the Joomla **frontend** (`http://localhost/joomla`)
- Screenshot of the Joomla **backend login** (`http://localhost/joomla/administrator`)
- Short answer: *What is the role of `configuration.php`?*

**Expected result**
- Database `joomla_8503` created
- Site name `TU BCA Student8 Site` visible on the frontend
- Backend login page loads at `/administrator`

---
