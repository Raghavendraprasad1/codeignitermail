<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Import</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <form id="import_form" method="POST" enctype="multipart/form-data">

        <p>select excel file :
            <input type="file" name="file" id="file" required accept=".xls, .xlsx"></p>
        </br>
        <input type="submit" name="import" value="Import" class="btn btn-primary">

    </form>

    <div class="table-responsive" id="customer_data">

    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        load_data();

        function load_data() {
            $.ajax({
                url: "<?=base_url('excel_import_data/fetch')?>",
                method: "POST",
                success: function(data) {
                    $('#customer_data').html(data);
                }
            });
        }

        $("#import_form").on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?=base_url('excel_import_data/import')?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#file').val('');
                    load_data();
                    alert(data);
                }

            });

        });

    });
</script>