# Pagination
 The pagination module for web sites.

    Technology stack - HTML, PHP, MySql, Bootstrap framework.

 working code example 

 $test = new Pagination($db, 2, "users"); 

To use this pagination class you have to pass 3 arguments. The first one is the database connection. Second one is the number of items per page (LIMIT), and the last one is the table's name, from where Pagination class will show you items.

After this, you have to do some other changes. Nearby is the piece of Paginate() function code. Here is the items showing process. Write some code, as you usually do, to show items how you want. 

public function Paginate() 
        { 
                ......

            ?><div class="text-center mt-5"><?
                while ($row = $query->fetch(PDO::FETCH_OBJ)) 
                    {
                        echo '<h5>';
                        echo $row->your_column; //Add your code here
                        echo '</h5>';
                    }
            ?></div><?      
        }