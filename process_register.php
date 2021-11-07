<!DOCTYPE html>
<html>
    <?php include "head.inc.php"; ?>
    <body>     <?php
        include "nav.inc.php";
        ?> 
        <header></header>
        <main class='container'>

            <?php
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
            if (empty($_POST["fname"])) {
                $errorMsg .= "First name is required.<br>";
                $success = false;
            } else {
                $firstName = sanitize_input($_POST["fname"]);
            }


            if (empty($_POST["lname"])) {
                $errorMsg .= "Last name is required.<br>";
                $success = false;
            } else {
                $lastName = sanitize_input($_POST["lname"]);
            }


            if (empty($_POST["pwd"])) {
                $errorMsg .= "Password is required.<br>";
                $success = false;
            }

            if (empty($_POST["pwd_confirm"])) {
                $errorMsg .= "Password confirmation is required.<br>";
                $success = false;
            }

            if (!empty($_POST["pwd"]) && !empty($_POST["pwd_confirm"])) {
                if ($_POST["pwd"] != $_POST["pwd_confirm"]) {
                    $errorMsg .= "Passwords do not match.<br>";
                    $success = false;
                } else {
                    $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_BCRYPT);
                }
            }
            
            saveMemberToDB();
            if ($success) {
                echo "<h1 class='display-4'>Registration successful!</h1>";
                echo "<h4>Welcome," . $firstName . " " . $lastName . "</h4>";
                echo "<a href='#' class='btn btn-success active processbtn' role='button' aria-pressed='true'>Log in</a> ";
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
            function saveMemberToDB() {
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
                    //check if email already exist
                    $stmt_check = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
                    $stmt_check->bind_param("s", $email);
                    $stmt_check->execute();
                    $result = $stmt_check->get_result();
                    if ($result->num_rows > 0) {
                        $success = false;
                        $errorMsg = "Email is taken. Please use a different email.";
                        $stmt_check->close();
                    } else {

                        // Prepare the statement:
                        $stmt = $conn->prepare("INSERT INTO world_of_pets_members (fname, lname, email, password) VALUES (?, ?, ?, ?)");
                        // Bind & execute the query statement:
                        $stmt->bind_param("ssss", $firstName, $lastName, $email, $pwd_hashed);

                        if (!$stmt->execute()) {
                            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            $success = false;
                        }

                        $stmt->close();
                    }
                }
                $conn->close();
            }
            ?> 


        </main> 

    </body> 

<?php include "footer.inc.php"; ?>

</html>
