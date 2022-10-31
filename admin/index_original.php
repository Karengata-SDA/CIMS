<?php
session_start();


include('includes/config.php');

include('./conn.php');


//$orgCODE = $_SESSION['orgCODE'];
//$url = $_SERVER['HTTP_REFERER'];
//echo 'Referer: '$url;

$ogc = $_GET['ogc'];

//echo 'Org Code 3: '.$ogc;


$sql = "SELECT * FROM `settings` WHERE `organisation_code` ='{$ogc}' AND `type` = 'webpage_all'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));
$title = $row['value'];

$sql = "SELECT * FROM `settings` WHERE `organisation_code` ='{$ogc}' AND `type` = 'webpage_login' AND `name` = 'logo'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));
$logo_img = $row['value'];

$sql = "SELECT * FROM `settings` WHERE `organisation_code` ='{$ogc}' AND `type` = 'webpage_login' AND `name` = 'background_image'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));
$background_image = $row['value'];



//echo 'SQL 2.: '.$sql.'<br>Title: '.$title;

$_SESSION['loggedin'] = "YES";   // Set session so the user is logged in!


$name = $row['firstname'];
$_SESSION['firstname'] = $name;


if(isset($_POST['login'])) 
{
    $username = $_POST['username'];
    $password = ($_POST['password']);
    //$sql ="SELECT Username,Password FROM people WHERE UserName=:username and Password=:password";

    //$sql = "SELECT * FROM `userdetails` WHERE username = '{$username}' AND password = '{$password}' AND organisation_code ='{$ogc}'";
    //echo 'SQL 1.: '.$sql;
    //die();

    //$query = $dbh->prepare($sql);
    //$query->bindParam(':username', $username, PDO::PARAM_STR);
    //$query->bindParam(':password', $password, PDO::PARAM_STR);
    //$query->execute();

    //$results = $query->fetchAll(PDO::FETCH_OBJ);
    
    //$rowcount = mysqli_num_rows($results);
    //printf("Result set has %d rows.\n", $rowcount);
    
    //echo '<br>SQL 1.: '.$sql.'<br>';
    //echo 'Count.: '.$query->rowCount();
    //if($query->rowCount() > 0)
    
    $queryUser = "SELECT id, username, password FROM userdetails WHERE username = '{$username}' AND password = '{$password}' AND organisation_code ='{$ogc}' LIMIT 1";
    $resultsUser = mysqli_query($conn, $queryUser);
    $numrows = mysqli_num_rows($resultsUser);  
    //echo '<br>SQL Login.: '.$queryUser.'<br>';
    //echo '<br>Result Login: '.$numrows.'<br>';
    //die();

    if($numrows > 0)
    {
        $_SESSION['alogin'] = $_POST['username'];

        $sql = "SELECT * FROM `userdetails` WHERE username = '{$username}' AND password = '{$password}' AND organisation_code ='{$ogc}'";
        $row = mysqli_fetch_array(mysqli_query($conn, $sql));


        //echo 'SQL 2.: '.$sql."<br>\n";

        $_SESSION['loggedin'] = "YES";   // Set session so the user is logged in!


        $name = $row['firstname'];
        $_SESSION['firstname'] = $name;       // Make it so the username can be called by $_SESSION['name']


        $uid = $row['id'];
        $_SESSION['userid'] = $uid;

        //echo 'USer ID.: '.$_SESSION['userid'];
        //die();

        $email = $row['email'];
        $_SESSION['email'] = $email;

        $nangoz = $row['phone'];
        $_SESSION['phone'] = $nangoz;

        $level = $row['level'];
        $_SESSION['level'] = $level;

        $role = $row['role'];
        $_SESSION['role'] = $role;

        $orgid = $row['organisation_id'];
        $_SESSION['orgID'] = $orgid;
        
        //echo "OrgID: ".$orgid;
        //die();

        $department = $row['department'];
        $_SESSION['department'] = $department;

        $permi = $row['permissions'];
        $_SESSION['permissions'] = $permi;

        $status = $row['status'];
        $_SESSION['status'] = $status;

        $inchiyangu = $row['country'];
        $_SESSION['country'] = $inchiyangu;

        $sql = "SELECT * FROM `proprietors` WHERE `id` = '$orgid'";
        $rowOrg = mysqli_fetch_array(mysqli_query($conn, $sql));

        $orgnm = $rowOrg['name'];
        $_SESSION['orgNM'] = $orgnm;

        $orgcd = $rowOrg['code'];
        $_SESSION['orgCD'] = $orgcd;

        $pimind = $rowOrg['primary_industry'];
        $_SESSION['pimind'] = $pimind;

        $secind = $rowOrg['secondary_industry'];
        $_SESSION['secind'] = $secind;

        $terind = $rowOrg['tertiary_industry'];
        $_SESSION['terind'] = $terind;

        $logo = $rowOrg['logo'];
        $_SESSION['logo'] = $logo;

        //echo "First Name: ".$_SESSION['firstname']."\n".$sql;
        //echo "Organisation Name: ".$_SESSION['orgNM'];

        if ($ogc == "nyumbaos") 
        {
            echo "<script type='text/javascript'> document.location = '../index.php; </script>";
        } 
        else 
        {
            echo "<script type='text/javascript'> document.location = 'people.php?set=all'; </script>";
        }
    } 
    else 
    {
        $_SESSION['loggedin'] = "NO";
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title><?php echo $title; ?></title>
        <meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $favicon_img; ?>">
        <link rel="icon" href="<?php echo $favicon_img; ?>" type="image/x-icon">

        <!-- vector map CSS -->
        <link href="../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>



        <!-- Custom CSS -->
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">


        <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
        <!-- //Custom-Stylesheet-Links -->
        <!--fonts -->
        <!-- //fonts -->
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
        <!-- //Font-Awesome-File-Links -->

        <!-- Google fonts -->
        <link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
        <!-- Google fonts -->
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->

        <div class="wrapper  theme-5-active pimary-color-green">
            <!--header class="sp-header">
                    <div class="sp-logo-wrap pull-left">
                            <a href="index.html">
                                    <img class="brand-img mr-10" src="../img/logo.png" alt="brand"/>
                                    <span class="brand-text">CIMS</span>
                            </a>
                    </div>
                    <div class="form-group mb-0 pull-right">
                            <a class="inline-block btn btn-success btn-rounded btn-outline nonecase-font" href="index.html">Back to Home</a>
                    </div>
                    <div class="clearfix"></div>
            </header-->
            
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 error-bg-img" style="background-image: url(../img/<?php echo $background_image; ?>);">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float">

                                <div class="text-center icon">
                                    <!--span class="fa fa-html5"></span-->
                                    <img class="mt-4 mb-4 mr-1" src="../img/<?php echo $logo_img; ?>" alt="" >
                                </div>


                                <!--img class="mt-4 mb-4 mr-1" src="./images/safi-iot_websitelogo.png" alt="" -->

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <!--div class="mb-30">
                                                <h6 class="text-center txt-dark mb-10">Built on NyumbaOS</h6>
                                                <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                        </div-->	
                                        <div class="form-wrap">
                                            <!--form method="post">

                            <label for="" class="text-uppercase text-sm">Your Username </label>
                            <input type="text" placeholder="Username" name="username" class="form-control mb">

                            <label for="" class="text-uppercase text-sm">Password</label>
                            <input type="password" placeholder="Password" name="password" class="form-control mb">

                    

                            <button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

                                            </form-->

                                            <form method="post">

                                                <div class="field-group">
                                                    <span class="fa fa-user" style="color:#7EB347" aria-hidden="true"></span>
                                                    <div class="wthree-field">
                                                        <input name="username" id="text1" type="text" value="" placeholder="Username" style="color: black;">
                                                    </div>
                                                </div>



                                                <div class="field-group">
                                                    <span class="fa fa-lock" style="color:#7EB347" aria-hidden="true"></span>
                                                    <div class="wthree-field">
                                                        <input name="password" id="myInput" type="Password" placeholder="Password">
                                                    </div>
                                                </div>

                                                <div class="wthree-field text-center">
                                                    <button name="login" type="submit" class="btn btn-success  btn-rounded">sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->	
                </div>

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

        <!-- Slimscroll JavaScript -->
        <script src="dist/js/jquery.slimscroll.js"></script>

        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>
    </body>
</html>


