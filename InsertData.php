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

?>




<?php require 'header.php'; ?>
<h1>DATABASE CONNECTION</h1>


<?php

$message = '';
if (isset($_POST['StudentID']) && isset($_POST['fname'])  && isset($_POST['email']) && isset($_POST['classname']) ) 
{
  $stuid = $_POST['StudentID'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $classname = $_POST['classname'];

  $sql = 'INSERT INTO student(stuid, fname, email, classname) VALUES(:StudentID, :fname, :email, :classname)';
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([':StudentID' => $stuid, ':fname' => $fname, ':email' => $email, ':classname' => $classname]) == TRUE) 
  {
    $message = 'Data inserted successfully;';
  }
}
?>





<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Insert Information</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="id">Student ID</label>
          <input type="text" name="StudentID" id="stuid" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" name="fname" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="class">Class</label>
          <input type="text" name="classname" id="classname" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>




