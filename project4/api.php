<?php
class Api {
    // Define database connection constants
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'project4';

    // Administrative user(s)
    const ADMIN_ID = '1';

    // Set database connect variable
    private function dbConnect() {
        $dbc = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME)
            or exit('Error connecting to MySQL server.');
        return $dbc;
    }

    // Query database
    function dbQuery($query) {
        $dbc = $this->dbConnect();
        $result = mysqli_query($dbc, $query)
            or exit('Error querying database');
        return $result;
    }

    // Close database connection
    function dbClose() {
        $dbc = $this->dbConnect();
        mysqli_close($dbc);
    }

    // Return database error
    function dbError($query) {
        $dbc = $this->dbConnect();
        echo $query;
        exit("Database query error: " . mysqli_error($dbc));
    }

    // Check database inputs
    function dbInputCheck($input) {
        $dbc = $this->dbConnect();
        $clean_input = mysqli_real_escape_string($dbc, trim($input));
        mysqli_close($dbc);
        return $clean_input;
    }

    // Check if user is logged in, otherwise redirect to login page
    function authenticateUser() {
        if (!isset($_SESSION))
            session_start();
        if (!isset($_SESSION['id'])) {
            $site_root = '/project4';
            if (($_SERVER['PHP_SELF'] != "$site_root/users/login.php") && ($_SERVER['PHP_SELF'] != "$site_root/users/new.php")) {
                header("Location: $site_root/users/login.php");
            }
        }
    }

    // Check if administrative user is logged in
    function authorizeAdmin() {
        if (!isset($_SESSION))
            session_start();
        if (!isset($_SESSION['id']) || ($_SESSION['id'] != self::ADMIN_ID)) {
            return false;
        } else {
            return true;
        }
    }
}
