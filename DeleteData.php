







<!DOCTYPE html>
<html>
    <head>
<title>Delete by using ID</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<h1>DELETE DATA FROM DATABASE</h1>
<h2>Delete data from student table</h2>
<ul>
    <form name="DeleteData" action="DeleteData.php" method="POST" >
<li>Enter Student ID you want to delete:</li><li><input type="text" name="StudentID" /></li>
<li><input type="submit" /></li>
</form>
</ul>

<?php
ini_set('display_errors', 1	);
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

$sql = "DELETE FROM student WHERE stuid = '<?php echo VALUES('$_POST[StudentID]')?> '";

$stmt = $pdo->prepare($sql);
 {
//$stmt->execute();
 if (is_null($_POST[StudentID])) {
   echo "StudentID must be not null";
 }
 else
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>
</html>