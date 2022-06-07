<?php 
 include("includes/connection.php"); 
   
   
   
 if(isset($_GET['del_id'])) 
 { 
             $id=$_GET['del_id']; 
             
             $sql="delete from posts where id='".$id."'"; 
             $result=mysqli_query($conn,$sql); 
             
             header('index.php'); 
             
 } 
   
 ?> 

 <!DOCTYPE html> 
 <html lang="en"> 
 <head> 
   <title>Select Data Using AJAX</title> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 </head> 
 <body> 
 <div class="container py-5"> 
 <div class="row"> 
 <div class="col-lg-12"> 
 <h1 class="text-center py-4">Data Tables</h1> 
 
 <!-- Search button -->
 <form class="form-inline w-25 float-right py-3 " method="POST" action="index.php">
        <div class="input-group col-md-12 ">
          <input type="text" class="form-control " placeholder="Enter  here..." name="keyword" required="required" value="<?php echo isset($_POST['keyword'])? $_POST['keyword'] : '' ?>"/>
          <span class="input-group-btn">
            <button class="btn btn-primary" name="search"><span class="fa fa-search"></span></button>
          </span>
        </div>
      </form>
 <br>

 <?php include ("search.php"); ?>

 <table class="table table-bordered table-striped float-left" id="content"></table> 
 <p class="text-left"><a href="add.php" class="btn btn-primary" >Add Data</a>

<button type="button" class=" btn btn-primary " data-toggle="modal" data-target="#Modal">Add Data With Modal</button> </p>
<?php

   $per_page=5;
   $start = 0;
   $current_page =1; 
   if (isset($_GET['start']))
   {
      $start = $_GET['start'];
      if ($start<=0) 
      {
        $start=0;
        $current_page=1;   
      }
      else
      {  
      $current_page=$start;
      $start--;
      $start = $start * $per_page;
    }
   }

   $record = mysqli_num_rows(mysqli_query($conn,"select id,post_at,title,description from posts"));
  $pagi = ceil($record/$per_page);

  $sql="select id,post_at,title,description from posts limit $start , $per_page";
  $result = mysqli_query($conn,$sql);
   
   
?>
<nav>
  <ul class="pagination float-right">
    <?php
      
     for ($i=1; $i <= $pagi ; $i++) 
     {
      $class = '';
      if ($current_page == $i)
      {
        ?><li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i ?></a></li>
        <?php
      }else{
      ?>
      
    <li class="page-item "><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
  <?php 
    }
    ?>
    <?php
  }
  ?>
  </ul>
</nav>
 </div> 

 </div> 
 </div> 
   

<!-- Modal -->
<div class="modal fade" id="Modal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
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
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   </form> 

      </div>

    </div>

  </div>
  

</div>


 <script> 
 $(document).ready(function(){ 
 $.ajax({url:"select.php", success:function(dataabc)
 { 
             $("#content").html(dataabc);                      
 }
});    
 });

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