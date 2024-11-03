# Secure and Insecure Authentication System

## Overview
This project demonstrates a simple authentication system implemented in PHP, showcasing both secure and insecure methods of user login and registration. It serves as an educational example for understanding session management, password handling, and the best practices in web security.

The application consists of the following main features:
- User registration with the option of secure or insecure password storage.
- User login with session management.
- Separate pages for secure and insecure login forms.
- Proper session handling to protect against session fixation and other vulnerabilities in the secure version.

## Purpose of the Code
This project aims to demonstrate the difference between secure and insecure practices in user authentication:
- **Insecure Code**: Highlights common mistakes such as plain-text password storage and minimal session protection.
- **Secure Code**: Shows proper security practices, including password hashing with `password_hash()`, session regeneration, and secure session handling.

## File Structure and Explanation

### 1. `index.php`
- **Purpose**: The main landing page providing links to register, securely log in, or use the insecure login page.
- **Functionality**: Simple HTML with navigation to different parts of the application.

### 2. `register.php`
- **Purpose**: Allows users to register with either secure or insecure options for password handling.
- **Functionality**: 
    - Stores user credentials in PHP sessions.
    - Secure registration uses `password_hash()` to hash the password.
    - Insecure registration stores the password as plain text (not recommended in real applications).
- **Validation**:
    - Ensures both username and password are provided.
    - Password must be at least 8 characters long.

### 3. `insecureLogin.php`
- **Purpose**: Handles user login using an insecure method (plain-text password comparison).
- **Functionality**:
    - Checks user input against session-stored credentials.
    - Does not regenerate session IDs or use advanced security measures.
- **Output**: Redirects to `insecureIndex.php` if login is successful; otherwise, displays error messages.

### 4. `insecureIndex.php`
- **Purpose**: A landing page after a successful insecure login.
- **Functionality**:
    - Verifies the session to ensure the user is logged in.
    - Displays a welcome message and provides a logout link.

### 5. `insecureLogout.php`
- **Purpose**: Logs out the user from the insecure session.
- **Functionality**:
    - Calls `session_unset()` and `session_destroy()` to clear session data.
    - Redirects the user to `insecureLogin.php`.

### 6. `secureSession.php`
- **Purpose**: Configures secure session settings for the application.
- **Functionality**:
    - Enforces secure session handling (e.g., `session.cookie_secure`, `session.cookie_httponly`, `session.use_strict_mode`).
    - Regenerates session IDs to prevent session fixation.
    - Adds optional session timeout for inactivity.

### 7. `secureLogin.php`
- **Purpose**: Handles user login securely using hashed password verification.
- **Functionality**:
    - Verifies credentials against session-stored data using `password_verify()`.
    - Regenerates session ID upon successful login.
    - Redirects to `secureIndex.php` on successful login or shows error messages otherwise.

### 8. `secureIndex.php`
- **Purpose**: A landing page for users who logged in through the secure method.
- **Functionality**:
    - Checks session data to ensure the user is authenticated.
    - Display a secure welcome message and provides a logout link.

### 9. `secureLogout.php`
- **Purpose**: Logs out the user from secure session.
- **Functionality**:
    - Clears session data and destroys the session.
    - Redirects the user to `secureLogin.php`.

## How to Run the Code

### Prerequisites
- A local server setup (PHP's build-in server).

### Running the Application
1. Setup configuration
    - PHP Build-in Web Server
    - Document root: Select the project directory
    - Port: 63345
    - Host: localhost