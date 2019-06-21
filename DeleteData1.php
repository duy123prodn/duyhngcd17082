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
if (isset($_GET['del']))
{
	$stuid = $_GET['del'];
	$sql = "DELETE FROM student WHERE stuid = '<php echo $row['stuid']?>'";
	$stmt = $pdo->prepare($sql);
	if($stmt->execute() == TRUE)
	{
    	echo "Record deleted successfully.";
		else 
		{
    		echo "Error deleting record. ";
		}
	}

}
?>
