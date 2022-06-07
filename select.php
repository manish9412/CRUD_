<?php 
 include("includes/connection.php"); 
 
   $per_page=5;
   $start = 0;
   if (isset($_GET['start']))
   {
      $start = $_GET['start'];
      $start--;
   }

   $record = mysqli_num_rows(mysqli_query($conn,"select id,post_at,title,description from posts"));
  $pagi = ceil($record/$per_page);

 echo $sql="select id,post_at,title,description from posts limit $start , $per_page";
  $result = mysqli_query($conn,$sql);
   
   
   
 echo ' <tr> 
              <th>Sr.No</th> 
              <th>Date</th> 
              <th>Title</th> 
              <th>Description</th> 
              <th>Edit</th> 
              <th>Delete</th> 
              </tr>'; 
   
 $i=1; 

 while($data=mysqli_fetch_array($result)) 
 { 
              echo ' 
             
      <tr> 
         <td>'.$i.'</td> 
         <td>'.$data['post_at'].'</td> 
         <td>'.$data['title'].'</td> 
         <td>'.$data['description'].'</td> 
         <td><a href="edit.php?edit_id='.$data['id'].'" class="btn btn-success">Edit</a></td> 
         <td><a href="index.php?del_id='.$data['id'].'" class="btn btn-danger" >Delete</a></td> 
       </tr>'; 
               
               $i++; 
 } 
   
 ?> 