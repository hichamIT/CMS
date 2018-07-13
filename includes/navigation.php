<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms/">CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php 
                $query = "SELECT * FROM categories limit 3";
                $select_all = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_all)) {
                    $id = $row['cat_id'];
                    $title = $row['cat_title'];

                    $categoryclass = '';
                    $regestrationclass = '';

                    $page =basename($_SERVER['PHP_SELF']);
                    $registration = 'registration.php';

                    if (isset($_GET['idcategory']) && $_GET['idcategory']==$id) {

                        $categoryclass = 'active';

                    } elseif ( $page == $registration) {

                        $regestrationclass = 'active';
                    }
                    
                    echo "<li class='$categoryclass'><a href='category.php?idcategory=$id'>{$title}</a></li>";
                    
                }
                ?>
                <li><a href='admin'>Admin</a></li>
                <li class='<?php echo $regestrationclass ;?>'><a href='registration'>Registration</a></li>
                <li><a href='contact'>Contact</a></li>

                <?php 
                if (isset($_SESSION['username'])) {
                    if (isset($_GET['idpost'])) {
                        $id = $_GET['idpost'];
                       echo "<li>
                                <a href='admin/posts.php?source=update&p_id={$id}'>Edit Post</a>
                             </li>";
                    }
                }
                ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>