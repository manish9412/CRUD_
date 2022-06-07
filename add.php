<!DOCTYPE html> 
 <html lang="en"> 
 <head> 
   <title>Add Data Using AJAX</title> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 </head> 
 <body> 
   
 <div class="container py-5"> 
   <h2>Add Blog</h2> 
   <p class="text-right"><a href="index.php" class="btn btn-primary">View All Blogs</a></p> 
   <form> 
     <div class="form-group"> 
       <label for="title">Title:</label> 
       <input type="text" class="form-control" id="title"> 
     </div> 
     <div class="form-group"> 
       <label for="description">Description:</label> 
       <textarea class="form-control" id="description" id="desc"></textarea> 
     </div> 
   
     <button type="button" id="save" class="btn btn-primary">Submit</button> 
      <button type="button" class="btn btn-secondary"><a href="index.php" class="text-light text-decoration-none">Close</a></button>
   </form> 
 </div> 
   
   
 <script> 
 $('#save').click(function () { 
   
 $title = $('#title').val(); 
 $desc = $("#description").val(); 
   
   
   
 $.ajax({url:"insert.php", 
 method:"POST", 
 data:{titlecol:$title,desccol:$desc}, 
 success:function(dataabc){ 
   window.location.href="index.php"; 
 }}); 
   
   
 }); 
   
   
   
 </script> 
   
   
 </body> 
 </html> 
   