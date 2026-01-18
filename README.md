# 📊 SaleWise – SME Sales Management System

SaleWise is a web-based sales recording and analytics system developed to help Small and Medium Enterprises (SMEs) replace manual bookkeeping with a secure, database-driven solution.


## 🚀 Project Overview

Traditional sales tracking using notebooks and spreadsheets often leads to:
- Calculation errors  
- Scattered data  
- Time-consuming reporting  
- No real-time performance visibility  

SaleWise digitises the entire process by centralising sales data into a MySQL database and providing automated analytics through a PHP web application.


## 🧩 Key Features

### 🔐 Authentication
- User registration and login  
- Password hashing & verification  
- Session-based access control  

### 💰 Sales Management (CRUD)
- Add, edit, delete and view sales  
- Input validation  
- Secure database storage  

### 📈 Dashboard Analytics
- Total revenue  
- Number of transactions  
- Average sales value  
- Top-selling products  
- Recent sales overview  

### 📤 Export Function
- Download sales records as CSV  
- Filtered export  
- Auto total revenue row  


## 🛠 Technologies Used
- HTML5  
- CSS3  
- JavaScript  
- PHP 8  
- MySQL  
- Apache (XAMPP)


## ⚙️ Installation Guide

1. Install **XAMPP** or **WAMP**
2. Start **Apache** and **MySQL**
3. Open **phpMyAdmin**
4. Create a database named `salewise`
5. Import `salewise_db.sql`
6. Copy the project folder into `/htdocs`
7. Access in browser: http://localhost/salewise


## 🗄 Database Schema

### Table: `users`
| Field       | Type         | Description |
|------------|--------------|-------------|
| id         | INT (PK)     | User ID (auto increment) |
| username   | VARCHAR(50)  | Unique login name |
| password   | VARCHAR(255) | Hashed password |
| created_at | TIMESTAMP    | Account creation time |

### Table: `sales`
| Field       | Type           | Description |
|------------|----------------|-------------|
| id         | INT (PK)       | Sale ID |
| product    | VARCHAR(100)   | Product name |
| category   | VARCHAR(100)   | Product category |
| amount     | DECIMAL(10,2)  | Sale amount |
| created_at | TIMESTAMP      | Date of transaction |


## 🎯 Purpose

This project demonstrates a secure full-stack web application that solves SME sales tracking problems through authentication, CRUD operations, automated analytics, and exportable reporting.
