

                            <form action=""  method="post">
                                <div class="form-group">
                                    <label for="cat_title">Update Category</label>   

                                <?php 
                                if (isset($_GET['update'])) {
                                    $cat_update_id = $_GET['update'];
                                    $query = "SELECT * FROM categories WHERE cat_id = {$cat_update_id}";
                                    $update_id = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($update_id)) {
                                        $title = $row['cat_title'];
                                       echo " <input type='text' name='cat_title' class='form-control' value = '{$title}'> ";
                                        
                                    }

                                }

                                if (isset($_POST['update'])) {
                                    $update_title = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$update_title}' WHERE cat_id = {$cat_id} ";
                                   
                                    $update_query = mysqli_query($connection,$query);
                                    if(!$update_query){
                                        die("failed query".mysqli_error($connection));
                                    }
                                    //header("Location: categories.php");
                                } 
                                ?>
                                    
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" class="btn btn-primary" value="Edit">
                                </div>
                            </form>