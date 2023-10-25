<?php 
 session_start();
 require('functions.php');
 if(!isset($_SESSION['email'])){
     header("Location: signin.php");
 }

 define("DB", "./database/db.txt");



if(isset($_POST['name'])){
    $name = $_POST['name'];
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
    $password = $_POST['password']; 
	$role = $_POST['role'];
	$dataLast = edit($_POST['id']);
	$content = str_replace($dataLast,"$role, $name ,$email,$password,$id",file_get_contents(DB));
	saveTxt(DB,$content,'w');
	header('location:dashboard.php');
	
	
}

if(!empty($_GET['id'])){
	$loadEdit = edit($_GET['id']);
	$explEdit = explode(',',$loadEdit);
    $id = $explEdit[4];
	$username = $explEdit[1];
	$email = $explEdit[2];
    $password = $explEdit[3];
	$role = $explEdit[0];
	
}






function edit($id){
	$myDataBase = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($myDataBase as $data){
		$exp = explode(',',$data);
		$myid = $exp[4];
		if($myid==$id){
			$out = $data;
			break;
		}else{
			$out = null;
		}
		
	}
	
return $out;

}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <div class="card-body p-5">
                                    <form action="update.php" method="POST">
                                        <input type="text" id="id" name="id" class="form-control d-none" value="<?=$id;?>"/>
                                        <input type="text" id="id" name="password" class="form-control d-none" value="<?=$password;?>"/>

                                        <div class="form-floating mb-4">
                                        <input type="text" id="name" name="name" class="form-control" value="<?=$username;?>" placeholder="Enter User Name" />
                                        <label class="form-label" for="name">User Name</label>
                                        </div>                  

                                    <div class="form-floating mb-4">
                                        <input type="email" id="email" name="email" class="form-control " value="<?=$email;?>" placeholder="Your Email" />
                                        <label class="form-label" for="email">User Email</label>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">

                                        <div class="form-floating">
                                            <select class="form-select" name="role" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <option value="<?=$role;?>" selected><?=$role;?></option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                            <option value="manager">Manager</option>
                                           
                                            </select>
                                            <label for="floatingSelectGrid">Roll</label>
                                        </div>


                                        </div>
                                    </div>

                                    <div class="submit form text-center">
                                        <a href="#"><button type="submit" class="btn btn-info btn-block">Update</button></a>
                                        <a href="admin.php"><button type="button" class="btn btn-secondary btn-block">Cancel</button></a>
                                    </div>
                                </form>

                                </div>
                        <p class="text-center mb-0">Already have an Account? <a href="">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>