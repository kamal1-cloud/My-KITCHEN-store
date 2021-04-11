

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
        <li><a href="../index.php">View site</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Kamal Habrich <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#category"><i class="fa fa-fw fa-arrows-v"></i>Gestions des Categories<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="category" class="collapse">
               <?php
               if(isset($_SESSION['ROLE']))
               {
                if( $_SESSION['ROLE'] == 'admin')
                {
               
               ?>
                    <li>
                        <a href="./categories.php">List Categories</a>
                    </li>
                    <li>
                        <a href="categories.php?opt=add_category">Ajouter une Categories</a>
                    </li>
                    <li>
                        <a href="categories.php?opt=edit_category">Modifier Categories</a>
                    </li>
                    <li>
                        <a href="categories.php?opt=archived_category">Archiver Categories</a>
                    </li>
                    <?php
                      }elseif ( $_SESSION['ROLE'] == 'manager') {
                        ?>
                        <li>
                            <a href="./categories.php">List Categories</a>
                        </li>
                        <li>
                            <a href="categories.php?opt=add_category">Ajouter une Categories</a>
                        </li>
                        <?php
                      }
                }
                ?>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#product"><i class="fa fa-fw fa-arrows-v"></i>Gestion des Produits<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="product" class="collapse">
                <?php
               if(isset($_SESSION['ROLE']))
               {
                if( $_SESSION['ROLE'] == 'admin')
                {
               
               ?>
                <li>
                        <a href="./produits.php">List des Produits </a>
                    </li>
                    <li>
                        <a href="produits.php?opt=add_product">Ajouter un Produit</a>
                    </li>
                    <li>
                        <a href="produits.php?opt=modif_product">Modifier Produits</a>
                    </li>
                    <li>
                        <a href="produits.php?opt=archived_products">Archiver Produits</a>
                    </li>
                    <?php
                      }elseif ( $_SESSION['ROLE'] == 'manager') {
                        ?>
                          <li>
                        <a href="./produits.php">List des Produits </a>
                    </li>
                    <li>
                        <a href="produits.php?opt=add_product">Ajouter un Produit</a>
                    </li>
                    <?php
                      }
                }
                ?>
                </ul>
            </li>
            <?php
               if(isset($_SESSION['ROLE']))
               {
                if( $_SESSION['ROLE'] == 'admin')
                {
               
               ?>

            <li>
                <a href="javascript:; "data-toggle="collapse"  data-target="#coupon"><i class="fa fa-fw fa-arrows-v"></i> Gestion des coupons<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="coupon" class="collapse">
                    <li>
                        <a href="./coupon.php">Coupon List</a>
                    </li>
                    <li>
                        <a href="coupon.php?opt=add_coupon">Add Coupon</a>
                    </li>
                </ul>
            </li>
            <?php
                }
                      }
                        ?>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i>Gestion des posts<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts" class="collapse">
                <?php
               if(isset($_SESSION['ROLE']))
               {
                if( $_SESSION['ROLE'] == 'admin')
                {
               
               ?>
                <li>
                        <a href="./posts.php">List posts </a>
                    </li>
                    <li>
                        <a href="posts.php?opt=add_post">Ajouter un post</a>
                    </li>
                    <li>
                        <a href="posts.php?opt=modif_post">Modifier Posts</a>
                    </li>
                    <li>
                        <a href="posts.php?opt=archived_posts">Archiver Posts</a>
                    </li>
                    <?php
                      }elseif ( $_SESSION['ROLE'] == 'manager') {
                        ?>
                <li>
                        <a href="./posts.php">List posts </a>
                    </li>
                    <li>
                        <a href="posts.php?opt=add_post">Ajouter un post</a>
                    </li>
<?php
                      }
                }
                ?>
                </ul>
            </li>

            <?php
               if(isset($_SESSION['ROLE']))
               {
                if( $_SESSION['ROLE'] == 'admin')
                {
               
               ?>
            <li>
                <a href="javascript:; "data-toggle="collapse"  data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users" class="collapse">

                    <li>
                        <a href="./users.php">View All users</a>
                    </li>
                    <li>
                        <a href="users.php?opt=add_user">Add User</a>
                    </li>
                </ul>
            </li>
            <?php
                      }
                }
                ?> 
                                <?php
               if(isset($_SESSION['ROLE']))
               {
                if( $_SESSION['ROLE'] == 'admin')
                {
               
               ?>
             <li>
                <a href="javascript:; "data-toggle="collapse"  data-target="#team"><i class="fa fa-fw fa-arrows-v"></i> Team<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="team" class="collapse">

                    <li>
                        <a href="./Team.php">Team</a>
                    </li>
                    <li>
                        <a href="Team.php?opt=add_member">Add member</a>
                    </li>
                
                   
                </ul>
            </li> 
            <?php
                      }
                    }
                        ?>

<li>
                <a href="javascript:; "data-toggle="collapse"  data-target="#terms"><i class="fa fa-fw fa-arrows-v"></i>Terms<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="terms" class="collapse">

                    <li>
                        <a href="./users.php">View All Terms</a>
                    </li>
                    <li>
                        <a href="users.php?opt=add_user">Add Terms</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./comments.php"><i class="fa fa-fw fa-wrench"></i> Comment</a>
            <li/>

      
            <li class="active">
                <a href="./profile.php"><i class="fa fa-user "></i> Profile</a>
            </li>
           

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>