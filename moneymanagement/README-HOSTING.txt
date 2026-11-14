MONEY MANAGEMENT - HOSTING-READY PACKAGE

This is a PHP + MySQL application. GitHub Pages cannot execute PHP or provide
a MySQL database. Host this folder on a PHP/MySQL hosting provider.

FILES
- index.php, login.php, register.php, logout.php
- dashboard.php, add_transaction.php, history.php
- database.php (hosting database settings)
- database.sql (creates the required tables)
- style.css

DEPLOYMENT
1. Create a PHP + MySQL hosting account.
2. Create a MySQL database and database user in the hosting control panel.
3. Import database.sql into that database using the provider's phpMyAdmin.
   IMPORTANT: database.sql creates/selects a database named money_management.
   If your provider requires you to create a database first, remove the first
   CREATE DATABASE and USE lines, then import the remaining table statements
   into the database you created. Some hosts automatically prefix database names.
4. Edit database.php and replace:
   YOUR_HOSTING_DATABASE_HOST
   YOUR_HOSTING_DATABASE_USERNAME
   YOUR_HOSTING_DATABASE_PASSWORD
   YOUR_HOSTING_DATABASE_NAME
   with the exact values from the hosting control panel.
5. Upload the CONTENTS of the moneymanagement folder into the hosting website's
   document root (often htdocs, public_html, or a domain-specific folder).
6. Visit https://YOUR-DOMAIN/ or https://YOUR-DOMAIN/index.php.
7. Register a test account and verify adding income and expenses.

SECURITY
- Never publish real database passwords in GitHub.
- Do not use the XAMPP root account or its local password on public hosting.
- Use a dedicated database user with access only to this application's database.
- Enable HTTPS and keep PHP/hosting software updated.
- This is an educational project. Do not use it to store sensitive financial data
  until it has undergone a professional security review.

DATABASE NAME
The SQL file creates/selects money_management. Ensure database.php uses the
actual database name assigned by your hosting provider (including any prefix).
