# ecommerce-life
To set up and run your Laravel application, follow these steps:

1. **Install Composer Dependencies:**

   Ensure that [Composer](https://getcomposer.org/) is installed on your system. Navigate to your project directory and install the required PHP packages:

   ```bash
   composer install
   ```


2. **Create the `.env` File:**

   Copy the example environment configuration to create your own `.env` file:

   ```bash
   cp .env.example .env
   ```


   This file contains environment-specific settings for your application.

3. **Generate the Application Key:**

   Generate a new application key, which is used for encryption and session handling:

   ```bash
   php artisan key:generate
   ```


4. **Configure the Database:**

   Open the `.env` file and set your database connection details:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```


   Replace `your_database_name`, `your_database_username`, and `your_database_password` with your actual database credentials.

5. **Run Database Migrations:**

   Apply the database migrations to set up your application's database schema:

   ```bash
   php artisan migrate
   ```


6. **Start the Development Server:**

   Launch the built-in PHP development server:

   ```bash
   php artisan serve
   ```


   By default, the application will be accessible at `http://localhost:8000`.
