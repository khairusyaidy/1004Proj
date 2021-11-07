<!DOCTYPE html>
<html>
    <?php include "head.inc.php"; ?>
    <body>     <?php
        include "nav.inc.php";
        ?> 


        <header class="jumbotron text-center">
            <h1 class="display-4">Member Registration</h1> 
            <p> 

                For existing members, please go to the 
                <a href="login.php">Login</a> page.
            </p> 
        </header>
        <main class="container"> 
            <form action="process_register.php" method="post"> 
                <div class="form-group">
                    <label for="fname">First Name:</label>             
                    <input class="form-control" type="text" id="fname" name="fname" maxlength="45" placeholder="Enter first name"> 
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>            
                    <input class="form-control" type="text" id="lname" name="lname" maxlength="45" required placeholder="Enter last name"> 
                </div>

                <div class="form-group">
                    <label for="email">Email:</label> 
                    <input class="form-control" type="email" id="email" name="email" required placeholder="Enter email"> 
                </div>               

                <div class="form-group">
                    <label for="pwd">Password:</label> 
                    <input class="form-control" type="password" id="pwd" name="pwd" required placeholder="Enter password"> 
                </div>

                <div class="form-group">
                    <label for="pwd_confirm">Confirm Password:</label> 
                    <input class="form-control" type="password" id="pwd_confirm" name="pwd_confirm" required placeholder="Confirm password"> 
                </div> 

                <div class="form-group">
                    <label> 
                        <input class="form-check-label" type="checkbox" required name="agree"> 
                        Agree to terms and conditions. 
                    </label>             
                </div> 

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button> 
                </div>
            </form> 

        </main> 
    </body> 



    <?php include "footer.inc.php"; ?>

</html>


