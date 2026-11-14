# Bank IFSC Finder

PHP + MySQL project prepared for GitHub and PHP hosting.

## Project contents
- Existing PHP pages and HTML navigation
- CSS, JavaScript and image assets
- `database/schema.sql` — table definitions only; sample records and credentials were removed
- `db.php` — reads database credentials from environment variables

Unrelated JSP/Java shopping module, JAR files, student CSV, and generated CSS source/map files were excluded from this Bank IFSC PHP package.

## Requirements
- PHP with the `mysqli` extension
- MySQL or MariaDB
- A web server such as Apache or Nginx

## Database setup
1. Create an empty MySQL database using your hosting control panel.
2. Import `database/schema.sql` into that database using phpMyAdmin or your host's database tool.
3. Configure the following environment variables in your hosting control panel:
   - `DB_HOST`
   - `DB_NAME`
   - `DB_USER`
   - `DB_PASS`
4. Ensure the website document root points to this folder.

`db.php` intentionally contains no production credentials. Do not commit passwords to GitHub.

## Local testing with XAMPP
1. Copy this folder into `C:\xampp\htdocs\BankIFSC`.
2. Create a database in phpMyAdmin and import `database/schema.sql`.
3. Set local environment variables for PHP/Apache, or adapt `db.php` locally with private credentials that are not committed.
4. Start Apache and MySQL in XAMPP.
5. Visit `http://localhost/BankIFSC/`.

## GitHub upload
From this folder in VS Code Terminal:

```bash
git init
git add .
git status
git commit -m "Prepare Bank IFSC Finder"
git branch -M main
git remote add origin https://github.com/YOUR-USERNAME/Bank-IFSC-Finder.git
git push -u origin main
```

Review `git status` before committing. Never commit private credentials, real customer data, database dumps containing personal data, or uploaded private documents.

## Online deployment
GitHub stores the source code but does not execute PHP/MySQL. Upload this folder to your PHP host's document root using its Git deployment feature or SFTP. Import the schema, set the environment variables, enable HTTPS, and test every page.

## Important security note
This is a legacy academic project, not a production banking system. Before exposing it publicly, review and fix SQL injection risks, plain-text password handling, authentication/session protections, CSRF protections, and input/output validation. Use dummy data only for a portfolio demonstration.
