<?php include "header.php"; ?>
<?php include "db.php"; ?>
<?php include "navigation.php"; ?>
  
<?php 
   if(isset($_GET['book_name'])) 
    { 
        $inserted_book = $_GET['book_name'];
        
        $query = "SELECT * FROM book WHERE title = '{$inserted_book}';";
        $thank_query = mysqli_query($connection,$query);
        checkquery($thank_query);

        $row = mysqli_fetch_assoc($thank_query); // prokeimenou na exoume gia parakatw ta stoixeia tou vivliou poy molis evale o xrhsths
            
        $book_id = $row['id'];
        $title = $row['title'];
        $author = $row['author'];
        $category = $row['category'];
        $pages = $row['pages'];
        $approx_read = $row['approx_read_time'];
        $pub_date = $row['published_date'];
        $rating = $row['rating'];
        $times_read = $row['times_read'];
        $username = $row['username'];    
       
       
    }
?>
<div class="center">  
   
    <h1> Ευχαριστούμε για την προσθήκη σου <?php echo $username ?> </h1> 
        <p> Μερικά facts για εσένα</p>
    </div>


<div class="container">
    
    <div class="well center">
        <?php 
            $query = "SELECT * FROM book WHERE username = '{$username}';";
            $username_query  = mysqli_query($connection,$query);
            checkquery($username_query);

            $all_books =0;
            $all_pages =0;
            $average_page =0;
            while($row = mysqli_fetch_assoc($username_query))
            {
                $all_books ++;
                $all_pages += $row['pages'];
                $average_page += $row['approx_read_time']*60/$row['pages'];
            }
            $average_page = $average_page/$all_books;
        
            echo "<p>Χρειάστηκες περίπου <b>" .round($average_page) ."λεπτά</b> ανά σελίδα εχοντας διαβάσει <b>$all_books βιβλίο/α</b> </p>";   
         ?>
    </div>
     
    <div class="well center">
           <?php 
                    $query = "SELECT * FROM book";
                    $all_books_query  = mysqli_query($connection,$query);
                    checkquery($all_books_query);

                    $all_books =0;
                    $all_pages =0;
                
                    while($row = mysqli_fetch_assoc($all_books_query))
                    {
                        $all_books ++;
                        $all_pages += $row['pages'];
                    }
                    $read_all_books = $all_pages * $average_page;
                    $read_all_books_h = $read_all_books /60;
                echo "<p>Θα χρειαζόσουν <b>" . round($read_all_books) ."λεπτά ή " .round($read_all_books_h) . "ώρες</b> για να διαβάσεις και τα <b>$all_books βιβλία με $all_pages σελίδες</b> που υπάρχουν στην σελίδα μας</p>";   
             ?>
     </div>
         
    <div class="row center">   
        <h2> Τα βιβλία με την μεγαλύτερη βαθμολόγία</h2>
        <?php 
            $query = "SELECT * FROM book order by rating DESC LIMIT 3";
            $bigger_rating  = mysqli_query($connection,$query);
            checkquery($bigger_rating);  

            while($row = mysqli_fetch_assoc($bigger_rating))
            {
                
                $this_title = $row['title']; 
                $this_cover = $row['cover'];
            ?>    
            
                <div class="col-sm-4">
                    <div class="well center">
                        <?php 
                            echo "<h3>$this_title</h3>";
                            
                            echo "<br>";
                            echo "<img width='100' src='images/$this_cover' alt='image'>"; 
                        ?>
                    </div>
                </div>    
      <?php } ?> 
    </div>
</div>