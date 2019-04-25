<?php  
  include_once 'php/navbar.php';

?>

<script >
  $(document).on("ready",function(){
      var punto = new google.maps.LatLng("-15.8402218","-70.02188050000001");    
      //VARIABLE PARA CONFIGURCION INICIAL
      var config = {
        zoom:16,
        center:punto,
        mapTypeId: google.maps.MapTypeId.ROADMAP  
      };
      
      //VARIABLE MAPA 
       mapa = new google.maps.Map($("#mapa")[0], config );
                  
       
        //markar();
         listar();
         //pocicionA();
     });
</script>

<div class="container-fluid" >
  <div class="jumbotron jumbotron-primary" >
    <div class="container " >
      <div class="row">
        <div class="col-sm-2">
        
        </div>
        <div class="col-sm-8">
        <h1>LOCALIZACION</h1>
        <p>  

           
            hola aqui puedes localizar tu puesto favorito!!
        </p>
        </div>
        <div class="col-sm-2">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid" >
      <div class="row">
        <div class="col-sm-2">
        
        </div>
        <div class="col-sm-8">
        
        </div>
        <div class="col-sm-2">
        </div>
      </div>
    </div>


<div class="container-fluid">
  <div class="row">

      <div  class="col-sm-8">
              <div id="mapa"></div>
              <h2>Aquí irá el mapa!</h2>
      </div>
        <div class="col-sm-4">
                
            <form role="form" id="informacion" method="POST" >
              

            <div >
              <td> Nombre</td>
              <input type="text" name="nombre" id="imput1" class="form-control input-lg" autocomplete="off" readonly tabindex="3">
            </div>

            <div >
            <td>Categoria</td>
            <input id="imput2" type="text" name="categoria" class="form-control input-lg"  autocomplete="off" readonly tabindex="3">
            </div>
            <div >
            <td>Descripcion</td>
            <input id="imput2" type="text" name="descripcion" class="form-control input-lg"  autocomplete="off" readonly tabindex="3">
            </div>
            <div >
            <td>Cordenada X</td>
            <input id="imput2" type="text" name="cx" class="form-control input-lg"  autocomplete="off" readonly tabindex="3">
            </div>
            <div >
            <td>Cordenadana Y</td>
            <input id="imput3" type="text" name="cy" class="form-control input-lg"  autocomplete=" off"/ readonly tabindex="3">
            </div>    
            <div >
            <img name="imagen1" src="" width="400" height="260">
            </div> 

            
            
          </form>
                
                
              
        </div>
  </div>
</div>

<div class="container">
  <div class="panel panel-primary">
      <div class="panel-heading">
            Ventas Realizadas
      </div>
      <input type="text" id="buscar" placeholder="buscar">
      
        <center><br>  
          <div class="table-responsive">
         <table class="table table-hover table-condensed table-striped" id="tablaDeDatosventa" >
             <thead class="bg-primary" >
               <tr>
                 <th>RUC</th>
                 <th>FECHA</th>
                 <th>DESCRIPCION</th>
                 
                 
                 <th>TOTAL</th>
                 <th>CLIENTE</th>
                 <th>OPCIONES</th>
               </tr>
             </thead>
         </table>
          </div>
        </center>
  </div><!--final del contenido de las tablas-->
</div>
<?php  
  include_once 'php/pie.php';

?>