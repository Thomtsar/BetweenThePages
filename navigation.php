<?php
    if(isset($_POST['create_table']))    
    {
       include "default_table.php";
    }
?>
    
<navigation>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a style=" font-family:'Indie Flower'" class="navbar-brand" href="index.php">In Between The Pages</a>
            </div>
    
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="insert_book.php">Εισαγωγή Βιβλίων</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="view_all_books.php">Προβολή Βιβλίων<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="view_all_books.php">Προβολή όλων των βιβλίων</a></li>
                            <li><a href="view_books.php?$page=1">Προβολή των βιβλίων ανα δεκάδες</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="view_all_books.php">Αναζήτηση<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="search_date.php">Με βάση την ημερομηνία έκδοσης</a></li>
                            <li><a href="search_author.php">Με βάση τον συγγραφέα</a></li>
                            <li><a href="search_pages.php">Με βάση τις σελίδες του βιβλίου</a></li>
                        </ul>
                    </li>
                   
                </ul>
                
                
                
                <form action="" method="post" role="form">
                   
                       
                    <?php
                        
                        $query = "SHOW TABLES;";
                    
                        $tables_query = mysqli_query($connection,$query); // pairnoume to onoma tou table pou exoume
                        checkquery($tables_query);
                        $table = ""; // vazoume keno table ws deafault
                    
                        while ($row = mysqli_fetch_row($tables_query)) // se periptwsi pou dhmiourgithoun alloi pinakes argotera
                        {   
                            
                            if($row[0] == "book")
                            {
                                $table = $row[0];
                                break;
                            }
                            
                        }
                   
                        if( $table == "book") 
                        {
                            ?> <button type="submit" name = "create_table" class="btn btn-success navbar-btn navbar-right disabled" disabled >Ο Πίνακας Δημιουργήθηκε</button> <?php
                        }
                        else
                        {
                            ?>  <button type="submit" name = "create_table" class="btn btn-primary navbar-btn navbar-right" >Δημιούργησε τον πίνακα</button> <?php
                        }
                        
                    ?>
                        
                </form>
            </div>
        </div>
    </nav>
    
    
    
</navigation>




