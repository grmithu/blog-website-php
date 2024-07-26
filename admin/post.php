<?php include('inc/header.php'); ?>
<?php include('inc/topbar.php'); ?>
<?php include('inc/menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage All Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage All Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <?php

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';


      if ( $do == 'Manage' ){ ?>

        <!-- Body Content Start -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">

                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">Manage All Post</h3>
                    </div>
                    <div class="card-body">

                      <table class="table table-border table-hover table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#Sl.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                            <th scope="col">Post Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                            $sql = "SELECT * FROM post ORDER BY id DESC";
                            $allPosts = mysqli_query($db, $sql);
                            $i = 0;
                            while( $row = mysqli_fetch_assoc($allPosts) ){
                              $id             = $row['id'];
                              $title          = $row['title'];
                              $description    = $row['description'];
                              $image          = $row['image'];
                              $category_id    = $row['category_id'];
                              $author_id      = $row['author_id'];
                              $status         = $row['status'];
                              $tags           = $row['tags'];
                              $post_date      = $row['post_date'];
                              $i++;
                              ?>

                              <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td>
                                  <?php
                                    if ( !empty($image) ){  ?>
                                      <img src="img/post/<?php echo $image; ?>" width="50">
                                    <?php  }
                                    else{ ?>
                                      <img src="img/post/default.png" width="50">
                                  <?php  }
                                  ?>
                                </td>
                                <td><?php echo $title; ?></td>
                                <td>
                                  <?php
                                    $sql = "SELECT * FROM category";
                                    $all_cat = mysqli_query($db, $sql);
                                    while( $row = mysqli_fetch_assoc($all_cat) ){
                                      $cat_id     = $row['cat_id'];
                                      $cat_name   = $row['cat_name']; 
                                        
                                        if ( $category_id == $cat_id ){
                                          echo '<p>'. $cat_name .'</p>';
                                        }

                                      }
                                  ?>
                                </td>
                                <td>
                                  <?php
                                    $sql = "SELECT * FROM users";
                                    $all_users = mysqli_query($db, $sql);
                                    while( $row = mysqli_fetch_assoc($all_users) ){
                                      $id         = $row['id'];
                                      $fullname   = $row['fullname']; 
                                        if ( $author_id == $id ){
                                          echo '<p>'. $fullname .'</p>';
                                        }
                                      }
                                  ?>
                                </td>
                                <td>
                                  <?php  
                                    if ( $status == 0 ){ ?>
                                      <span class="badge badge-danger">Draft</span>
                                    <?php }
                                    else{ ?>
                                      <span class="badge badge-success">Published</span>
                                    <?php }
                                  ?>  
                                  </td>
                                <td><?php echo $post_date; ?></td>
                                <td>
                                  <div class="action-bar">
                                    <ul>
                                      <li><a href="post.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></li>
                                      <li><a href="" data-toggle="modal" data-target="#delete<?php echo $id ?>"><i class="fa fa-trash" ></i></a></li>
                                    </ul>
                                  </div>
                                </td>                            
                              </tr>

                          <!-- Modal -->
                          <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to delete this Post?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body text-center">

                                  <div class="modal-confirmation">
                                    <ul>
                                      <li>
                                        <a href="post.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Confirm</a>
                                      </li>
                                      <li>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                      </li>
                                    </ul>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>

                          <?php  }
                          ?>                          
                        </tbody>
                      </table>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
          <!-- Body Content End -->

      <?php }
      else if( $do == 'Add' ){ ?>
          
        <!-- Body Content Start -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">

                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Add New Post</h3>
                  </div>
                  <div class="card-body">
                    <form action="post.php?do=Insert" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" autocomplete="off" required="required">
                          </div>

                          <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id" required="required">
                              <option>Please Select a Category</option>

                              <?php
                                $sql = "SELECT * FROM category ORDER BY cat_name ASC";
                                $all_cat = mysqli_query($db, $sql);
                                while( $row = mysqli_fetch_assoc($all_cat) ){
                                  $cat_id     = $row['cat_id'];
                                  $cat_name   = $row['cat_name']; ?>
                                  <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                              <?php  }
                              ?>
                            </select>
                          </div>  

                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="1">Published</option>
                              <option value="0">Draft</option>
                            </select>
                          </div>  

                          <div class="form-group">
                            <label>Meta Tags</label>
                            <input type="text" name="tags" class="form-control" autocomplete="off" required="required">
                          </div>   

                          <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="image" class="form-control-file">
                          </div>                   

                        </div>

                        
                        <div class="col-lg-6">
                          
                          <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="15"></textarea>
                          </div>

                          <div class="form-group">
                            <input type="submit" name="addPost" class="btn bg-gradient-primary btn-flat" value="Publish Post">
                          </div>
                        </div>
                      </div>
                      
                    </form>
                    
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
        <!-- Body Content End -->

      <?php }
      else if( $do == 'Insert' ){
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
          $title        = mysqli_real_escape_string($db, $_POST['title']);
          $description  = mysqli_real_escape_string($db, $_POST['description']);
          $category_id  = $_POST['category_id'];
          $author_id    = $_SESSION['id'];
          $status       = $_POST['status'];
          $tags         = mysqli_real_escape_string($db, $_POST['tags']);

          $image     = $_FILES['image']['name'];
          $imageTmp  = $_FILES['image']['tmp_name'];


            if ( !empty($image) )  {
              // Change the Image File Name
              $image = rand(0,5000000) . '_' . $image;
              move_uploaded_file($imageTmp, "img/post/" . $image);

              $sql = "INSERT INTO post (title, description, image, category_id, author_id, status, tags, post_date) VALUES ('$title', '$description', '$image', '$category_id', '$author_id', '$status', '$tags', now())";

              $addPost = mysqli_query($db, $sql);

              if ( $addPost ){
                header("Location: post.php?do=Manage");
              }
              else{
                die( "MySQLi Error. " . mysqli_error($db) );
              }
            }
          }
        }
          
      else if( $do == 'Edit' ){
        if ( isset($_GET['id']) ){
          $update_id = $_GET['id'];

          $sql = "SELECT * FROM users WHERE id = '$update_id'";
          $the_user = mysqli_query($db, $sql);
          while( $row = mysqli_fetch_assoc($the_user) ){
            $id         = $row['id'];
            $fullname   = $row['fullname'];
            $email      = $row['email'];
            $username   = $row['username'];
            $password   = $row['password'];
            $phone      = $row['phone'];
            $address    = $row['address'];
            $role       = $row['role'];
            $status     = $row['status'];
            $image      = $row['image'];
            $join_date  = $row['join_date'];
            ?>

        <!-- Body Content Start -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">

                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Update User Info</h3>
                  </div>
                  <div class="card-body">
                    <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control" autocomplete="off" required="required" value="<?php echo $fullname; ?>">
                          </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off" required="required" value="<?php echo $username; ?>" disabled>
                          </div>

                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" autocomplete="off" required="required" value="<?php echo $email; ?>">
                          </div>

                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Set a New Password">
                          </div>

                          <div class="form-group">
                            <label>Re-Type Password</label>
                            <input type="password" name="rePassword" class="form-control" autocomplete="off" placeholder="Repeat The New Password">
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Phone No.</label>
                            <input type="text" name="phone" class="form-control" autocomplete="off" value="<?php echo $phone; ?>">
                          </div>

                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" autocomplete="off" value="<?php echo $address; ?>">
                          </div>

                          <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control" name="role">
                              <option value="1" <?php if ( $role == 1 ){ echo 'selected'; } ?>>Super Admin</option>
                              <option value="2" <?php if ( $role == 2 ){ echo 'selected'; } ?>>Editor</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="1" <?php if ( $status == 1 ){ echo 'selected'; } ?>>Active</option>
                              <option value="0" <?php if ( $status == 0 ){ echo 'selected'; } ?>>In-Active</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Profile Picture</label>
                            <?php
                              if ( !empty($image) ){ ?>
                                <img src="img/users/<?php echo $image; ?>" width="35">
                              <?php }
                              else{ ?>
                                <img src="img/users/default.png" width="35">
                              <?php }
                            ?>
                            <input type="file" name="image" class="form-control-file">
                          </div>

                          <div class="form-group">
                            <input type="hidden" name="updateUserID" value="<?php echo $id; ?>">
                            <input type="submit" name="updateUser" class="btn bg-gradient-primary btn-flat" value="Save Changes">
                          </div>
                        </div>
                      </div>
                      
                    </form>
                    
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
        <!-- Body Content End -->



        <?php  }
        }
      }

      else if ( $do == 'Update' ){
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
          $updateUserID = $_POST['updateUserID'];

          $fullname     = $_POST['fullname'];
          $email        = $_POST['email'];
          $password     = $_POST['password'];
          $rePassword   = $_POST['rePassword'];
          $phone        = $_POST['phone'];
          $address      = $_POST['address'];
          $role         = $_POST['role'];
          $status       = $_POST['status'];

          $image        = $_FILES['image']['name'];
          $imageTmp     = $_FILES['image']['tmp_name'];

          if ( !empty($password) && !empty($image) ){

            // Encryption Password
            if ( $password == $rePassword ){
              $hassedPass = sha1($password);
            }            

            // Change the Image File Name
            $image = rand(0,5000000) . '_' . $image;
            move_uploaded_file($imageTmp, "img/users/" . $image);

            // Delete Existing Image
            $query = "SELECT * FROM users WHERE id = '$updateUserID'";
            $read_user_data = mysqli_query($db, $query);
            while( $row = mysqli_fetch_assoc($read_user_data) ){
              $existingImage      = $row['image'];
            }
            unlink("img/users/". $existingImage);

            // Update SQL With Image and Password
            $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status', image='$image' WHERE id = '$updateUserID'";

            $addUser = mysqli_query($db, $sql);

            if ( $addUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die( "MySQLi Error. " . mysqli_error($db) );
            }            
          }

          else if ( empty($password) && !empty($image) ) {
              // Change the Image File Name
              $image = rand(0,5000000) . '_' . $image;
              move_uploaded_file($imageTmp, "img/users/" . $image);

              // Delete Existing Image
              $query = "SELECT * FROM users WHERE id = '$updateUserID'";
              $read_user_data = mysqli_query($db, $query);
              while( $row = mysqli_fetch_assoc($read_user_data) ){
                $existingImage      = $row['image'];
              }
              unlink("img/users/". $existingImage);

              // Update SQL
              $sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', role='$role', status='$status', image='$image' WHERE id = '$updateUserID'";

              $addUser = mysqli_query($db, $sql);

              if ( $addUser ){
                header("Location: users.php?do=Manage");
              }
              else{
                die( "MySQLi Error. " . mysqli_error($db) );
              }
          }

          else if ( !empty($password) && empty($image) ) {
                if ( $password == $rePassword ){
                  // Encryption Password
                  $hassedPass = sha1($password);
                }   

              if ( $password == $rePassword ){
                // Encryption Password
                $hassedPass = sha1($password);
              } 

              // Update SQL
              $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status' WHERE id = '$updateUserID'";

              $addUser = mysqli_query($db, $sql);

              if ( $addUser ){
                header("Location: users.php?do=Manage");
              }
              else{
                die( "MySQLi Error. " . mysqli_error($db) );
              }
          }
          else{
            // Update SQL
              $sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', role='$role', status='$status' WHERE id = '$updateUserID'";

              $addUser = mysqli_query($db, $sql);

              if ( $addUser ){
                header("Location: users.php?do=Manage");
              }
              else{
                die( "MySQLi Error. " . mysqli_error($db) );
              }
          }


        }
      }

      else if ( $do == 'Delete' ){
        if ( isset($_GET['id']) ){
          $delete_user_id = $_GET['id'];

            // Delete Existing Image
            $query = "SELECT * FROM users WHERE id = '$delete_user_id'";
            $read_user_data = mysqli_query($db, $query);
            while( $row = mysqli_fetch_assoc($read_user_data) ){
              $existingImage      = $row['image'];
            }
            unlink("img/users/". $existingImage);

            // Delete The User
            $sql = "DELETE FROM users WHERE id = '$delete_user_id'";
            $confirmDelete = mysqli_query($db, $sql);

            if ( $confirmDelete ){
              header("Location: users.php");
            }
            else{
              die("MySQLi Error. " . mysqli_error($db));
            }

        }
      }
    
  ?>







  </div>


<?php include('inc/footer.php'); ?>




    <!-- Body Content Start -->
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
              </div>
              <div class="card-body">

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section> -->
    <!-- Body Content End -->