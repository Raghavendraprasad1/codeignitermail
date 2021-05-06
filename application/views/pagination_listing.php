<!DOCTYPE html>
 <html>
      <head>
           <title>Webslesson Tutorial | Make Pagination using Jquery, PHP, Ajax and MySQL</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      </head>
      <body>
           <br /><br />
           <div class="container">
                <h3 align="center">Make Pagination using Jquery, PHP, Ajax and MySQL</h3><br />
                <div class="table-responsive" id="pagination_data">
                </div>
           </div>
      </body>
 </html>
 <script>
 var base_url="<?=base_url();?>";
 console.log("value of base url "+base_url);
 $(document).ready(function(){
      load_data();
      function load_data(page)
      {
           console.log("function is working");
           $.ajax({
                url:base_url+"custom_pagination/getData",
                method:"POST",
                data:{
                     "page":page
                     },
                success:function(data){
                     $('#pagination_data').html(data);
                }
           })
      }
      $(document).on('click', '.pagination_link', function(){
           var page = $(this).attr("id");
           load_data(page);
      });
 });
 </script>