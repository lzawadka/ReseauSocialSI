<?php include "../global/header.php"; ?>


<div class="newPost__position--sections">
   <div class="new__post">
      <p class="post">Post</p>
         <form action="insertPost.php" method="POST" enctype="multipart/form-data" class="new__post--text"> 
               <input type="text" name="user_post" value="<?php echo getUserInfo() ?>" readOnly="readOnly" class="user_post"/></p>
               <div class="inputs--titlePost">
               <input type="text" name="titre_post" placeholder="Title" class="input__title" />
               
                  <br /><textarea name="contenu_post" rows="10" cols="50" placeholder="Your story.." value="Post" class="validate__post"></textarea>
                  <br />
                  <div class="validate__post">

                  <input type="submit" name="" value="Post" class="submit__button"> 
               </div>
               </div>
         </form> 
   </div> 
   <div class="topComment">
            <?php include '../profile/asideProfile.php';?>
            <?php include '../profile/topComment.php';?>
        </div>
</div>
   