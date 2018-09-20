<?php       
    $emailAddress = filter_input(INPUT_POST, 'email_address1');  
   
            $dsn = 'mysql:host=localhost;dbname=contact_newsletter';
            $username = 'root';
            $password = '';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
    
     // Add the data to the database  
            $query = 'INSERT INTO newsletter
                         (emailAddress)
                      VALUES
                         (:emailAddress)';
            $statement = $db->prepare($query);                    
            $statement->bindValue(':emailAddress', $emailAddress);            
            $statement->execute();
            $statement->closeCursor();                       
        
?>
<!DOCTYPE html>
<!--Week 3 Project-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="css/bootstrap.min.css" rel="stylesheet">       
    <link href="css/style.css" rel="stylesheet">    	
    <title>Thanks for subscribing!</title>     
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
                <span class="icon-bar"></span> 
                </button>
		<a class="navbar-brand" href="index.html">Throat Honey - Boise Skate Punk</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="info.html">Calculate</a></li> 
                    <li><a href="newsletter.html">News</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="faq.html">FAQ</a></li>
	</div>
	</div>
    </nav>
   
     <br>
     <br>
     <br>
    
	<div class="inner cover">
			<h1 class="cover-heading">You are now part of the Throat Honey Army!</h1> 
			<img src="images/ricola.png" alt="Lozenge logo">
                <br>
                <main>
			<h1>Thank for contacting us! We will get back to you shortly.</h1> 
                       
		</main>
	</div>
</body>
</html>