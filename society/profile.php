<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style1.css">
        <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
        <link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css" />
        <link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
</head>
<body>
 
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>
                                <?php
                                    $issue_q = $con->query("SELECT * FROM `account` WHERE `username` = '$_SESSION[username]' ") or die(mysqli_error($con));
                                    $u_issue = $issue_q->fetch_array();
                                ?>
<div class="card-container">
    <img src ="<?php if($u_issue['photo'] == "default.png"){echo "image/".$u_issue['photo'];}else{echo "upload/".$u_issue['photo'];}?>" alt="user"/>
    <h2><?php echo $u_issue['fullname']; ?></h2>
    <h5><?php echo $u_issue['past-address']; ?></h5>
    <h7><?php echo "E-MAIL :".$u_issue['e-mail']; ?></h7><br/>
    <h7><?php echo "MOBILE NUMBER :".$u_issue['mobile_no']; ?></h7><br/>
    <h7><?php echo "FLAT_ID:".$u_issue['flat_id']; ?></h7><br/><br/>
    <div class="buttons">
        <button class="primary" id = "add_student">
            EDIT PROFILE
        </button>
    </div>
    <div class="buttons">   
        <button class="primary" style = "display:none;" type = "button" id = "cancel_student">
            Cancel
        </button>
    </div>
   <div id = "s_form" style = "display:none;" >
                        <br/>
                                <?php
                                    $issue_q = $con->query("SELECT * FROM `account` WHERE `username` = '$_SESSION[username]' ") or die(mysqli_error($con));
                                    $u_issue = $issue_q->fetch_array();
                                ?>
                            <form onsubmit="return validate();" method = "POST" enctype = "multipart/form-data" action = "profile_change.php?id=<?php echo $u_issue['username']?>" >
                               
                                <div style = "width:40%; margin-left:32%;"> 
                                    <div class = "form-group">
                                        <label>username</label>
                                        <input type = "text" class = "form-control" name = "username" value="<?php echo $u_issue['username']; ?>" readonly required />
                                    </div>
                                    <div class = "form-group">
                                        <label>NEW PASSWORD</label>
                                        <input type = "password" class = "form-control" name = "password" id = "password"/>
                                    </div>
                                     <div class = "form-group">
                                        <label>CONFIRM PASSWORD</label>
                                        <input type = "password" class = "form-control" name = "password1" id = "password1"/>
                                    </div>
                                    <div class = "form-group">
                                        <label>e-mail</label>
                                        <input type = "text" class = "form-control" value="<?php echo $u_issue['e-mail']; ?>" name = "e-mail" />
                                    </div>
                                    <div class = "form-group">
                                        <label>mobile no</label>
                                        <input type = "text" class = "form-control" value="<?php echo $u_issue['mobile_no']; ?>" name = "mobile_no" />
                                    </div>
                                    <div class = "form-group">
                                        <div class="buttons">
                                            <button class="primary" name = "save_profile">Save</button>
                                        </div>
                                    </div>
                                </div>  
                            </form>     
                    </div>
                </div>
        </div>
</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/sidebar.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.dataTables.min.js"></script>
<script src = "js/script.js"></script>
<script type = "text/javascript">
    $(document).ready(function(){
        $('#table').DataTable();
    });

</script>
<script>
    function validate(){

        var a = document.getElementById("password").value;
        var b = document.getElementById("password1").value;
            if (a!=b) {
               alert("Passwords do no match");
               return false;
            }  
    }
    $(document).ready(function () {
        $("#password, #password1").keyup(checkPasswordMatch);
    });
</script>
<script>
$(document).ready(function(){
    $(".dropdown-menu").hide();
  $("a.notif").click(function(){
    $(".dropdown-menu").slideToggle(1000);
  });
});
</script>
</html>