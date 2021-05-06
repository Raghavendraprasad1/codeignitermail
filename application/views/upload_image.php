<!DOCTYPE html>
<html>
<body>

<form action="<?=base_url('upload_image/upload_img')?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="img" id="img">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
