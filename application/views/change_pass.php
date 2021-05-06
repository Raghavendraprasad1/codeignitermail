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
<style>
    .pass_show{position: relative}

.pass_show .ptxt {

position: absolute;

top: 50%;

right: 10px;

z-index: 1;

color: #f36c01;

margin-top: -10px;

cursor: pointer;

transition: .3s ease all;

}

.pass_show .ptxt:hover{color: #333333;}
</style>

<body>

<div class="container">
	<div class="row">
    <div class="col-sm-4">
    </div>
		<div class="col-sm-6">

        <?php if ($success = $this->session->flashdata("success")): ?>
          <p  style="font-size: 25px; background-color: green; border-radius: 10px; "> <?php echo $success; ?> </p>
        <?php endif;?>
            <form action="<?=base_url('login/save_pass');?>" method="POST" >
        <h1>Change Password </h1>
		    <label>Current Password</label>
		    <div class="form-group pass_show">
                <input type="password"  class="form-control" name="vOldPassword" placeholder="Current Password">
                <?php echo form_error('vOldPassword', '<div class="error">', '</div>') ?>
            </div>
		       <label>New Password</label>
            <div class="form-group pass_show">
                <input type="password"  class="form-control" name="vPassword" placeholder="New Password">
                <?php echo form_error('vPassword', '<div class="error">', '</div>') ?>
            </div>
		       <label>Confirm Password</label>
            <div class="form-group pass_show">
                <input type="password"  class="form-control" name="vConfirmPassword" placeholder="Confirm Password">
                <?php echo form_error('vConfirmPassword', '<div class="error">', '</div>') ?>
            </div>

            <input type="submit"  class="btn btn-primary" value="Save Password" placeholder="Confirm Password">
            <a href="<?=base_url('login/change_pass_view')?>" class="btn btn-danger"  style="float:right" >Back</a>

            </form>
		</div>
	</div>
</div>

</body>

</html>

<script src="<?=base_url('assets/js/general.js')?>"></script>
