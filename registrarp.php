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
       mapa = new google.maps.Map($("#mapa2")[0], config );
                  
       
        guardarpersona();
         //listar();
     });
</script>

  <div class="container">
  <div class="row">
    <div class="col-md-6">
      <div ></div>
    </div>
    <div class="col-md-6">

    
      <form role="form" id="formulariopersona">
      <h2>LOGIN <small>REGISTRAR DATOS </small></h2>
      <hr class="colorgraph">
      <div class="form-group">
        <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="nombre" >
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="apellidoP" id="apPaterno" class="form-control input-lg" placeholder="apellido paterno" >
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="apellidoM" id="apMaterno" class="form-control input-lg" placeholder="apellido materno">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="email" name="correo" id="correo" class="form-control input-lg" placeholder="Email">
      </div>
      <div class="form-group">
        <input type="text" name="sexo" id="sexo" class="form-control input-lg" placeholder="Sexo" >
      </div>
      <div class="form-group">
          <div class="form-group">
            <input type="text" name="usuario" id="usuario" class="form-control input-lg" placeholder="Usuario">
          </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" tabindex="5">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password_confir" id="password_confir" class="form-control input-lg" placeholder="Confirmar Contraseña" tabindex="6">
          </div>
        </div>
      </div>
      
      
      <hr class="colorgraph">
      <div class="row">
      <center>
        <div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Registrar</a></div>
        
        <div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-warning btn-block btn-lg">LOGIN</a></div>
        </center>
      </div>
    </form>
    </div>
  </div>
          
  </div>
   <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  
  
</body>

</html>
