<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-3">

      </div>
<!-- class="text-danger" -->
      <div class="col-sm-4">
        <?php if ($error = $this->session->flashdata("error")): ?>
          <p  style="font-size: 25px; background-color: red; border-radius: 10px;"> <?php echo $error; ?> </p>
        <?php endif;?>
        <?php if ($success = $this->session->flashdata("success")): ?>
          <p  style="font-size: 25px; background-color: green; border-radius: 10px; "> <?php echo $success; ?> </p>
        <?php endif;?>

        <h2>Sign-up Page  </h2>
        <form action="<?=base_url('login/save')?>" method="POST">

          <div class="form-group">
            <label for="vName">Name:</label>
            <input type="text" class="form-control" id="vName" placeholder="Enter name" name="vName">
          </div>
          <div class="form-group">
            <label for="vEmail">Email</label>
            <input type="email" class="form-control" id="vEmail" placeholder="Enter email" name="vEmail">
          </div>
          <div class="form-group">
            <label for="vPassword">Password:</label>
            <input type="password" class="form-control" id="vPassword" placeholder="Enter password" name="vPassword">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember" value="1"> Remember me
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </div>

</body>

</html>
