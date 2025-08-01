# Gaming PC Store

Welcome to the **Gaming PC Store**, an online platform for purchasing high-performance gaming PCs. This project is built using Laravel and provides features for users to browse products, place orders, and manage their profiles. Admins can manage products, users, FAQs, and news posts.

---

## Features

### User Features
- **Browse Products**: View all available gaming PCs with detailed specifications.
- **Product Details**: Access detailed information about each PC, including price, CPU, GPU, RAM, storage, and stock.
- **Place Orders**: Order PCs directly from the product details page (requires login).
- **Order History**: View all past orders in the "My Orders" section.
- **Contact Form**: Submit inquiries via the contact page.

### Admin Features
- **Manage Products**: Add, edit, or delete products.
- **Manage Users**: Promote or demote users to/from admin roles.
- **Manage FAQs**: Add, edit, or delete FAQs.
- **Manage News**: Create, edit, or delete news posts.
- **Admin Mail**: View and delete messages submitted via the contact form.

---

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- PHPMyAdmin or another supported database

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/gaming-pc-store.git
   cd gaming-pc-store
   ```

2. Install PHP dependencies:
    ```bash
    composer install
    ```

3. Install Javascript dependencies:
    ```bash
    npm install
    ```

4. Set up your .env file

5. Run the migration and seeders:
    ```bash
    php artisan migrate:fresh --seed
    ```

6. Start the application:
    #### terminal 1:
    ```bash
    phph artisan serve
    ```

    #### terminal 2:
    ```bash
    npm run dev
    ```

    both need to be running

## Usage

### Admin access

all accounts use password as password exept fo the default admin

- Email: admin@ehb.be
- password: Password!123

## Technologies Used
- Laravel
- Tailwind css
- Alpine.js
- MySQL(PHPMyAdmin)
- vite

## Tools Used
- Vs Code
- Github Copilot
- ChatGPT https://chatgpt.com/share/688cde64-1cd0-8003-b738-be0503c7748c