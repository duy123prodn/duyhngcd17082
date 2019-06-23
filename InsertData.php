
<?php require 'header.php'; ?>
<h1>DATABASE CONNECTION</h1>
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



