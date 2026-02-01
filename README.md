# SmartStock-Inventory-Management-System
Web-based inventory and sales management system built with PHP and MySQL, featuring multi-user authentication, stock level monitoring, sales tracking, and business-oriented reporting.

📦 SmartStock – Inventory & Sales Management System

SmartStock is a web-based inventory and sales management system designed to help small and medium-sized businesses track warehouse stock, monitor sales, and manage products efficiently. The system supports multiple users, ensuring that each business operates with isolated and secure data.

This project was developed as an Engineering Project for an IT in Business program and focuses on real-world business automation.

🚀 Features

User registration and secure login system

Multi-user data isolation (each user has their own products and sales)

Product management (add, edit, delete)

Automatic stock reduction when products are sold

Stock status classification (High / Medium / Low)

Low stock warning system

Sales history tracking

Permanent archive of sold products

Sales reports with total revenue and items sold

Professional and responsive user interface

🛠️ Technologies Used

Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

Server: Apache (XAMPP)

🧩 System Architecture

The application follows a three-tier architecture:

Presentation Layer – User interface built with HTML and CSS

Business Logic Layer – PHP scripts handling application logic

Data Layer – MySQL database storing users, products, and sales data

All business logic is filtered using user sessions to ensure data security and separation.

🗄️ Database Structure

Main database tables:

users – stores registered users

products – inventory items per user

sales – transaction records

sold_products – permanent sales archive

This design ensures historical sales data remains available even after products are deleted.

🧪 Testing

Manual functional testing

Multi-user testing

Validation of stock calculations

Sales and reporting verification

📈 Business Value

SmartStock helps businesses:

Reduce manual inventory errors

Prevent stock shortages

Maintain accurate sales records

Improve operational efficiency

Support data-driven decisions

🔮 Future Improvements

Sales analytics and charts

Export reports to PDF or Excel

Role-based access control

Barcode scanner integration

Mobile-responsive enhancements

👤 Author

Naimkhon Ishonboboev
IT in Business Student
