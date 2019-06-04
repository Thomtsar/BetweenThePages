<?php include "db.php"; ?>
<?php include "header.php";?>
<?php include "navigation.php";?>


<?php
if(isset($_POST['insert_book']))
{
        $title = $_POST['title'];
        
        $query = "SELECT title FROM book WHERE title = '{$title}';";
        $check_query  = mysqli_query($connection,$query);
        checkquery($check_query);
    
        if($_FILES["image"]["size"] > 2000000 or $_FILES['image']['error'] > 0)
        {
            echo "Υπάρχει πρόβλημα με την φωτογραφία";
        }
        else if(mysqli_num_rows($check_query) < 1 and $_FILES["image"]["size"] < 2000000)
        {

            $author = $_POST['author'];
            $category = $_POST['category'];
            $pages = $_POST['pages'];
            $book_img = $_FILES['image']['name'];
            $book_img_tmp = $_FILES['image']['tmp_name'];
            $approx_read = $_POST['approx_read'];
            $pub_date = $_POST['pub_date'];
            $rating = $_POST['rating'];
            $times_read = $_POST['times_read'];
            $username = $_POST['username'];

           
            
            move_uploaded_file($book_img_tmp,"images/$book_img");
          
            
            $query = "INSERT INTO book(title, author, category, pages,cover ,approx_read_time, published_date, rating, times_read,username) ";
            $query .= "VALUES('{$title}', '{$author}', '{$category}','{$pages}','{$book_img}','{$approx_read}', '{$pub_date}', '{$rating}', '{$times_read}', '{$username}' ) ";

            $create_post_query = mysqli_query($connection,$query);

            checkquery($create_post_query);
            
            header("Location: after_insert.php?book_name={$title}");
        }
        else if(mysqli_num_rows($check_query) >= 1)
        {
            echo "<p>Το βιβλίο αυτό έχει προστεθεί από άλλο χρήστη</p>";
        } 
       
}
?>
   

   
<form action="" method="post" enctype="multipart/form-data" >
    
    <div class="col-xs-4">
       
        <div class = "form-group">      
            <label for="title"> Τιτλος Βιβλίου</label>
            <input type="text" class="form-control " name="title" required>
        </div>

        <div class = "form-group">
            <label for="author">Συγγραφέας</label>
            <input type="text" class="form-control" name="author">
        </div>
        
        <div class = "form-group">
            <label for="category">Είδος</label>
            <input type="text" class="form-control" name="category">
        </div>
           
        <div class = "form-group">
            <label for="pages">Σελίδες</label>
            <input type="number" class="form-control" min="1" max="9999"  name="pages" >
        </div>
        
        <div class = "form-group">
              <label for="image">Εξώφυλλο (MAX 2MB)</label>
            <input type="file"  name="image" >
        </div>
    
        <div class = "form-group ">   
            <label for="approx_read">Κατα προσέγγιση χρόνος που χρειάζεται για το βιβλίο(Ωρες)</label>
            <input type="number" step="0.01" min="0.01" max ="99"class="form-control" name="approx_read">    
        </div>
       
         <div class = "form-group">
            <label for="pub_date">Ημερομηνία έκδοσης</label>
            <input type="date" class="form-control" name="pub_date">
        </div>
        
        <div class = "form-group">
            <label for="rating">Αξιολόγηση</label>
            <input type="number" step="0.01" max="5" class="form-control" name="rating" placeholder="Μεγιστο 5/5">
        </div>
        
        <div class = "form-group">
            <label for="times_read">Φορές που το έχετε διαβάσει</label>
            <input type="number" max="99" class="form-control" name="times_read">
        </div>
       
        <div class = "form-group">
            <label for="username">Username</label>
            <input type="text"  class="form-control" name="username">
        </div>

    
    <div class ="form_group" >
        <input class="btn btn-primary" type = "submit" name="insert_book" value="Προσθήκη Βιβλίου">
    </div>
  
    </div>
  
    
</form>
    