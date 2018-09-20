<?php    
    class Database {
        private static $dsn = 'mysql:host=localhost;dbname=contact_newsletter';
        private static $username = 'root';
        private static $password = '';
        private static $db;

        private function __construct() {}

        public static function getDB () {
            if (!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn,
                                         self::$username,
                                         self::$password);
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    echo $error_message;
                    //include('../errors/database_error.php');
                    exit();
                }
            }
            return self::$db;
        }    
    }
    class Employee {
        private $id;
        public $firstName, $lastName;

        public function __construct($id, $firstName, $lastName) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }

        public function getID() {
            return $this->id;
        }

        public function setID($value) {
            $this->id = $value;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($value) {
            $this->firstName = $value;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function setLastName($value) {
            $this->lastName = $value;
        }
    }
    class EmployeeDB {
        public static function getEmployees() {
            $db = Database::getDB();
            $query = 'SELECT * FROM employee
                      ORDER BY employeeID';
            $statement = $db->prepare($query);
            $statement->execute();

            $employees = array();
            foreach ($statement as $row) {
                $employee = new Employee($row['employeeID'],
                                         $row['firstName'],
                                         $row['lastName'] );
                $employees[] = $employee;
            }
            return $employees;
        }
    }
    $employees = EmployeeDB::getEmployees();    
   
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
    <title>Contact confirmation</title>     
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
			
                <br>
                <main>
                        <!-- Display all employees -->
			<h1>Employee List:</h1>
                        <br>
                           
                                <?php foreach ($employees as $employee) : ?>
                                    <li>
                                    <?php echo $employee->getID(); ?>
                                    <?php echo $employee->getFirstName(); ?>  
                                    <?php echo $employee->getLastName(); ?>                                    
                                    </li>
                                <?php endforeach; ?>
                            
                       
		</main>
	</div>
</body>
</html>