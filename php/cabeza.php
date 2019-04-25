<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum=1.0">

	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link href="css/estilos.css" rel="stylesheet">
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA8lrgLvaBIDBrc1RmjmXlwyhUOLpBf4tA&callback=initMap"></script>

	<script type="text/jscript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<!--ARCHIVOS JAVASCRIPT DE BOOTSTRAP -->
    <script type="text/jscript" src="js/bootstrap.min.js"></script>

    <style>

     #mapa{ 
       width:1320px; 
     height:600px; 
     float:left;
     
    }
    #mapa1{ 
       width:585px; 
     height:450px; 
     float:left;
     
    }
    #mapa2{ 
       width:650px; 
     height:450px; 
     float:left;
     
    }
    #mapa3{ 
       width:900px; 
     height:450px; 
     float:left;
     
    }
    #imput1 { 
    
    width:400px; 
     
    }
    #inpud { 
    
    width:400px; 
     
    }
    #imput2 { 
    
    width:400px;
    }
    #body1 { 
      background-image: url("https://i.pinimg.com/originals/7e/7c/01/7e7c013bae62629bae58414daedb350c.jpg");
        background-color: #cccccc;
    
    }
    #body2 { 
      background-image: url("https://i.pinimg.com/originals/7e/7c/01/7e7c013bae62629bae58414daedb350c.jpg");
        background-color: #cccccc;
    
    }

    
    #imput3 { 
   
    width:400px;
    }
      


    
    
  </style>
 <script>
           //ARRAY PARA ALMACENAR NUEVOS MARCADORES 
           
           var marcadores_BD=[];
           var mapa =null,ubicacionA;
           var cx1,cy1;
           //FUNCION PARA QUITAR MARCADORES DEL MAPA

     function markar(){
      var formulario = $("#formulario");
      var marcadores_nuevos = [];
           
           //FUNCION PARA QUITAR MARCADORES DEL MAPA
           function quitar_marcador(lista)
           {
              for(i in lista)
             {
              //QUITAR MARCADOR DEL MAPA
              lista[i].setMap(null);
             }
           } 

      google.maps.event.addListener (mapa, "click", function(event){
       var coordenadas = event.latLng.toString();
       coordenadas = coordenadas.replace("(", "");
                         coordenadas = coordenadas.replace(")", "");

       var lista = coordenadas.split(",");

      var direccion = new google.maps.LatLng(lista[0],lista[1]);
                        
                        //PASAR LAS COORDENADAS AL FORMULARIO
                        formulario.find("input[name='cx']").val(lista[0]);
                        formulario.find("input[name='cy']").val(lista[1]);
                           //UBICAR EL FOCUS EN EL TITULO
                        formulario.find("input[name='nombre']").focus();
                        
      //VARIABLE PARA MARCADOR
      var marcador = new google.maps.Marker({
                            position:direccion, 
                            map:mapa, 
                            animation:google.maps.Animation.DROP, 
                            dagglabe:false                           
                        });
                        
                        // DEJAR SOLO UN MARCADOR EN EL MAP
                        marcadores_nuevos.push(marcador);
                        
                        //AGREGAR EVENTO CLICK AL MARCADOR
                        google.maps.event.addListener(marcador, "click", function(){ 
                        });     

                        quitar_marcador(marcadores_nuevos);
            marcador.setMap(mapa);   
            guardar();
      });
     }
     function guardar(){
     	$("#btn_grabar").on("click", function(){
            	var f = $("#formulario");
            	$.ajax({
            		type:"POST",
            		url:"iajax.php",
            		dataType:"JSON",
            		data:f.serialize()+"&tipo=grabar",
            		success: function(data){
            			alert(data.mensaje);
            		},
            		beforeSend: function(){

            		},
            		complete: function(){

            		}
            	});
            	return false;
            });
     }
     function listar(){
      var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
          draggable: true,
          map: mapa,
        });

      var informacion= $("#informacion");
      var imagen1= $("#imagen1");
         $.ajax({
                type: "POST",
                url: "iajax.php",
                dataType: "JSON",
                data:"&tipo=listar",
                success:function(data){
                  
                    if(data.estado=="ok"){
                        $.each(data.mensaje, function(i,item){
                          //OBTENER LAS COORDENADAS DEL PUNTO
                      var posi = new google.maps.LatLng(item.res_cx,item.res_cy); 
                      //CARGAR LAS PROPIEDADES AL MARCADOR
                      var  marca = new google.maps.Marker({
                        idMarcador:item.res_cx,
                        idMarcador1:item.res_cy,
                        categoria:item.res_categoria,
                        imagen:item.res_imagen,
                        descripcion:item.res_descripcion,
                        position: posi,
                        titulo: item.res_nombre  
                      });
                      //AGREGAR EVENTO CLICK AL MARCADOR
                      google.maps.event.addListener(marca,"click",function(){
                        displayRoute(cx1+","+cy1,marca.idMarcador+","+marca.idMarcador1, directionsService,
            directionsDisplay);

                        informacion.find("input[name='cx']").val(marca.idMarcador);
                        informacion.find("input[name='cy']").val(marca.idMarcador1);
                           //UBICAR EL FOCUS EN EL TITULO
                        informacion.find("input[name='nombre']").val(marca.titulo);
                        informacion.find("input[name='categoria']").val(marca.categoria);
                        informacion.find("input[name='descripcion']").val(marca.descripcion);
                        informacion.find("input[name='imagen']").val(marca.imagen);

                        informacion.find("img[name ='imagen1']").attr("src", marca.imagen);

                      }); 
                      //AGREGAR EL MARCADOR A LA VARIABLE MARCADORES_DB
                      marcadores_BD.push(marca);
                      //UBICAR EL MARCADOR EN EL MAPA
                      marca.setMap(mapa);

                        });
                    }else{
                      alert("no hay puntos en la base de datos");
                    } 
                      
              },
              beforeSend:function(){

              },
              complete:function(){

              }
              });

         pocicionA();
     }
     function guardarpersona(){
      $("#registrarPersona").on("click", function(){
              var f = $("#formulariopersona");
              $.ajax({
                type:"POST",
                url:"iajax.php",
                dataType:"JSON",
                data:f.serialize()+"&tipo=registrar",
                success: function(data){
                  alert(data.mensaje);
                },
                beforeSend: function(){

                },
                complete: function(){

                }
              });
              return false;
            });
     }

  function pocicionA(){
    ubicacionA = new google.maps.InfoWindow;
          navigator.geolocation.getCurrentPosition(function(position) {

            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            cx1=position.coords.latitude;
            cy1=position.coords.longitude;
            var imagen = {
        url: 'https://thumbs.dreamstime.com/b/hombre-de-negocios-pensativo-47903870.jpg',
        size: new google.maps.Size(40, 40),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(30, 30)
      };

            var marcador = new google.maps.Marker({
                            position:pos, 
                            map:mapa,
                            icon:imagen, 
                            animation:google.maps.Animation.DROP, 
                            dagglabe:false                           
                        });
            
            mapa.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, mapa.getCenter());
          });

  }
  
   function displayRoute(origin, destination, service, display) {
        service.route({
          origin: origin,
          destination: destination,
          travelMode: 'DRIVING',
          avoidTolls: true
        }, 
        function(response, status) {
          
            display.setDirections(response);
        
        });
      }


   function login(){

    $("#loginp").on("click", function(){
              var f = $("#formlogin");
              $.ajax({
                type:"POST",
                url:"php/clasificar.php",
                dataType:"JSON",
                data:f.serialize()+"&tipo=login",
                success: function(data){
                  alert(data);
                },
                beforeSend: function(){

                },
                complete: function(){

                }
              });
              return false;
            });

     }
</script>

</head>
<body >