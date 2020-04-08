<?php while ($d = $p -> fetch()) { ?> 

     <div style="background: white; margin: 0%; padding: 19px;">
       <img src="public/images/pdp/<?= $d['pdp']; ?>" width="100px" height="100px" style="border-radius: 100%;" class="img-responsive img-circle  img-rounded">
       <a href="#"><h4 style="display: inline;"> <?= $d['prenom'].' '.$d['nom']; ?>  </h4></a>
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