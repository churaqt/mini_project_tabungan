# Tabungan

## How to run

- Install XAMPP (Apache & MySQL)
- From the XAMPP Control Panel, open Apache config file httpd.conf, point DocumentRoot to the project folder. Example: `C:/xampp/htdocs/tabungan` on windows
- Start the Apache and MySQL server via XAMPP Control Panel
- Make sure to execute the create tables query found in database.sql
- In config/database.php, change the credentials to your installed MySQL credentials if neccessary
- Go to localhost:80 to access the application
