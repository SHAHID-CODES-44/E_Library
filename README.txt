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
E_Library/
E_Library/
│
├── 📁 imagesbooks/                 # Folder containing book images
│   └── bg.index.png               # Background image
│
├── 📄 admin_ui.php                # Admin dashboard displaying all bookings
├── 📄 approve.php                 # Deletes booking when approved (acts as approval)
├── 📄 reject.php                  # Deletes booking when rejected
├── 📄 admin_ui.css                # Styling for admin panel
│
├── 📄 Sdashboard.php              # Student dashboard UI
├── 📄 Slogin.php                  # Student login page
├── 📄 Ssignup.php                 # Student signup/registration page
│
├── 📄 Adashboard.php              # Admin login redirection dashboard
├── 📄 Alogin.php                  # Admin login page
│
├── 📄 booklist.php                # Page displaying all books
├── 📄 handle_req.php              # Handles booking requests
├── 📄 index.php                   # Homepage
│
├── 📄 about.php                   # About the Library page
├── 📄 about.css                   # Styling for about page
│
├── 📄 premium.php                 # Premium features/info (optional)
├── 📄 premium.css                 # Styling for premium page
│
├── 📄 report.php                  # Admin reports (optional analytics)
├── 📄 report.css                  # Styling for report page
│
├── 📄 student_ui.php              # UI for student to see own bookings
├── 📄 student_ui.css              # Styling for student UI
│
├── 📄 style.css                   # Main CSS styling (global)
├── 📄 script.js                   # JavaScript file (if any dynamic functionality)
│
├── 📄 d_b.php                     # Database connection file
│
├── 📄 README.md                   # Project description (Markdown)
└── 📄 README.txt                  # Optional README (plain text)

📌 How to Run the Project:

Clone or download this repository.

Import library.sql into your MySQL (phpMyAdmin or terminal).

Make sure XAMPP is running. Place the folder in htdocs.

Access:

Student: http://localhost/E_Library/index.php

Admin: http://localhost/E_Library/admin_ui.php

📢 Final Note:
This project is ideal for IT/BCA students looking to understand how PHP and MySQL work in real web applications. Feel free to fork and improve it!

