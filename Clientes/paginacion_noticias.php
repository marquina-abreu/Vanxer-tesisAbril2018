<?php $numero_paginas = numero_paginas_trans($blog_config["post_por_pagina"], $conexion); ?>
<center><section class="paginacion">
	<ul>
	   <?php if (pagina_actual_trans()===1): ?>
		<li class="disabled"><a href="#">❮</a></li>
	   <?php else: ?>
	   	<li ><a href="index.php?p=<?php echo pagina_actual_trans() - 1 ?>#Noticias">❮</a></li>
	   <?php endif; ?>

	 <?php for($i=1; $i <= $numero_paginas; $i++): ?>
	   	<?php if (pagina_actual_trans()===$i): ?>
		<li class="active">
			<a><?php echo $i; ?></a>
		</li>
	   <?php else: ?>
		<li><a href="index.php?p=<?php echo $i;?>#Noticias"><?php echo $i; ?></a></li>
	   <?php endif; ?>

	<?php endfor; ?>
    
    <?php if(pagina_actual_trans()== $numero_paginas): ?>
    	<li class="disabled"><a href="#">❯</a></li>
    <?php else: ?>
    	<li ><a href="index.php?p=<?php echo pagina_actual_trans() + 1; ?>#Noticias">❯</a></li>
    <?php endif;?>

	</ul>
</section></center>