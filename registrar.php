<?php  
  include_once 'php/navbar.php';
  include_once 'php/puntosDAO.php';
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
       mapa = new google.maps.Map($("#mapa1")[0], config );
                  
       
        markar();
         //listar();
     });

</script>
<br><br><br>
<div class="container" >
  <div class="jumbotron jumbotron-dark" >
    <div class="container " >
      <div class="row">
        <div class="col-sm-2">
        
        </div>
        <div class="col-sm-8">
        <h1>REGISTRAR PUESTO</h1>
        <p>  
        	 
            hola aqui puedes registrar los datos que tiene tu puesto
        </p>
        </div>
        <div class="col-sm-2">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="panel " >
                  <div class="panel-heading">
                    <h4>Buscar</h4>
                  </div>
                  <div class="panel-body">
                    
                  </div>
   </div>
</div>
<div class="container">
  <div class="row">
      <div id="mapa1" class="col-sm-6">

              <h2>Aquí irá el mapa!</h2>
      </div>
        <div id="infor" class="col-sm-6">
                
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4>Registra Datos</h4>
                  </div>
                  <div id="collapseOne" class="panel-body collapse in">
                    <div class="panel-inner ">
                        <form id="formulario" role="form" enctype="multipart/for-data">
                            <table>
                                <tr>
                                    <td>Nombre</td>
                                    <td><input type="text" class="form-control"  name="nombre" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Categoria</td>
                                    <td><input type="text" class="form-control"  name="categoria" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Descripcion</td>
                                    <td><input type="text" id="inpud" class="form-control"  name="descripcion" autocomplete="off"/></td>
                                </tr>
                                <div class="row">

                                  <tr>
                                    <td>Ubicacion</td>
                                    <td><input class="col-xs-12 col-md-6" type="text" class="form-control"  name="ubicacion" autocomplete="off"/>
                                
                                    <input class="col-xs-12 col-md-6" type="text" class="form-control"  name="ubicacion1" autocomplete="off"/>
                                    </td>
                                </tr>
                                </div>
                              
                                <tr>
                                    <td>Coordenada X</td>
                                    <td><input type="text" class="form-control" readonly  name="cx" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Coordenada Y</td>
                                    <td><input type="text" class="form-control"  readonly name="cy" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Archivo</td>
                                    <td><input type="file" name="archivo" id="archivo" accept="image/*" ></td>
                                </tr>
                                
                                <br><br>
                                  
                                    <td> <br><br>
                                    <center>
                                    <button type="submit" id="btn_grabar" class="btn btn-success btn-sm" >Grabar
                                    </button>
                                    </center>
                                    </td>

                                    <td><br><br>
                                    <center>
                                    <button type="button" class="btn btn-danger btn-sm">Cancelar</button>
                                    </center>
                                    </td>
                                  
                                </tr>
                            </table>
                        </form>
                    </div>
                  </div>
                </div>
                
                
              
        </div>
  </div>
</div>
<?php  
  include_once 'php/pie.php';

?>