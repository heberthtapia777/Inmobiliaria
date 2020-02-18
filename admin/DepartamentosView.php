<?php
	require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
	
	$departamento = new Departamento($_GET["ID"]);
	$imagenes = explode("@",$departamento->IMAGEN);
    
?>
<!-- carousel -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	    	<?php for($i=0; $i<count($imagenes); $i++){?>
	        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i==0) echo 'class="active"';?> ></li>
	        <?php }?>
	    </ol>
		
	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	    	<?php for($i=0; $i<count($imagenes); $i++){?>
	        <div <?php if($i==0){ echo 'class="item active"';} else{ echo 'class="item"';}?> >
	            <img src="<?php echo $imagenes[$i]?>" alt="">
	        </div>	 
	        <?php }?>       
	    </div>
	
	    <!-- Controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left"></span>
	        <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right"></span>
	        <span class="sr-only">Next</span>
	    </a>
	</div>
<!-- ./ fin -->