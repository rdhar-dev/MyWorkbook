# MyWorkbook

## Overview

MyWorkbook is a Laravel-based web application designed to manage daily task records, data entry operations, updates, and report generation. The application provides an organized workflow for maintaining records and generating monthly reports in PDF format.

---

## Technology Stack

* PHP 8.2+
* Laravel Framework
* MySQL Database
* Composer
* Notepad++ / VS Code (Development Tools)

---

## Project Structure

### Resources Directory

The `resources` folder contains:

* Create form views
* Edit form views
* List views with filtering functionality
* PDF report templates and generation views

### Routes Directory

The `routes` folder contains route definitions for:

* Dashboard pages
* Data entry forms
* Record management
* Report generation
* PDF export functionality

### Controllers

Controllers handle the application's business logic, including:

* Record creation
* Data storage
* Record updates
* Data retrieval
* PDF generation
* Report processing

---

## Environment Configuration

Configure the application environment in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

## Installation

### Clone the Repository

```bash
git clone https://github.com/rdhar-dev/MyWorkbook.git
cd MyWorkbook
```

### Install Dependencies

```bash
composer install
```

### Configure Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

Update the database credentials in the `.env` file.

### Generate Application Key

```bash
php artisan key:generate
```

### Database Setup

Import the provided SQL file into MySQL or run Laravel migrations if available.

```bash
php artisan migrate
```

---

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

Access the application at:

```text
http://127.0.0.1:8000
```

---

## Features

* Daily task record management
* Data entry forms
* Record editing and updating
* Filtered list views
* Monthly report generation
* PDF export functionality
* MySQL database integration
* Laravel MVC architecture

---

## Database

The application uses MySQL for data storage.

Before running the application:

1. Create a MySQL database.
2. Update database credentials in the `.env` file.
3. Import the provided SQL file or execute migrations.

---

## Author

**Rose Dhar**

