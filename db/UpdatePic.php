<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php if (!isset($_SESSION['u_id'])){header("Location: ../view/login.php?logged_out");exit();}?>   

<?php function update($attribute, $img,$u_id){
  require('db.php');
  $img =file_get_contents($img);
  $img =base64_encode($img);
  $sql ="UPDATE users_picture SET $attribute = '$img' WHERE user_id='$u_id'";
  if(mysqli_query($conn,$sql)== true){header("location: ../view/user.php?update=Success");exit();}
    else{header("location: ../view/user.php?update=Error");exit();}
}?>


<?php
      if (isset($_POST['submit-uploadCover'])) {
        $img =addslashes($_FILES['uploadCoverPic']['tmp_name']);
        update("user_cover",$img,$_SESSION['u_id']);
      }elseif(isset($_POST['submit-uploadProfile'])) {
        $img =addslashes($_FILES['uploadProfilePic']['tmp_name']);
        update("user_profile",$img,$_SESSION['u_id']);
      }else{
        header("location: ../view/user.php?update=Error");
        exit();
      }
?>