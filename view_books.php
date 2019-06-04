<?php include "header.php"; ?>
<?php include "db.php"; ?>
<?php include "navigation.php"; ?>

<table class =  "table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Τίτλος</th>
            <th>Συγγραφέας</th>
            <th>Κατηγορία</th>
            <th>Σελίδες</th>
            <th>Εξώφυλλο</th>
            <th>Χρόνος Διαβάσματος που χρειάζεται</th>
            <th>Ημερομηνία Έκδοσης</th>
            <th>Βαθμολογία</th>
            <th>Φορές που το διάβασε ο χρήστης</th>
            <th>Χρήστης</th>
            <th>Διαγραφή</th>
            <th>Τροποποίηση</th>
        </tr>
    </thead>
    
    <tbody>
     
      
          
        <?php
            $query ="SELECT count(*) FROM book;";  // Metrame poses seires exeis o pinakas gia na dhmiourgisoume to analogo paginator
            $count_books = mysqli_query($connection,$query);    
            checkquery($count_books);
        
            $row = mysqli_fetch_row($count_books);
            $count = $row[0];    
            $pegi= intval(($count/10) + 1); // Upologizoume poses selides tha exei o peginator
   
            $page = 1;
        
            if(isset($_GET['$page'])) // Elegxos gia na min mporei o xristis na mhn paei arnhtiko i parapanw apo tis selides pou exoume
            {
                $page = $_GET['$page'];
                if($page<1)
                {
                    $page=1;
                }
                else if($page >= $pegi)
                {
                    $page= $pegi;
                }
                    
            }
        
      
            $query ="SELECT * FROM book; ";   
            $view_books = mysqli_query($connection,$query);
            checkquery($view_books);
            $k=1; // Metritis kai deikths ston pinaka     

            while($row = mysqli_fetch_assoc($view_books))
            {
                
                if( $k > ($page*10)-10 and $k<= ($page*10) ) // gia na emfanizei mono osa exei sthn selida
                {
                    $book_id = $row['id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $category = $row['category'];
                    $pages = $row['pages'];
                    $book_img = $row['cover'];
                    $approx_read = $row['approx_read_time'];
                    $pub_date = $row['published_date'];
                    $rating = $row['rating'];
                    $times_read = $row['times_read'];
                    $username = $row['username'];
                    
                    // Gia na provalete i hmerominia sthn morfh poy theloyme
                    $pub_date = strtotime($pub_date);
                    $pub_date = date("d/m/Y ", $pub_date);
                   
                    echo"<tr>";
                        echo"<td>{$k}</td>";
                        echo"<td>{$title}</td>";
                        echo"<td>{$author}</td>";
                        echo"<td>{$category}</td>";
                        echo"<td>{$pages}</td>";
                        echo"<td><img width='100' src='images/$book_img' alt='image'></td>";
                        echo"<td>{$approx_read}</td>";
                        echo"<td>{$pub_date}</td>";
                        echo"<td>{$rating}</td>";
                        echo"<td>{$times_read}</td>";
                        echo"<td>{$username}</td>";
                        echo"<td><a href='view_books.php?delete=$book_id'>Διαγραφή</a></td>";
                        echo"<td><a href='edit_book.php?book_id=$book_id'>Τροποποίηση</a></td>";
                    echo "</tr>";
                }
                if($k>($page*10)) break; // Spaei to while afou emfanisoume ta 10 stoixeia pou theloume
                $k++;
                
                
                
            } 
        ?>
               
        <div class="center">
            <div class="pagination">
                <?php
                    if($page-1>0)
                    { 
                        ?> <a href="view_books.php?$page=<?php echo $page-1 ;?>">&laquo;</a>  <?php // Gia na min emfanizetai to proigoumeno otan eimaste sto 1  
                    }
                
                    for($i=1; $i<=$pegi; $i+=1)
                    {    
                        ?> <a href="view_books.php?$page=<?php echo $i ;?>" <?php if($page == $i) {?> class = "active" <?php } ?> ><?php echo $i; ?> </a>  <?php // otan eimaste sthn sugekrimeni selida na einai active
                    }   

                    if($page+1<=$pegi)
                    {     
                        ?>  <a href="view_books.php?$page=<?php echo $page+1 ;?>" >&raquo;</a> <?php // Gia na min emfanizetai to epomeno  otan eimaste sthn teleutaia selida
                    }
                    
                ?>
            </div>
        </div>
        
    </tbody>  
</table>

<?php
if(isset($_GET['delete']))
{
   $book_id = $_GET['delete'];
    
    $query = "DELETE FROM book WHERE id = {$book_id}";
    $delete_query = mysqli_query($connection,$query);
   
    checkquery($delete_query);
    ?> <script> location.replace("view_books.php"); </script>   <?php // To header ths php dhmourgouse provlhmata  
}
?>