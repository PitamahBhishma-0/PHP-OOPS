# Topic 3J  Lab Questions

---

## Question 3J-Q1: Install Joomla Locally

**Scenario:** You need to set up a Joomla CMS site locally for practice, from download to a working frontend and backend.

### Task

Install Joomla following these steps,

1. **Start the local server** (XAMPP/WAMP/LAMP): start Apache and MySQL
2. **Create a database** in phpMyAdmin:
   - Name: `joomla_db'
   - Collation: `utf8mb4_general_ci`
3. **Download & extract Joomla:**
   - Download the latest `.zip` from https://www.joomla.org/download.html
   - Extract into the web root as `htdocs/joomla/` (XAMPP) or `/var/www/html/joomla/` (LAMP)
4. **Database configuration screen:**
   - Database Type: `MySQLi`
   - Host Name: `localhost`
   - Username: `root`
   - Password: *(blank on default XAMPP)*
   - Database Name: `joomla_db`
5. **Finalise:** review the overview screen, click **Install**
6. **Remove the `/installation` folder** (Joomla refuses to run otherwise)

### What to Submit
- Screenshot of the Joomla installer **overview** screen
- Screenshot of the Joomla **frontend** (`http://localhost/joomla`)
- Screenshot of the Joomla **backend login** (`http://localhost/joomla/administrator`)
- Short answer: *What is the role of `configuration.php`?*

**Expected result**
- Database `joomla` created
- Backend login page loads at `/administrator`

---
