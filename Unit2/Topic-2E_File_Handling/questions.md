# Topic 2E  Lab Questions

---

## Question 2E-Q1: Visitor Log & Guestbook

**Scenario:** A website wants to log every visitor's name and timestamp to a text file, then display all past visitors.

### Task

Create a single PHP file `2E-q1.php` that:

#### Part A: Form

Display a simple form with:
- Input field: `name` (text)
- Input field: `message` (textarea)
- Submit button text: `"Sign Guestbook " . A` (e.g., "Sign Guestbook 8")
- Hidden field `action` = `"sign"`

#### Part B: Sign the Guestbook (when form submitted)

1. Check if `$_POST['action'] === "sign"`
2. Get the name (sanitize with `htmlspecialchars()`)
3. Validate: if name is empty, show `"Error: Name is required!"`
4. Append to file `"guestbook-" . A . ".txt"` in format:
   ```
   [YYYY-MM-DD HH:MM:SS] NAME wrote: MESSAGE
   ```
   Use `date("Y-m-d H:i:s")` for the timestamp.
   Use `file_put_contents()` with `FILE_APPEND | LOCK_EX` flags.
5. Display: `"Thank you, NAME! Your message has been recorded."`

#### Part C: Display Guestbook (always shown below the form)

1. Check if the guestbook file exists using `file_exists()`
2. If it exists, read it with `file_get_contents()`
3. Display contents inside `<pre>` tags
4. If file doesn't exist, show: `"No entries yet. Be the first to sign!"`
5. Count and display number of lines: `"Total entries: X"`

### The Personalized Twist

- Submit button text uses `A`
- Guestbook filename uses `A`: `"guestbook-" . A . ".txt"`
- Timestamp format should use your `B` value for the year offset:  
  `date("Y-m-d H:i:s")` but add `B` to the year: `date("Y") + B`
  (e.g., 2026 + 5 = 2031)

### What to Submit (`2E-q1.php`)

A single self-processing PHP file.

**Expected behaviour:**

```
Initial load: Form shown, "No entries yet" message.
Submit with name="Student8", message="Hello World":
  -> "Thank you, Student8! Your message has been recorded."
  -> File guestbook-8.txt now contains:
     [2031-07-25 14:30:00] Student8 wrote: Hello World
  -> "Total entries: 1"
```

---

## Question 2E-Q2: File Upload Dashboard

**Scenario:** An admin tool allows uploading text files and viewing their contents. The system also maintains a log of all uploads.

### Task

Create a PHP file `2E-q2.php` that:

#### Part A: Upload Form

- `enctype="multipart/form-data"`
- File input: `text_file` (accept `.txt` only)
- Submit button text: `"Upload File " . D` (e.g., "Upload File 3")
- Hidden field: `MAX_FILE_SIZE` = `102400` (100KB)

#### Part B: Handle Upload

1. Check if form submitted
2. Read `$_FILES['text_file']`
3. Validate:
   - If `upload_error` != 0, show error: `"Upload failed with error code: CODE"`
   - If file extension is not `.txt`, show: `"Only .txt files are allowed."`
   - Use `pathinfo($name, PATHINFO_EXTENSION)` to check
4. Create an `uploads/` directory if not exists (`is_dir` + `mkdir`)
5. Move file: `move_uploaded_file()` to `uploads/` with original name
6. Log the upload to `"upload-log-" . A . ".txt"`:
   ```
   [TIMESTAMP] Uploaded: FILENAME (SIZE bytes)
   ```
   (Use `date("Y-m-d H:i:s")` + B years, and `$_FILES['text_file']['size']`)

#### Part C: Display

1. Show the upload form at the top
2. Below the form, list **all uploaded files** in `uploads/`:
   - Use `scandir()` to read the directory
   - Skip `.` and `..`
   - Display each as: `"📄 FILENAME (SIZE bytes)"` using `filesize()`
   - If no files, show: `"No files uploaded yet."`
3. If a file was just uploaded successfully, read and display its contents inside `<pre>` with `htmlspecialchars()`

### The Personalized Twist

- Submit button uses `D`
- Log filename uses `A`: `"upload-log-" . A . ".txt"`
- Year offset = `B` (same as Q1)

### What to Submit (`2E-q2.php`)

A single self-processing PHP file that handles uploads.

**Expected behaviour:**

```
Select a .txt file and click "Upload File 3"
  -> File moved to uploads/
  -> Log entry added to upload-log-8.txt
  -> File contents displayed below form
  -> File list shows all previously uploaded files
```
