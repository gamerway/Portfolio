MONEY MANAGEMENT SYSTEM - DREAMWEAVER 8 + HEIDISQL + XAMPP

FILES
- database.sql: database and table setup
- database.php: MySQL connection settings
- auth.php: login protection helper
- index.php: sends user to login/dashboard
- register.php / login.php / logout.php: account pages
- dashboard.php: income, expenses and balance summary
- add_transaction.php: add income or expense
- history.php: transaction list
- style.css: page styling

INSTALL
1. Start Apache and MySQL in XAMPP.
2. Open HeidiSQL and connect to your local MySQL server (often host localhost, user root, blank password for a default local XAMPP setup).
3. Open database.sql in HeidiSQL, then execute the whole script.
4. Copy the MoneyManagement folder into your XAMPP htdocs folder.
   Example: C:\xampp\htdocs\MoneyManagement
5. If your MySQL username/password differs, update database.php.
6. Open http://localhost/MoneyManagement/ in your browser.
7. Register an account, then add income and expenses.

IMPORTANT
- This is a learning/demo project intended for local use.
- Do not expose a default root/blank-password MySQL setup to the internet.
- Dreamweaver 8 is an old editor; PHP execution is provided by XAMPP, not Dreamweaver.
