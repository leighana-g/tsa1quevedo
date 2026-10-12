# Point-of-Sale (POS) & Inventory Management System

A comprehensive, enterprise-grade Point-of-Sale (POS) and business management web application built from the ground up using **CodeIgniter 4** (PHP MVC framework). Engineered to streamline storefront operations, this system features robust customer and user administration, automated image processing pipelines, secure routing architectures, and a responsive Bootstrap-powered user interface.

---

## Key Architectural & Functional Features

### 1. Customer Relationship & Account Management (`Customers` Module)

* **Full CRUD Operations**: Complete creation, listing, updating, and persistence lifecycle management for customer records.


* **Strict Validation Rules**: Implements rigorous input validation via CodeIgniter's validation engine, enforcing strict length, structure, and format guidelines for full names, active email addresses, and phone numbers.


* **Clean Data Binding**: Dynamic old-input retention (`old()`) during validation failures to ensure smooth user form-repopulation experiences.



### 2. Administrator & User Account Control (`Users` Module)

* **Unique Username Constraints**: Advanced database-level and model-level unique checks (`is_unique[users.username]`) protecting against duplicate registrations.


* **Secure Update Handling**: Intelligent update methods handling unique validation rules with dynamic record ID exclusions (`is_unique[users.username,id,{id}]`).


* **Global Helper Integration**: Streamlined architecture leveraging a centralized `BaseController` setup to auto-load essential form helpers project-wide.



### 3. Advanced Media Handling & Image Processing

* **Multipart File Uploads**: Secure file ingestion pipelines supporting standard web-safe image formats (JPEG and PNG) up to a 2MB limit.


* **Automated Image Manipulation**: Utilizes CodeIgniter's native image service (`service('image')`) to dynamically load, center-crop, and scale user profile avatars down to uniform 300x300 pixel dimensions.


* **Filesystem Automation**: Programmatic directory creation checks (`is_dir()`, `mkdir()`) guaranteeing that storage directories (`public/uploads/`) auto-initialize safely.


* **Fallback UI Layering**: Graceful template branching displaying customized fallback SVGs or placeholder avatars when a user record lacks an uploaded image.



### 4. Responsive Frontend & Layout Engineering

* **Template Inheritance**: Modular layout hierarchy extending core master templates (`layouts/main`) for uniform styling, navigation headers, and asset management.


* **Modern UI Components**: Styled heavily with customized Bootstrap cards, responsive tables, badge highlights, and contextual alert messaging.



---

## Technology Stack

* **Core Framework**: CodeIgniter 4.x (PHP Framework emphasizing MVC architecture)


* **Database Layer**: MySQL / SQLite via CodeIgniter Query Builder, Database Migrations, and Model Classes


* **Frontend Design**: Bootstrap 5, HTML5, CSS3, JavaScript


* **Development Environment**: XAMPP, Apache (with URL rewriting via `.htaccess`), or CodeIgniter's CLI Spark Server



---

## System File Architecture

```text
tfa3/
├── app/
│   ├── Controllers/
│   │   ├── BaseController.php      # Global helpers and core configuration loader
│   │   ├── Customers.php           # Customer CRUD controller and validation matrix
│   │   ├── Pages.php               # Static and informational page routing
│   │   └── Users.php               # User administration and image processing controller
│   ├── Models/
│   │   ├── CustomerModel.php       # Database mapping for customer data
│   │   └── UserModel.php           # Database mapping for system user profiles
│   ├── Config/
│   │   └── Routes.php              # Explicit RESTful and URI route maps
│   └── Views/
│       ├── layouts/main.php        # Master application layout wrapper
│       ├── customers/              # Customer interface views (index, new, edit)
│       └── users/                  # User interface views with avatar handling (index, new, edit)
├── public/
│   ├── assets/                     # CSS stylesheets and UI resources
│   └── uploads/                    # Dynamic storage for processed user avatars
└── writable/                       # Framework logs, cache, and session storage

```

---

## Installation & Local Setup

1. **Clone or Extract Repository**: Place the project folder into your local server environment root directory (e.g., `htdocs` for XAMPP users).


2. **Environment Configuration**: Duplicate the default environment file, rename it to `.env`, and configure your database credentials accordingly.
3. **Directory Permissions**: Ensure the `public/uploads/` and `writable/` directories possess proper read and write permissions to allow smooth image processing and logging.
4. **Launch the Application**:
* *Option A (Using Built-in Server)*: Open your project terminal inside the root folder and execute:


```bash
php spark serve

```


* *Option B (Using Apache/XAMPP)*: Access the application via your browser using your local server path (e.g., `http://localhost/tfa3/public/`).