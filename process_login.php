<!DOCTYPE html>
<html>
    <?php include "head.inc.php"; ?>
    <body>    
        <?php include "nav.inc.php"; ?> 
        <header></header>
        <main class='container'>
            <hr>

            <?php
            session_start();
            $email = $firstName = $lastName = $pwd = $pwd_hashed = $pwd_confirm = $errorMsg = "";
            $success = true;

            if (empty($_POST["email"])) {
                $errorMsg .= "Email is required.<br>";
                $success = false;
            } else {
                $email = sanitize_input($_POST["email"]);
                // Additional check to make sure e-mail address is well-formed.     
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMsg .= "Invalid email format.";
                    $success = false;
                }
            }


            if (empty($_POST["pwd"])) {
                $errorMsg .= "Password is required.<br>";
                $success = false;
            } else {              
                $pwd_hashed = password_hash($_POST["pwd"],PASSWORD_BCRYPT);
                
            }

            authenticateUser();
            if ($success) {
                echo "<h1 class='display-4'>Login successful!</h1>";
                echo "<h4>Welcome, " . $firstName . " " . $lastName . "</h4>";                

                
            } else {
                echo "<h1 class='display-4'>Oops!</h1>";
                echo "<h4>The following errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a href='register.php' class='btn btn-danger active processbtn' role='button' aria-pressed='true'>Return to Sign up</a> ";
            }

//Helper function that checks input for malicious or unwanted content. 
            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            //-------------------------------DB CONNECTION------------------------------------------//
            /*
             * Helper function to write the member data to the DB
             */

            /*
             * Helper function to authenticate the login.
             */
            function authenticateUser() {
                global $firstName, $lastName, $email, $pwd_hashed, $errorMsg, $success;
                // Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
                    // Prepare the statement:
                    $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        // Note that email field is unique, so should only have
                        // one row in the result set.
                        $row = $result->fetch_assoc();
                        $firstName = $row["fname"];
                        $lastName = $row["lname"];
                        $_SESSION['firstName'] = $row["fname"];
                        $_SESSION['lastName'] = $row["lname"];
                        $pwd_hashed = $row["password"];
                        // Check if the password matches:
                        if (!password_verify($_POST["pwd"], $pwd_hashed)) {
                            $errorMsg = "Invalid login credentials";
                            $success = false;
                        } 
                    } else {
                        $errorMsg = "Invalid login credentials";
                        $success = false;
                    }
                    $stmt->close();
                }
                $conn->close();
            }
            
            
            ?> 

            <hr>
        </main> 

    </body> 

            <?php include "footer.inc.php"; ?>

</html>
