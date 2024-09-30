# ITHelpDesk System README

## Overview
The ITHelpDesk system is a web-based ticket management application built using CodeIgniter 4. It allows users to submit IT support requests and provides a streamlined interface for support staff to manage and respond to those requests.

## Prerequisites

- **XAMPP**: Ensure you have XAMPP installed. You can download it from [Apache Friends](https://www.apachefriends.org/index.html).

## Installation Steps

### Step 1: Set Up XAMPP

1. **Start XAMPP**: Open the XAMPP Control Panel and start the Apache and MySQL services.

### Step 2: Set Up the Project

1. **Move CodeIgniter**: Place the `ITHelpDesk` folder in the `htdocs` directory of your XAMPP installation (usually located at `C:\xampp\htdocs\`).

### Step 3: Create Database

1. Open your browser and navigate to `http://localhost/phpmyadmin`.
2. Click on the "Databases" tab and create a new database named `ithelpdesk`.
3. Import the database structure:
   - Use the provided SQL file located in the `ITHelpDesk/sql` directory (e.g., `ithelpdesk.sql`).

### Step 4: Configure the Application

1. **Base URL**:
   - Open `app/Config/App.php`.
   - Set the `baseURL`:
     ```php
     public $baseURL = 'http://localhost/ITHelpDesk/';
     ```

2. **Database Configuration**:
   - Open `app/Config/Database.php`.
   - Update the database settings:
     ```php
     public $default = [
         'DSN'      => '',
         'hostname' => 'localhost',
         'username' => 'root', // Default XAMPP username
         'password' => '',     // Default XAMPP password (leave empty)
         'database' => 'ithelpdesk',
         'DBDriver' => 'MySQLi',
         'DBPrefix' => '',
         'pConnect' => false,
         'DBDebug'  => (ENVIRONMENT !== 'production'),
         'cacheOn'  => false,
         'cachedir' => '',
         'charSet'  => 'utf8',
         'DBCollat' => 'utf8_general_ci',
         'swapPre'  => '',
         'encrypt'  => false,
         'compress'  => false,
         'strictOn'  => false,
         'failover'  => [],
         'saveQueries' => true
     ];
     ```



### Step 5: Access the Application

1. Open your browser and go to `http://localhost/ITHelpDesk/`.
2. You should see the home page of the ITHelpDesk application.

## Features

- User registration and login
- Submit IT support tickets
- View ticket status and history
- Admin dashboard for ticket management
- Notifications for ticket updates

## Troubleshooting

- **Error 404**: Ensure the URL is correct and that Apache is running.
- **Database Connection Error**: Double-check your database configuration in `Database.php`.

---

Feel free to reach out if you have any questions or issues!
