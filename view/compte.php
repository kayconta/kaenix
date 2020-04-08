<?php $title = 'Kaenix ' ?>

<?php ob_start(); ?>
 

    <?php require 'includes/headerUser.php'; ?>
 
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
 <!-- preloader begin -->
        <div class="preloader">
            <div class="loader">
                <hr>
                <hr>
            </div>
        </div>
        <!-- preloader end -->
        
  <!-- subscribe newsletter end -->

<?php 
    while ($userCurent = $user -> fetch()) {
 ?>

        <!-- contact begin -->
       <div class="banner ">
     
        <div class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="add-space section-title text-center">
                            
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class=" contact-form">
                          <div class="notif_pub"></div>

                            <form form method="post" style="display: none;" id="z" action="?action=publication" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                <textarea placeholder="<?= $userCurent['utilisateur'] ?>, Proposez votre rp " name="post" class="publish_post" required="tue" ></textarea>
                                        <span class="textarea"></span>
                                    </div>
                                     <div class="col-xl-12 col-lg-12">
                                        <input type="file" name="photo_pub" required="true" class="photo_pub" />
                                        <span class=""></span>
                                    </div>
                                    
                                    <div class="col-xl-6 col-lg-6">
                                        <button type="submit" class="but_post">Poster Votre Pub </button>
                                    </div>                 
                              </form>
        
     </div>   

      
                         

    

                            <br />
                        </div>
      <div class="col-xl-6 col-lg-6">
      <?php 
             if (isset($statut)) {
                if ($statut == 1) {
                  $dialog = 'data-toggle="modal" data-target="#oMessagerie"';
                  $id ='rass';
                  $notif_pub ='notif_pub';
                }else{
                  $dialog ='';
                  $id = 'declancheur';
                  $notif_pub = 'notif_pub';
                }
             }

      ?>


       <button type="button" id="<?= $id; ?>" <?= $dialog; ?> class="col-lg-12" style="display: inline;">Cree un RP maintenant </button>
       
      </div>
                         <div class="col-lg-12 pub">

  <?php while ($d = $pubs -> fetch()) { ?> 

     <div style="background: white; margin: 0%; padding: 19px;">
       <img src="public/images/pdp/<?= $d['pdp']; ?>" width="100px" height="100px" style="border-radius: 100%;" class="img-responsive img-circle  img-rounded">
       <a href="#"><h4 style="display: inline;"> <?= $d['prenom'].' '.$d['nom']; ?> </h4></a>
         <hr />
         <div class="col-md-9" style="margin-left: 4%;">
           <?= nl2br($d['post']); ?>
         </div>
     </div>

       <img src="public/images/publication/<?= $d['photo']; ?>" width="100%">

     <div style="background: white; margin: 0%; padding: 19px;">
      <a href="#" style="font-size: 3em;"><span class="fas fa-comment"></span></a><sup><span class="badge" style="background: gray; font-size: 1em; color: white;">4</span></sup>
      &nbsp; &nbsp; &nbsp; 
      <a href="#" style=" font-size: 3em;"><span class="fas fa-heart ht"></span></a><sup><span class="badge" style="background: gray; font-size: 1em; color: white;">4</span></sup>
     </div>
     <br />
<?php } ?>
 <style type="text/css">
   .ht:hover{
     color: red;
   }
 </style>
<div class="publish_user">
                            
                          
                            <center>
                              <img src="public/images/ajax-loader.gif" />
                            </center>

</div>

                          
                         </div>
                    </div>
                    
                </div>
            </div> 
        </div>
        
<script type="text/javascript">
  $('#declancheur').click(function(){

      $('#z').css('display','inline').fadeOut('slow').fadeIn('slow');
      $('#declancheur').fadeOut('slow');
  });
</script>
    

  </div>
  
        <div class="modal fade " id="oMessagerie" tabindex="-1" role="dialog" aria-labelledby="oMessagerieLabel " aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content col-lg-12">
          <div class="modal-header">
            <h3 class="modal-title" id="oMessagerieLabel"><b style="color:black;">
                <img src="public/assets/img/91025774_243110436844688_8163869532679569408_n.jpg" height="80px" width="80px" alt="" style="border-radius: 100%;"> 
                  Publie ton premier RP Maintenant
            </b></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="<?= $tempt_notif; ?>"></div>
            <form method="post" style="" id="" action="?action=publication" enctype="multipart/form-data">
                                
                                    <div class="col-xl-12 col-lg-12">
                                <textarea placeholder="Proposez votre rp " rows="13"  name="post" class="publish_post form-control" required="tue" ></textarea>
                                        <span class="textarea"></span>
                                    </div>
                                     <div class="col-xl-12 col-lg-12">
                                        <input type="file" name="photo_pub" required="true" class="photo_pub form-control"/>
                                        <span class=""></span>
                                    </div>
                                    
                                    
          </div>
          <div class="modal-footer">
            <button type="submit" class="but_post2 btn btn-primary" >Poster</button>
          </div>
        </div>
         </form>
      </div>
    </div>
        <!-- contact end -->
        <script type="text/javascript" src="public/assets/js/mod/compte.js"></script>
        <script type="text/javascript">
        $(function(){ 
           var form = $('form').get(0);
           $('.but_post').click(function(){ 
           var formData = new FormData(form);
           var publish_post = document.querySelector('.publish_post');
           var photo_pub = document.querySelector('.photo_pub');
           var notif_pub = document.querySelector('.notif_pub');

          if(!publish_post.value || !photo_pub.value){ 
              $('.notif_pub').fadeOut('slow').fadeIn('slow').html('<i style="color:orange;">publication impossible un des champs ci-dessous n\'est pas remplir: </i>');
              if (!publish_post.value) {
                notif_pub.innerHTML += '<i style="color:red;">au niveau du champ de saisir</i>';
                publish_post.style.border='1px solid red';
              }else{ publish_post.style.border='0px solid red'; }

              if (!photo_pub.value) {
                notif_pub.innerHTML += ',<i style="color:red;"> au niveau de la photo. vous devez choisir une photo</i>';
                 photo_pub.style.border='1px solid red';
              }else{  photo_pub.style.border='0px solid red'; }

          }else{

                 $('.notif_pub').fadeOut('slow').fadeIn('slow').html('<i style="color:green; font-size:0.8em;">votre post est publique</i>');
                 var tempt_notif = 5;
                 var compteur = setInterval(function(){
                     tempt_notif --;
                     if (tempt_notif < 4) {
                      clearInterval(compteur);
                      $('.notif_pub').html('');
                      
                     }
                     location.reload();
                 },1000);
                }
             });

              var com2 = setInterval(function(){
                $('.publish_user').load('compte.php .publish_user');
              },1000);

           });
        </script>
<?php
    }
?>
<?php $content = ob_get_clean(); ?>

<?php require 'public/base.php'; ?>
