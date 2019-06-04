<?php include "header.php";?>
<?php include "db.php";?>
<?php include "navigation.php";?>
  
  
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
        <form action="" method="post" enctype="multipart/form-data" >
            <div class="col-xs-4">

                <div class = "form-group">      
                    <label for="search_date">Δείτε ποια βιβλία του συγγραφέα που ψάχνεται υπάρχουν στην ιστοσελίδα μας</label>
                    <input type="text" class="form-control" Placeholder = "Συγγραφέας" name="input_author" required>
                </div>

                <button type="submit" name="author" class="btn btn-primary">Αναζήτηση</button>
            </div> 

        </form>



        <?php

            $query = "SELECT * FROM book where id=-1;"; // Gia na emfanizei adeio pinaka sthn arxh

            if(isset($_POST['author']))
            {
                $result = $_POST['input_author'];
                $query ="SELECT * FROM book WHERE author = '{$result}';";   
            }

            $view_books = mysqli_query($connection,$query);
            checkquery($view_books);
            $k=1; // gia na emfanizei enan arithmo dipla apo ton pinaka, to id den mas kanei giati pernaei arithmous otan diagrafoume kapoio stoixeio kai tha mperdepsei ton xristi
            while($row = mysqli_fetch_assoc($view_books))
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

                // Gia na emfanizetai i imerominia stin morfi pou theloume
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
                    echo"<td><a href='view_all_books.php?delete=$book_id'>Διαγραφή</a></td>";
                    echo"<td><a href='edit_book.php?book_id=$book_id'>Τροποποίηση</a></td>";
                echo "</tr>";

                $k++;
            }

        ?> 
        
    </tbody>  
</table>
