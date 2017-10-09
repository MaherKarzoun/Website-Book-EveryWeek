<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php if (!isset($_SESSION['u_id'])){header("Location: login.php?logged_out");exit();}?>   
<?php require('../inc/header.php');?>

<?php
    function init(){
      require('../db/db.php');
      $sql =" SELECT * FROM users_picture WHERE user_id='".$_SESSION['u_id']."'";
      $result= mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $_SESSION['u_cover']=$row['user_cover'];
      $_SESSION['u_profile']=$row['user_profile'];
      mysqli_close($conn);
    }
?>

<?php init(); ?> 
<div class="person-box">
  <div class="user_inf">
    <div class="cover">
      <?php 
      if(is_null($_SESSION['u_cover']) ){echo '<img class="background" src="../img/coverPicDefault.png"/>';}
      else{echo "<img class='background' src='data:image/jpeg;base64,".$_SESSION['u_cover']."'/>";}
      ?>
      <img class="changeCover" id="changeCover" src="../img/changeCover.png" >
      <form action="../db/UpdatePic.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="uploadCoverPic" id="uploadCoverPic" style="display: none;">
      <input type="submit" name="submit-uploadCover" style="display: none;">
      </form>
    </div>
    <div class="profile">
      <?php 
      if(is_null($_SESSION['u_profile'])){echo '<img class="picProfile" src="../img/profilePicDefault.png"/>';}
      else{echo "<img class='picProfile' src='data:image/jpeg;base64,".$_SESSION['u_profile']."'/>";}
      ?>
      <img class="changeProfile" id="changeProfile" src="../img/changeProfile.png" />
      <form  action="../db/UpdatePic.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="uploadProfilePic" id="uploadProfilePic" style="display: none;">
      <input type="submit" name="submit-uploadProfile" style="display: none;">
      </form>
      <div class="clean"></div>
    </div>
  </div>  
  <div class="info-person"></div>  
  <div class="clean"></div>
    <h1><?php echo $_SESSION['u_uid']; ?></h1>
</div>

<div class="posts">
<hr/>
  <article>
     <h4>Post 1 </h4>
      <img src="../img/polito.png" height="400" width="300">
    <p>
      By default, all HTML elements have a static position, and cannot be moved.
      To manipulate the position, remember to first set the CSS position property of the element to relative, fixed, or absolute!
    </p>
  </article>
</div>


<?php require('../inc/footer.php');?>


<script >
  $(document).ready(function() {
    
    $('#changeCover').click(function() { $('#uploadCoverPic').click(); });
    $(":file[id='uploadCoverPic']").on("change", function() {
      $(":submit[name='submit-uploadCover']").click();
    });

    $('#changeCover').mouseenter(function(){ });





    $('#changeProfile').click(function() { $('#uploadProfilePic').click(); }); 
    $(":file[id='uploadProfilePic']").on("change", function() {
      $(":submit[name='submit-uploadProfile']").click();
     });

    $('#changeProfile').mouseenter(function(){  });





  });
</script>