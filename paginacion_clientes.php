<?php $numero_paginas = numero_paginas_trans_cli($blog_config["post_por_pagina_cli"], $conexion_clientes); ?>
<center><section class="paginacion">
	<ul>
	   <?php if (pagina_actual_trans_cli()===1): ?>
		<li class="disabled"><a href="#">❮</a></li>
	   <?php else: ?>
	   	<li ><a href="index_transportista.php?pc=<?php echo pagina_actual_trans_cli() - 1 ?>#pag_cli">❮</a></li>
	   <?php endif; ?>

	 <?php for($i=1; $i <= $numero_paginas; $i++): ?>
	   	<?php if (pagina_actual_trans_cli()===$i): ?>
		<li class="active">
			<a><?php echo $i; ?></a>
		</li>
	   <?php else: ?>
		<li><a href="index_transportista.php?pc=<?php echo $i;?>#pag_cli"><?php echo $i; ?></a></li>
	   <?php endif; ?>

	<?php endfor; ?>
    
    <?php if(pagina_actual_trans_cli()== $numero_paginas): ?>
    	<li class="disabled"><a href="#">❯</a></li>
    <?php else: ?>
    	<li ><a href="index_transportista.php?pc=<?php echo pagina_actual_trans_cli() + 1; ?>#pag_cli">❯</a></li>
    <?php endif;?>

	</ul>
</section></center>