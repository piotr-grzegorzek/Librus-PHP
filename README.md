# Librus PHP

This project is a clone of the Librus app, implemented in PHP.

## Project Structure

The project is divided into three main directories:

- `api/`: Contains PHP scripts for handling API requests. This includes scripts for user login, logout, registration, and data retrieval about rooms, schools, and users.

- `frontend/`: Contains PHP scripts and CSS styles for the frontend of the application. It includes modules for the head and navbar, as well as styles for the login page. The `sitemap.php` file is also located here.

- `internal/`: Contains common PHP scripts and configuration files. This includes the `common.php` script and configuration files for the database and school settings.

## Setup

1. Clone the repository.
2. Set up your PHP environment.
3. Configure your database settings in [`internal/database.ini`](internal/database.ini).
4. Configure your school settings in [`internal/school.ini`](internal/school.ini).
5. Run the application.

## Usage

- Register a new user at [`new_user.php`](new_user.php).
- Log in at [`login.php`](login.php).
- After logging in, you will be redirected to [`main_page.php`](main_page.php).
- Admin users can update school settings at [`update_school.php`](update_school.php).

## Notes

### Frontend

The frontend of the application is built with PHP and CSS. It includes a head module that sets up the metadata for the page and loads the necessary styles and scripts. The navbar module provides navigation throughout the application.

### API

The API is built with PHP and handles all requests from the frontend. It includes scripts for user login, logout, registration, and data retrieval about rooms, schools, and users.

### Internal

The internal directory contains common PHP scripts and configuration files. The `common.php` script is used across the application for common functionality. The `database.ini` and `school.ini` files are used to configure the database and school settings respectively.