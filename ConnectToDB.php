<?php require 'header.php'; ?>
<h1>DATABASE CONNECTION</h1>

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
$sql = 'SELECT * FROM student ORDER BY stuid' ;
$stmt = $pdo->prepare($sql);
$stmt->execute();
//Thiết lập kiểu dữ liệu trả về
$person = $stmt->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['StudentID']) && isset($_POST['fname'])  && isset($_POST['email']) && isset($_POST['classname']) )
{
  $stuid = $_POST['StudentID'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $classname = $_POST['classname'];

  $sql = 'UPDATE student SET stuid=:StudentID, fname=:fname, email=:email, classname=:classname WHERE stuid=:StudentID';
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([':StudentID' => $stuid, ':fname' => $fname, ':email' => $email, ':classname' => $classname]) )
  {
    header("Location: ConnectToDB.php");
  }
}
?>