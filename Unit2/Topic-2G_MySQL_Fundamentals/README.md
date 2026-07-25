# Topic 2G  MySQL Fundamentals: Data Types, Connection, SHOW/DESCRIBE

## Key Concepts
- MySQL data types (INT, VARCHAR, DECIMAL, DATE)
- `mysqli_connect()` for PHP-MySQL connection
- `mysqli_query()` for executing SQL
- `mysqli_fetch_assoc()` / `mysqli_fetch_row()` for reading results
- `SHOW DATABASES`, `SHOW TABLES`, `DESCRIBE table`
- Connection error handling with `mysqli_connect_error()`

## Self-Study Reference
Review **[Module 2G](../studymaterial/Unit2_Server_Side_Scripting_Complete.md#module-2g)** in the study material before attempting these questions. Use the shared **[db_setup.sql](../db_setup.sql)** to create the database before starting.

## Database Setup
Before starting, run the shared setup:
```bash
mysql -u root < ../db_setup.sql
```
This creates the `lab_mysql` database and all required tables.
