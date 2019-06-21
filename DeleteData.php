
<!DOCTYPE html>
<html>
<head>
<title>Delete data</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>


<body>


<h1>DELETE DATA TO DATABASE</h1>
<h2>Delete data from student table</h2>
<ul>
    <form name="DeleteData" action="DeleteData.php" method="POST" >
<li>Enter Student ID:</li><li><input type="text" name="stuid" /></li>
<li><input type="submit" />Delete This Data by ID</li>
</form>
</ul>


<?php
ini_set('display_errors', 1	);
echo "Delete database!";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=duyhngcd17082', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-54-225-72-238.compute-1.amazonaws.com;port=5432;user=xajjrlkdrlahpp;password=b5cd985b527ee9c10e0b2ad61c6e659276f46ee188a13b97bd8bbfe186c6800f;dbname=dalogq746t98vp",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
} 

if($pdo === false){
     echo "ERROR: Could not connect Database";
}

$sql = "DELETE FROM student WHERE stuid = '$_POST[stuid]'";

$stmt = $pdo->prepare($sql);

if($stmt->execute() == TRUE){

        echo "Record Deleted successfully.";
    } else {
        echo "Error Deleting record: ";
    }
 }
?>
</body>
</html>