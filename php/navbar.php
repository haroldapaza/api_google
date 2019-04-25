<?php  
	include_once 'php/cabeza.php';
 
?>	
<nav id="navbar" class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar=header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">este boton cambia la barra de navegacion</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>	
			</button>
			<a class="navbar-brand" href="#">RESTAURANTE</a>
		</div>

		<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
				<li ><a href="localizacio.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>LOCALIZAR </a></li>
				<li><a href="clasificar.php"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>CALIFICAR</a></li>
				<li><a href="registrar.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>REGISTRAR</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php
			//https://www.youtube.com/watch?v=nug1pMke-y4
				if(true){
			?>
			<li>
				<a href="#">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<?php echo ' hola'?>
				</a>
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >GESTOR <span class="caret"></span>
				</a>
				 <ul class="dropdown-menu" role="menu">
				 	<li><a href="#">Entradas</a></li>
				 	<li><a href="#">Comentarios</a></li>
				 	<li><a href="#">Usuarios</a></li>
				 	<li><a href="#">Favoritos</a></li>

				 </ul>
			</li>
			<li>
				<a href="<?php echo RUTA_LOGOUT;?>"> 
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>Cerrar Sesion
				</a>
			</li>

			<?php
				}else{
			?>

	        <li>
	            <a href="#">
	            	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		            <?php 
		                echo (3);
		             ?>
	            </a>
	        </li>
			<li>
				<a href="<?php echo RUTA_LOGIN;?>">
					<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> iniciar secion
				</a>
			</li>
			<li>
				<a href="registro.php">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>registrar
				</a>
			</li>
			<?php			
				}
			?>
		</ul>	 
		</div>
	</div>
</nav>