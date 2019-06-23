<?php
if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-174-129-240-67.compute-1.amazonaws.com;port=5432;user=wrflrxtavasvqh;password=fbfef36049fbd28f1200e3a775a389e014838e86522765e67782f9cf7a3f516b;dbname=d3mmhribgmc6bf",
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

$message = '';
if (isset($_POST['StudentID']) && isset($_POST['fname'])  && isset($_POST['email']) && isset($_POST['classname']) ) {
  $stuid = $_POST['StudentID'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $classname = $_POST['classname'];
  $sql = 'INSERT INTO student(stuid, fname, email, classname) VALUES(:StudentID, :fname, :email, :classname)';
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([':StudentID' => $stuid, ':fname' => $fname, ':email' => $email, ':classname' => $classname]) == TRUE) {
    $message = 'Data inserted successfully;';
    else{
      $message = 'Error;';
    }
  }
}
?>

<?php require 'header.php'; ?>
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
          <label for="name">ID</label>
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
          <label for="name">Class</label>
          <input type="text" name="classname" id="classname" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
