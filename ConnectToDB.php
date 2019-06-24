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




$sql = 'SELECT * FROM student ORDER BY id' ;
$stmt = $pdo->prepare($sql);
$stmt->execute();
//Thiết lập kiểu dữ liệu trả về
$resultSet = $stmt->fetchAll(PDO::FETCH_OBJ);







?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>List Database</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Student ID</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Class</th>
          <th>Action</th>
        </tr>
        <?php foreach($resultSet as $person): ?>
          <tr>
             <td><?= $person->id; ?></td>
            <td><?= $person->stuid; ?></td>
            <td><?= $person->fname; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->classname; ?></td>
            <td>
              <a href="UpdateData.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="DeleteData.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>