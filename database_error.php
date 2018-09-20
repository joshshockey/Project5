<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Throat Honey</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>

<!-- the body section -->
<body>
    <header><h1>Throat Honey</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed as described in the appendix.</p>
        <p>MySQL must be running as described in chapter 1.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Throat Honey Band Page</p>
    </footer>
</body>
</html>