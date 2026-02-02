# SmartStock – Inventory, Sales & Profit Management System

SmartStock is a web-based inventory and sales management system designed to help small and medium-sized businesses efficiently manage warehouse stock, sales transactions, and profit analysis.

The system automates stock tracking, alerts users when products are running low, calculates profits and losses, and maintains permanent sales and profit history per user.

---

## Features

- User registration and login (multi-user system)
- User-isolated data (each user sees only their own products and reports)
- Product management (add, edit, delete)
- Warehouse stock tracking with automatic quantity updates
- Stock status indicators (High / Medium / Low)
- Low stock warning system
- Sales processing with custom selling price
- Permanent sales history (even if products are deleted)
- Profit and loss calculation per sale
- Profit history with:
  - Total Profit
  - Total Loss
  - Net Result
- Professional dashboard UI
- Secure session-based authentication

---

##  Technologies Used

- PHP (Backend logic)
- MySQL / MariaDB (Database)
- HTML5
- CSS3 (Custom professional UI)
- JavaScript (Minor interactions)
- XAMPP (Local development environment)
- Git & GitHub (Version control)

---

##  Project Structure



SmartStock/
│
├── css/
│ └── style.css
│
├── includes/
│ ├── db.php
│ └── auth.php
│
├── index.php
├── login.php
├── register.php
├── logout.php
├── add_product.php
├── edit_product.php
├── sell_product.php
├── sales_history.php
├── profit_history.php
├── total_sales.php
└── README.md


---

##  Database Setup

1. Create a database named `smartstock`
2. Import the provided SQL tables:
   - users
   - products
   - sales
   - sold_products
   - profit_records
3. Update database credentials in `includes/db.php`

---

##  How to Run the Project

1. Install XAMPP
2. Place the project folder inside `htdocs`
3. Start Apache & MySQL
4. Open browser and visit:


http://localhost/SmartStock

5. Register a new user and start using the system

---

##  Academic Purpose

This project was developed as a final engineering project for an IT in Business program.  
It demonstrates practical application of software development in business process automation, inventory management, financial analysis, and system design.

---

##  Author

**Naimkhon Ishonboboev**  
IT in Business Student  
WSB Merito University

---
