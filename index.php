<?php


if(isset ($_POST['submit']))
{
    
    // Connect to MySQL
// Change the username, password and hostname in the function mysql_connect as per your configuration
$link = mysql_connect(servername, username, password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

// Make my_db the current database
$db_selected = mysql_select_db(databasename, $link);

    
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $age = $_POST['age'];
    $level = $_POST['level'];
    
        // Create tables
      $query2="CREATE TABLE IF NOT EXISTS html5_form (
username varchar(30),
password varchar(30),
email varchar(50),
url varchar(50),
age varchar(10),
level varchar(10)
)";

        $results2 = mysql_query($query2, $link)
        or die(mysql_error());
    
        
        $query2="insert into html5_form(username, password, email, url, age, level) 
        VALUES('$name', '$pass', '$email', '$url', '$age', '$level')";

        $results2 = mysql_query($query2)
        or die(mysql_error());
    
        if(mysql_affected_rows()>0)
        {
            ?>
<html>
    <head>
        <style>
            body
            {
                background: #ccc
            }
            
            #form_wrapper
            {
                width: 600px;
                height: auto;
                overflow: auto;
                margin: 50px auto auto 350px;
                 background: #fff;
                 padding: 50px;
                 color: #aaa;
                 font-size: 20px;
                 letter-spacing: 2px;
            }
        </style>
    </head>
    <body>
        <div id="form_wrapper">
            Form Submitted successfully
        </div>
    </body>
</html>

<?php
        }
}
else
{
?> 
<html>
    <head>
        <style>
            body
            {
                background: #ccc
            }
            
            #form_wrapper
            {
                width: 600px;
                height: auto;
                overflow: auto;
                margin: 50px auto auto 350px;
                 background: #fff;
            }
            
            #form_wrapper form
            {
                padding: 20px;
                height: auto;
                overflow: auto
            }
            
            #form_wrapper form input
            {
                margin: 20px;
                height: 30px;
                width: 250px;
                float: right;
                border: 1px solid #f5f5f5;
                padding-left: 10px
            }
            
            #form_wrapper form input:focus
            {
                outline: none;
            }
            
            #form_wrapper form label
            {
                margin: 20px;
                height: 30px;
                color: #aaa;
                font-size: 16px;
                font-family: Helvetica, sans-serif;
                float: left
            }
        </style>
    </head>
    <body>
        <div id="form_wrapper">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label>Enter your name</label>
                <input type="text" name="username" size="30" placeholder="name" autocomplete="off"/>
                <br/>
                <label>Enter a password</label>
                <input type="password" name="password" size="30" placeholder="password" autocomplete="off"/>
                <br/>
                <label>Enter your email id</label>
                <input type="email" name="email" size="30" placeholder="email" autocomplete="off"/>
                <br/>
                <label>Enter your website address</label>
                <input type="url" name="url" size="30" placeholder="website address" autocomplete="off"/>
                <br/>
                <label style="color: red;letter-spacing: 2px">The next two fields would work only for webkit and opera users</label>
                <br/>
                <label>Enter your age</label>
                <input type="number" name="age" min="1" max="120"/>
                <br/>
                <label>Knowledge level in programming</label>
                <input type="range" name="level" min="1" max="10"/>
                <br/>
                <input type="reset" name="reset" value="RESET"/>
                <br/>
                <input type="submit" name="submit" value="SUBMIT"/>
            </form>
        </div>
    </body>
</html>
<?php
}
?>
