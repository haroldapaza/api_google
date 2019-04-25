<?php  
  include_once 'php/navbar.php';
  include_once 'php/puntosDAO.php';
?>
<script>
  
  $(document).on("ready",function(){
        var punto = new google.maps.LatLng("-15.8402218","-70.02188050000001");    
      //VARIABLE PARA CONFIGURCION INICIAL
      var config = {
        zoom:16,
        center:punto,
        mapTypeId: google.maps.MapTypeId.ROADMAP  
      };
      
      //VARIABLE MAPA 
       mapa = new google.maps.Map($("#mapa3")[0], config );
        guardarp();
         //listar();
         login();
     });
</script>


  <div class="container">
  <div class="row">
    <div class="col-md-8" >

    <div ></div>
      <img src="">
    </div>
    <div class="col-md-4" >
      <br><br><br>
        <form role="form" id="formlogin" >
        <h2>LOGIN <small>LOGIN</small></h2>
        <hr class="colorgraph">
        
        <div class="form-group">
          <input type="text" name="usuario" id="usuario" class="form-control input-lg" placeholder="usuario" tabindex="3">
        </div>
        <div class="form-group">
          <input type="email" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" tabindex="4">
        </div>
        
        
        

        <hr class="colorgraph">
        <div class="row">
                
          <div class="col-xs-12 col-md-6"><a href="menu.php" class="btn btn-success btn-block btn-lg">Ingresar</a></div>
          
          <div class="col-xs-12 col-md-6"><a href="registrarp.php" class="btn btn-danger btn-block btn-lg">Registrar</a></div>
        </div>
      </form>
      
    </div>
  </div>
          
  </div>
   <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  
  
</body>

</html>
