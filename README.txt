🔹 Project Description:
This is a web-based library management system that allows students to book books online and enables administrators to manage those bookings through a simple admin panel. It's built using PHP, MySQL, HTML, CSS (Bootstrap), and basic SQL operations.

👤 Student Panel Features:

View available books

Book a book using Roll No and Department

Simple and clean user interface

🛠 Admin Panel Features:

View all student bookings

Approve bookings (just visual status change)

Reject bookings (delete from database)

Bootstrap UI with status indicators

🧰 Technologies Used:

PHP

MySQL

Bootstrap 5

HTML, CSS

Font Awesome Icons

📁 Project Structure:

pgsql
Copy
Edit
E_Library/
│
├── index.php                → Student book booking form
├── book_now.php             → Logic to insert booking
├── admin_ui.php             → Admin dashboard
├── approve_booking.php      → Approve (status update)
├── reject_booking.php       → Reject (delete booking)
├── view_booking.php         → Detailed view (optional)
├── /db/library.sql          → MySQL database export
├── /css/style.css           → Optional custom styling
├── /assets/logo.png         → Logo or images
├── README.txt               → This file
📌 How to Run the Project:

Clone or download this repository.

Import library.sql into your MySQL (phpMyAdmin or terminal).

Make sure XAMPP is running. Place the folder in htdocs.

Access:

Student: http://localhost/E_Library/index.php

Admin: http://localhost/E_Library/admin_ui.php

📢 Final Note:
This project is ideal for IT/BCA students looking to understand how PHP and MySQL work in real web applications. Feel free to fork and improve it!

