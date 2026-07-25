-- =============================================
-- Shared Database Setup — Unit 2 Lab (Modules 2G–2K)
-- Run this ONCE before starting Topics 2G through 2K
-- =============================================

CREATE DATABASE IF NOT EXISTS lab_mysql;
USE lab_mysql;

-- =============================================
-- Table: students  (used in 2G, 2H, 2I, 2J, 2K)
-- =============================================
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    major VARCHAR(30)
);

-- =============================================
-- Table: grades  (used in 2K — Joins)
-- =============================================
CREATE TABLE IF NOT EXISTS grades (
    student_id INT,
    course VARCHAR(50),
    grade CHAR(1),
    FOREIGN KEY (student_id) REFERENCES students(id)
);

-- =============================================
-- Table: scholarships  (used in 2J — Subqueries)
-- =============================================
CREATE TABLE IF NOT EXISTS scholarships (
    student_id INT PRIMARY KEY,
    amount DECIMAL(10,2),
    FOREIGN KEY (student_id) REFERENCES students(id)
);
