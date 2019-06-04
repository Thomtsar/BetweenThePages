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
            <div class="col-xs-6">
      
                <div class = "form-group">      
                    <label for="search_date">Γράφοντας την ημερομηνία της επιλογής σας μπορείται να δείτε ποια βιβλία δημοσιεύτηκαν πριν, μετά ή την συγκεκριμένη ημερομηνία </label>
                    <input type="date" class="form-control" Placeholder = "ηη-μμ-χχχχ" name="input_date" required>
                </div>

                <div class="btn-group">

                    <button type="submit" name="older" class="btn btn-primary">Παλιότερα</button>
                    <button type="submit" name="this" class="btn btn-primary">Ακριβής Ημερομηνία</button>
                    <button type="submit"  name="newer" class="btn btn-primary">Μεταγενέστερα</button>
                </div>
             </div> 
     
        </form>
            
        <?php
            
            // Prota dimiourgoume ena query gia na mas emfanizetai kenos o pinakas kai sthn sunexeia to allazoume me auto poy zitaei o xrhsths
            $query = "SELECT * FROM book where id=-1;";

            if(isset($_POST['older']))
            {
                $result = $_POST['input_date'];
                $query ="SELECT * FROM book WHERE published_date < '{$result}' ORDER BY published_date ; ";   
            }

            if(isset($_POST['this']))
            {
                $result = $_POST['input_date'];
                $query ="SELECT * FROM book WHERE published_date = '{$result}' ORDER BY published_date ; ";   
            }

            if(isset($_POST['newer']))
            {
                $result = $_POST['input_date'];
                $query ="SELECT * FROM book WHERE published_date > '{$result}' ORDER BY published_date ; ";   
            }
 
            $view_books = mysqli_query($connection,$query);
            checkquery($view_books);
            $k=1; // Arithmos dipla apo ton pinaka
         
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
                    
                // Gia na emfanizetai i imerominia sthn morfh pou theloume
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
