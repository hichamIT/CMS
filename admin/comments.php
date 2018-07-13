<?php include("includes/admin_header.php");?>
<?php include("includes/admin_navigation.php");?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            CMS Posts
                            <small>Autor</small>
                        </h1>
                        
                         <?php 
                         if ( isset($_GET['source'])  ) {
                             $source = $_GET['source'];
                            
                         } else {
                             $source ='';
                         }

                         switch ($source) {
                             case 'add':
                                 include "includes/Add_posts.php";
                                 break;
                            case 'update':
                                 include "includes/Update_posts.php";
                                 break;
                             default:
                                 include "includes/View_comments.php";
                                 break;
                         }  
                         
                         ?>   
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include("includes/admin_footer.php");?>