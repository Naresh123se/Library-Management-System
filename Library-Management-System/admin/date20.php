<?php
//need data connection file
require('dbconn.php');
?>
<?php
//checks whether the $_SESSION['UserId'] variable is set 
if ($_SESSION['UserId']) {
?>
    <!-- Html  declaration -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--tag specifies the title of the page-->
        <title>LMS</title>
        <!--tags that reference external CSS files-->
        <!--CSS files are from the Bootstrap framework-->
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    </head>
    <!--Body-->

    <body>
        <!-- class for css -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="home.
                        php"><img src="images/nn.png" class="logo" /> LMS </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="images/user.png" class="nav-avatar" />
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="home.php"><i class="menu-icon icon-home"></i>Dashboard
                                    </a></li>
                                <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>


<?php
// Check if user ID is provided
if (!isset($_GET['id'])) {
    header("Location: view_users.php");
}else{
    echo "Record in use, cannot delete." . $conn->error;
    exit();
}

// Get user ID from query parameter
$rno = $_GET['id'];


// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete user from database
$sql = "DELETE FROM LMS.user WHERE UserId='$rno'";
if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully";
} else {
    echo "Error deleting user: " . $conn->error;
}

// Close database connection
$conn->close();
?>





                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--Footer  -->
        <?php include('footer.php') ?>

        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <!-- jQuery library version 1.9.1 -->
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <!-- jQuery UI library version 1.10.1 -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Bootstrap library version 3.0.0 -->
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <!-- Flot library version 0.8.1 -->
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <!-- Flot resize library -->
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <!-- DataTables library version 1.10.0 -->
        <script src="scripts/common.js" type="text/javascript"></script>
        <!-- Custom JavaScript code -->

    </body>

    </html>
<?php } else {
    //Display aleart box message
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>