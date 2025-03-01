# Setup Environment
follow the steps to set-up environment and dependencies.

## For Windows
### **Step 1: Set Up XAMPP**
1. **Download and Install XAMPP**:
   - Download XAMPP from [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).
   - Install it by following the setup wizard.

2. **Start Apache and MySQL**:
   - Open the XAMPP Control Panel.
   - Start **Apache** and **MySQL**.

3. **Verify Installation**:
   - Open your browser and go to `http://localhost`.
   - You should see the XAMPP dashboard.

---

### **Step 2: Create a Database**
1. Open phpMyAdmin:
   - Go to `http://localhost/phpmyadmin`.

2. Create a Database:
   - Click on **Databases**.
   - Enter a database name (e.g., `registration`) and click **Create**.

3. Create `users` Table:
   - Select the `registration` database.
   - Click on **SQL** and run the following query to create a `users` table:
     ```sql
     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(50) NOT NULL,
         email VARCHAR(100) NOT NULL,
         phone VARCHAR(15),
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

4. Create `admins` table:
   ```sql
   CREATE TABLE admins (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL,
       password VARCHAR(255) NOT NULL
   );
   ```

5. Insert an admin user with a plaintext password:
   ```sql
   INSERT INTO admins (username, password) VALUES ('admin', 'admin123');
   ```

---

### **Step 3: Create the Project Folder**
1. Navigate to the `htdocs` folder in your XAMPP installation directory (e.g., `C:\xampp\htdocs`).
2. Create a folder for your project (e.g., `form_app`).


---

### **Step 4: Install PhpSpreadsheet**
To export data from your database into an **Excel file** (`.xlsx` format), you have to use the **PhpSpreadsheet** library. This library allows you to create and manipulate Excel files in PHP.

1. **Install Composer** (if not already installed):
   - Download Composer from [https://getcomposer.org/](https://getcomposer.org/).
   - Follow the installation instructions.

2. **Install PhpSpreadsheet**:
   - Open Command Prompt and navigate to your project folder.
   - Run the following command to install PhpSpreadsheet:

     ```bash
     composer require phpoffice/phpspreadsheet
     ```

---

### **Step 5: Test the Application**
1. Open your browser and go to `http://localhost/form_app/index.php`.
2. Fill out the form and submit it.
3. Log in as an admin at `http://localhost/form_app/admin_login.php`.
4. Export the data to a CSV or Excel file from the admin dashboard.

---