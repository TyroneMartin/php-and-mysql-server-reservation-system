# Overview
### Hotel Reservation System

A simple web-based hotel reservation system built with PHP and MySQL.

### Demo
[Software Demo Video](https://youtu.be/80qK6fO844k)

### Project Structure
```
hotel-reservation-system/
│
├── public/
│   ├── index.php
│   ├── .htaccess
│   └── assets/             # Static files - Not yet implemented in this project
│       ├── css/            
│       │   └── main.css
│       ├── js/           
│       │   └── main.js
│       └── images/        
│
├── includes/
│   ├── config.php
│   ├── database.php
│   └── functions.php
│
├── vendor/           # Created by Composer
├── .env             # Environment variables
├── composer.json    # Composer dependencies
└── README.md
```

## Setup

1. Clone the repository
2. Set up your local web server (Apache/XAMPP/WAMP/MAMP)
3. Install Composer:
   - Uninstall any existing Composer from Control Panel → Programs and Features
   - Download the latest installer from [getcomposer.org/download](https://getcomposer.org/download/)
   - Verify installation by running:
     ```
     composer --version
     ```
4. Install project dependencies:
   ```bash
   composer require vlucas/phpdotenv
   ```
5. Create `.env` file in project root with your database credentials:
   ```
   DB_HOST=localhost
   DB_NAME=hotel_reservation
   DB_USER=your_username
   DB_PASSWORD=your_password
   ```
6. Start the web server
   - Open XAMPP Control Panel after installation
   - Start Apache and MySQL services
   - Verify green lights appear next to both services
7. Access the website through your local server: 
   ```
   http://localhost/php-and-mysql-server-reservation-system/public/index.php
   ```

## Troubleshooting

### MySQL Port Issues

If MySQL won't start due to port conflicts:

1. Check for processes using port 3306:
   ```bash
   # Windows (Command Prompt as Administrator)
   netstat -ano | findstr :3306
   ```

2. Change MySQL Port in XAMPP:
   - Open XAMPP Control Panel
   - Click Config (next to MySQL) > my.ini
   - Find and edit the port line:
     ```ini
     # From
     port=3306
     # To
     port=3307
     ```
   - Save the file and restart MySQL
   - Update your `.env` file with the new port:
     ```
     DB_HOST=localhost:3307
     ```

## Development Environment

- XAMPP/WAMP/MAMP - Local development server
- Visual Studio Code - Code Editor
- Git - Version control system
- Composer - PHP dependency manager

## Tech Stack

- PHP 7.4+ - Server-side scripting language
- MySQL 5.7+ - Relational database management system
- HTML5 - Structure
- CSS3 - Styling
- JavaScript - Client-side functionality
- Composer - Dependency management

## Features

- Single-page hotel reservation form
- Customer information collection
- Address management
- Reservation booking system
- Data validation
- Secure database operations
- Environment variable management with dotenv

## Database Structure

- Customers table (personal information)
- Addresses table (location details)
- Reservations table (booking information)

## Requirements

- Web server (Apache recommended)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web browser with JavaScript enabled
- Composer

## Useful Websites

Choose a web server that supports PHP and MySQL:
* [XAMPP](https://www.apachefriends.org/)
    - [Video Tutorial](https://www.youtube-nocookie.com/embed/h6DEDm7C37A)
* [Apache](https://httpd.apache.org/)
* [WAMP](https://sourceforge.net/projects/wampserver/)
* [MAMP](https://www.mamp.info/en/windows/)

Development tools:
* [Visual Studio Code](https://code.visualstudio.com/)
* [Composer](https://getcomposer.org/download/)
* [Git](https://git-scm.com/downloads)

## Time Spent

* 25-30 hours