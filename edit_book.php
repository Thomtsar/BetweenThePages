<?php include "db.php"; ?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>

   
<?php
    if(isset($_GET['book_id'])) // pairnoume apo to url to book_id kai vriskoume thn seira sthn vash mas
    {
        $book_id = $_GET['book_id'];

        $query ="SELECT * FROM book WHERE id = $book_id ";   
        $select_book = mysqli_query($connection,$query);
        checkquery($select_book);

        while($row = mysqli_fetch_assoc($select_book))
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
        }
    }

    if(isset($_POST['edit_book'])) // pairnoume auta pou egrapse o xristis i osa uparxoun kai ta kanoume update sthn vash mas
    {   
        
        
        if($_FILES['image']['size'] > 2000000 or $_FILES['image']['error'] >0 )
        {
            echo "Υπάρχει πρόβλημα με την φωτογραφία";
        }
        else if(mysqli_num_rows($check_query) < 1 and $_FILES['image']['size'] < 2000000)
        {
        
            $title = $_POST['title'];
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

            move_uploaded_file($book_img_tmp, "images/$book_img");

            if(empty($book_img)) // se periptwsh pou den dialeksei kapoia kainourgia eikona i to akurwsei na uparxei i palia
            {
                $query = "SELECT * FROM book WHERE id = $book_id";
                $select_image =mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($select_image))
                {
                    $book_img = $row['cover'];
                }
            }


            $query = "UPDATE book SET ";
            $query .="title  = '{$title}', ";
            $query .="author = '{$author}', ";
            $query .="category   = '{$category}', ";
            $query .="pages = '{$pages}', ";
            $query .="cover = '{$book_img}', ";
            $query .="approx_read_time = '{$approx_read}', ";
            $query .="published_date = '{$pub_date}', ";
            $query .="rating   = '{$rating}', ";
            $query .="times_read   = '{$times_read}', ";
            $query .="username   = '{$username}' ";
            $query .="WHERE id = '{$book_id}' ";

            $edit_book_query = mysqli_query($connection,$query);
            checkquery($edit_book_query);
        }
    }
?>
  
<form action="" method="post" enctype="multipart/form-data" >   
    <div class="col-xs-4"> 
        <div class = "form-group">      
            <label for="title"> Τιτλος Βιβλίου</label>
            <input type="text" class="form-control" value="<?php echo $title;?> " name="title" readonly> <!-- einai read only giati to kathe vivlio prepei na uparxei mono mia fora -->
        </div>
     
        <div class = "form-group">
            <label for="author">Συγγραφέας</label>
            <input type="text" class="form-control" value="<?php echo $author;?>"name="author">
        </div>
        
        <div class = "form-group">
            <label for="category">Είδος</label>
            <input type="text" class="form-control" value="<?php echo $category;?>"name="category">
        </div>
           
        <div class = "form-group">
            <label for="pages">Σελίδες</label>
            <input type="number" class="form-control" min="1" max="9999" value="<?php echo $pages;?>" name="pages" >
        </div>
        
        <div class = "form-group">
            <img width= "100" src="images/<?php echo $book_img; ?>" alt="">
            
            <input type="file" name="image" >
              <label for="image">Εξώφυλλο(MAX 2MB)</label>
        </div>
    
        <div class = "form-group ">   
            <label for="approx_read">Κατα προσέγγιση χρόνος που χρειάζεται για το βιβλίο(Ωρες)</label>
            <input type="number" step="0.01" max ="99"class="form-control" value="<?php echo $approx_read;?>" name="approx_read">    
        </div>
       
         <div class = "form-group">
            <label for="pub_date">Ημερομηνία έκδοσης</label>
            <input type="date" class="form-control" value="<?php echo $pub_date;?>" name="pub_date">
        </div>
        
        <div class = "form-group">
            <label for="rating">Αξιολόγηση</label>
            <input type="number" step="0.01" min="0" max="5" class="form-control" value="<?php echo $rating;?>" name="rating" placeholder="Μεγιστο 5/5">
        </div>
        
        <div class = "form-group">
            <label for="times_read">Φορές που το έχετε διαβάσει</label>
            <input type="number" min ="0" max="99" class="form-control" value="<?php echo $times_read;?>" name="times_read">
        </div>
       
        <div class = "form-group">
            <label for="username">Username</label>
            <input type="text"  class="form-control" value="<?php echo $username;?>" name="username">
        </div>
    
        <div class ="form_group" >
            <input class="btn btn-primary" type = "submit" name="edit_book" value="Τροποποίηση Βιβλίου">
        </div>
    </div>
</form>
    