# Online Voting System
This is an online voting system that allows users to vote for candidates in an election. It is a web-based application that can be accessed from anywhere with an internet connection. The system is designed to be user-friendly and easy to navigate, allowing voters to cast their ballots quickly and easily.

# Requirements
- Web server (Apache, Nginx, Xampp, dll.) 
- PHP 7.x
- MySQL

# Features
- User registration and login
- Candidate profiles with photos and descriptions
- Secure voting system with one vote per user
- Real-time vote counting and results display
- Admin dashboard for managing users and candidates

# Installation
- Clone the repository to your local machine.
- Create a new MySQL database for the application.
- Import the database schema from the vote_db.sql file.
- Configure the database connection settings in the assets/conn.php file.
- Upload the application files to your web server.

# Usage
- Users can register for an account and log in to the system using NISN and PASSWORD.
- user can view candidate profiles and select one candidate to vote.
- Once they have cast their vote, they cannot vote again.
- The system will display real-time results of the voting.
- Admin users can log in to the dashboard to see count of vote.

# Security
This application has been designed with security in mind. It includes several features to prevent unauthorized access and ensure the integrity of the voting process:

- Passwords are stored securely using bcrypt hashing.
- SQL injection and cross-site scripting (XSS) attacks are prevented using prepared statements and output escaping.
- Session data is stored securely in cookies with HTTP-only and secure flags.
- Only one vote is allowed per user.

# Tech
- PHP
- MySQL
- Bootstrap
