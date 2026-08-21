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

### The Personalized Twist
- Database name must be `joomla_<A><B><C><D>`
- Site name and admin email use your `A`
- Admin username uses `A` and `B`
- Admin password minimum length is `8 + D`
- Table prefix is `j<A><B><C><D>_`

### What to Submit
- Screenshot of the Joomla installer **overview** screen
- Screenshot of the Joomla **frontend** (`http://localhost/joomla`)
- Screenshot of the Joomla **backend login** (`http://localhost/joomla/administrator`)
- Short answer: *What is the role of `configuration.php`?*

**Expected result (with A=8, B=5, C=0, D=3):**
- Database `joomla_8503` created
- Site name `TU BCA Student8 Site` visible on the frontend
- Backend login page loads at `/administrator`

---

## Question 3J-Q2: Verify Installation & Explore Backend

**Scenario:** Confirm your Joomla install is complete and functional by checking the generated files and logging into the backend.

### Task

1. In the `joomla/` folder, open `configuration.php` and note:
   - the `$db` (database) name
   - the `$dbprefix` value
2. Confirm the `/installation` folder has been removed
3. Log in to the backend at `http://localhost/joomla/administrator` with your admin credentials
4. Navigate to **System → Global Configuration** and note the site name
5. Create one article under **Content → Articles → New**:
   - Title: `"Welcome Student" + A`
   - Category: `Uncategorized`
   - Body: one short paragraph
6. View the article on the frontend

### The Personalized Twist
- The article title uses your `A` value
- Report your actual `$dbprefix` (e.g., `j8503_`)

### What to Submit
- Screenshot of the backend **Control Panel** after login
- Screenshot of the article you created (backend edit screen or frontend view)
- Note the `$db` name and `$dbprefix` from `configuration.php`

**Expected result (with A=8, B=5, C=0, D=3):**
- `configuration.php` shows `$db = 'joomla_8503'` and `$dbprefix = 'j8503_'`
- Backend control panel loads with your site name
- Article `Welcome Student8` is visible on the frontend
