<p align="center">
   <img src="https://img.shields.io/github/stars/mrnikhilsingh/coffee-shop-management-system" alt="GitHub Repo stars">  
   <img src="https://img.shields.io/github/license/mrnikhilsingh/coffee-shop-management-system" alt="GitHub License">  
   <img src="https://img.shields.io/github/forks/mrnikhilsingh/coffee-shop-management-system" alt="GitHub forks">  
</p>

# NS Coffee - Coffee Shop Management System

The Coffee Shop Management System is a web-based application designed to streamline the management and operations of a coffee shop. It includes features for managing bookings, products, users, and administrative tasks. Built with HTML, CSS, JS, and PHP as Backend and MySQL as Database.

![NS Coffee Preview](https://github.com/mrnikhilsingh/coffee-shop-management-system/blob/main/images/website-screenshots/hero-section.png)

## Demo

Experience Ns Coffee firsthand with a live website available at [Website Link](https://nscoffee.free.nf/).

## Installation

Follow these steps to set up NS Coffee locally using XAMPP:

1. Install XAMPP:

   - Download and install XAMPP from the [official website](https://www.apachefriends.org/index.html) based on your operating system.
   - Launch XAMPP after the installation is complete.

2. Configure XAMPP:

   - Open XAMPP and start the Apache and MySQL services.
   - If these services do not start, you may need to change the ports for Apache and MySQL in the XAMPP settings.

3. Clone the GitHub repository:

   - Head over to `C:\xampp\htdocs` in your Windows Explorer. (If you installed XAMPP in a different location, you must navigate to that folder instead.)
   - Open the terminal or command prompt in the same folder.
   - Execute the following command to change the directory to `htdocs`:

     ```bash
     cd C:\xampp\htdocs
     ```

4. Clone the repository:

   - Execute the following command to clone the GitHub repository:

     ```bash
     git clone https://github.com/mrnikhilsingh/coffee-shop-management-system.git
     ```

5. Create and Configure the Database:

   - Open the XAMPP control panel and start the Apache and MySQL services.
   - Open `http://localhost/phpmyadmin` in a web browser to access phpMyAdmin.
   - Create a new MySQL database by clicking the "New" option on the left sidebar. Name it `ns_coffee`.
   - Import the database schema from the provided SQL file (`db/ns_coffee.sql`).

6. Update Configuration in `config.php`:

   - Navigate to the `config` folder in the project directory.
   - Open the `config.php` file and update the following settings to match your local server credentials:

     ```php
     // Local database settings
     $server_name = "localhost"; // Default for XAMPP
     $user_name = "root";        // Default username for XAMPP
     $password = "";             // Default password for XAMPP (empty)
     $db_name = "ns_coffee";     // Name of the database you created
     ```

   - Update the base URL for the local environment according to your cloned repo location:
     ```php
     define("url", "http://localhost/coffee-shop-management-system");
     define("ADMINURL", "http://localhost/coffee-shop-management-system/admin-panel");
     ```

7. Start the Development Server:
   - Open XAMPP and start the Apache and MySQL services (if not already running).
   - Launch a web browser and visit `http://localhost/coffee-shop-management-system` to access the project.

Congratulations! You have successfully set up NS Coffee on your machine.

`Note:` Steps may vary slightly based on your specific operating system and XAMPP configuration. Make sure to adjust the paths and commands accordingly.

## Usage

1. Start the web server.
2. Access the application through your web browser at `http://localhost`.

## Features

1. User Authentication and Management

- **User Registration:** Allows new users to create an account by providing personal information such as name, email, and password.

- **User Login:** Enables registered users to log in to their accounts using their email and password.

- **User Profiles:** Each user has a profile where they can view and update their personal information.

- **Role-Based Access Control:** Different levels of access for customers, staff, and administrators to ensure security and appropriate access to features.

2. Product Management

- **Add/Remove Products:** Administrators can add new products to the menu, update existing product details, or remove products that are no longer available.

- **Product Categories:** Products can be categorized (e.g., beverages, pastries, sandwiches) for easier navigation and management.

- **Inventory Management:** Tracks stock levels of products and ingredients to ensure availability and timely restocking.

3. Booking Management

- **Reservation System:** Customers can make reservations for tables in the coffee shop, specifying the date, time, and number of guests.

- **Booking Confirmation:** Sends email confirmations and reminders to customers for their reservations.

- **Booking History:** Allows customers to view their past bookings and administrators to manage all bookings.

4. Administrative Panel

- **Dashboard:** Provides a comprehensive view of the coffee shop’s operations, including sales data, inventory status, and recent activities.

- **User Management:** Administrators can manage all users, including adding new staff members, updating user roles, and deactivating accounts.

- **Sales Reports:** Generates detailed reports on sales performance over various periods, helping in decision-making and strategy planning.

5. Additional Features

- **Order Management:** Tracks customer orders, processes payments, and updates order status.

- **Notifications:** Sends notifications to staff for new orders, low stock alerts, and important updates.

- **Feedback System:** Allows customers to provide feedback on products and services, which administrators can review and address.

These features provide a robust foundation for efficiently managing a coffee shop, ensuring smooth operations and enhanced customer experience.

## Screenshots

| Login Page                                                                                                                        |
| --------------------------------------------------------------------------------------------------------------------------------- |
| ![Login Page](https://github.com/mrnikhilsingh/coffee-shop-management-system/blob/main/images/website-screenshots/login_page.png) |

| Logout Page                                                                                                                             |
| --------------------------------------------------------------------------------------------------------------------------------------- |
| ![Register Page](https://github.com/mrnikhilsingh/coffee-shop-management-system/blob/main/images/website-screenshots/register_page.png) |

| Menu Page                                                                                                                       |
| ------------------------------------------------------------------------------------------------------------------------------- |
| ![Menu Page](https://github.com/mrnikhilsingh/coffee-shop-management-system/blob/main/images/website-screenshots/menu_page.png) |

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature/bug fix.
3. Make your changes and commit them with descriptive commit messages.
4. Push your changes to your forked repository.
5. Submit a pull request, explaining your changes and why they should be merged.

## Project Admin

[Nikhil Singh](https://github.com/mrnikhilsingh)

Email: [m.j882600@gmail.com](mailto:m.j882600@gmail.com)

## License

This project is licensed under the [MIT LICENSE](./LICENSE)
