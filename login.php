<!DOCTYPE html>
<html>
    <?php include "head.inc.php"; ?>
    <body>     <?php
        include "nav.inc.php";
        ?> 


        <header class="jumbotron text-center">
            <h1 class="display-4">Login</h1> 
            <p> 

                For new members, please go to the 
                <a href="register.php">Sign up</a> page.
            </p> 
        </header>
        <main class="container"> 
            <form action="process_login.php" method="post"> 
                

                <div class="form-group">
                    <label for="email">Email:</label> 
                    <input class="form-control" type="email" id="email" name="email" required placeholder="Enter email"> 
                </div>               

                <div class="form-group">
                    <label for="pwd">Password:</label> 
                    <input class="form-control" type="password" id="pwd" name="pwd" required placeholder="Enter password"> 
                </div>

               

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Log in</button> 
                </div>
            </form> 

        </main> 
    </body> 



    <?php include "footer.inc.php"; ?>

</html>


