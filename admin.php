<?php
require_once('database.php');

// Get employee ID
if (!isset($employeeID)) {
    $employeeID = filter_input(INPUT_GET, 'employeeID', 
            FILTER_VALIDATE_INT);
    if ($employeeID == NULL || $employeeID == FALSE) {
        $employeeID = 1;
    }
}
// Get name for selected Employee
$queryEmployee = 'SELECT * FROM employees
                  WHERE employeeID = :employeeID';
$statement1 = $db->prepare($queryEmployee);
$statement1->bindValue(':employeeID', $employeeID);
$statement1->execute();
$employee = $statement1->fetch();
$firstName = $employee['firstName'];
$statement1->closeCursor();


// Get all employees
$queryAllEmployees = 'SELECT * FROM employees
                       ORDER BY employeeID';
$statement = $db->prepare($queryAllEmployees);
$statement->execute();
$employees = $statement->fetchAll();
$statement->closeCursor();

// Get visitor info 
$queryVisitors = 'SELECT * FROM visitor
                  WHERE employeeID = :employeeID
                  ORDER BY visitorID';
$statement3 = $db->prepare($queryVisitors);
$statement3->bindValue(':employeeID', $employeeID);
$statement3->execute();
$visitors = $statement3->fetchAll();
$statement3->closeCursor();
?>


<!DOCTYPE html>
<!--Week 3 Project-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="css/bootstrap.min.css" rel="stylesheet">       
    <!--<link href="css/style.css" rel="stylesheet">-->   
    <link href="css/admin.css" rel="stylesheet" type="text/css"/> 
    <title>Administrator View</title>     
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
		<h2>Administration Use Only</h2>
                <br>
                <main>     
                    <aside>
                    <!-- display a employee information -->
                    <h2>Employee</h2>
                    <nav>
                         <?php foreach ($employees as $employee) : ?>
                        <li><a href=".?employeeID=<?php echo $employee['employeeID']; ?>">
                                <?php echo $employee['employeeID']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </nav>
                    </aside>
                    <br>
                    <!-- display a table of visitor information -->
                    <h2><?php echo $employee; ?></h2>
                    <table>
                        <tr>                           
                            <th>First Name</th>
                            <th>Comments</th>
                            <th>&nbsp;</th>
                        </tr>
                         <?php foreach ($visitors as $visitor) : ?>
                        <tr>
                            <td><?php echo $visitor['firstName']; ?></td>
                            <td><?php echo $visitor['comments']; ?></td>                            
                            <td><form action="delete_comments.php" method="post">
                                <input type="hidden" name="visitorID"
                                       value="<?php echo $visitor['visitorID']; ?>">
                                <input type="hidden" name="employeeID"
                                       value="<?php echo $visitor['employeeID']; ?>">
                                <input type="submit" value="Delete">
                            </form></td>
                        </tr>
                         <?php endforeach; ?>                      
                    </table>  
                    
		</main>
	</div>
</body>
</html>