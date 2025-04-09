# Librus PHP

This project is a clone of the Librus app, implemented in PHP, JS, HTML, CSS.

## Project Structure

The project is divided into three main directories:

- `api/`: Contains PHP scripts for handling API requests. This includes scripts for user login, logout, registration, and data retrieval about rooms, schools, and users.

- `frontend/`: Contains UI and CSS styles for the frontend of the application. It includes modules for the head and navbar, as well as styles for the login page. The `sitemap.php` file is also located here.

- `internal/`: Contains common PHP scripts and configuration files. This includes the `common.php` script and configuration files for the database and school settings.

## Setup

1. Clone the repository into htdocs.
2. Import MySQL schema from dev folder.
3. Configure your database settings in [`internal/database.ini`](internal/database.ini) (default database from config is librus).
4. Go to localhost/librus-php/
5. Default user from schema is admin, with password 123

## Usage

- Register a new user at [`new_user.php`](new_user.php).
- Admin users can create new rooms visible on main page
- Admin users can update school settings at [`update_school.php`](update_school.php).
- Log in at [`login.php`](login.php).
- After logging in, you will be redirected to [`main_page.php`](main_page.php).

## Notes

### Frontend

The frontend of the application is built with HTML+CSS+JS. It includes a head module that sets up the metadata for the page and loads the necessary styles and scripts. The navbar module provides navigation throughout the application. RWD is implemented via bootstrap. Frontend communicates with API by AJAX request provided by JQuery. It occasionally uses PHP (rendering API routes).

### API

The API is built with PHP and handles all requests from the frontend. It includes scripts for user login, logout, registration, and data retrieval about rooms, schools, and users. Authorization is implemented via PHP sessions, obtained from login form with SHA hashing of passwords in DB. All persistent data is stored in MySQL database.

### Internal

The internal directory contains common PHP scripts and configuration files. The `common.php` script is used across the application for common functionality. The `database.ini` and `school.ini` files are used to configure the database and school settings respectively.
