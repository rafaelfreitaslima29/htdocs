<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<?php echo htmlspecialchars( $alerta, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    <main role="main" class="container-fluid">
    	
    	<div class="conteiner">
      		<div class="row">
				<div class="col-md-12">     	
					<h2 class="text-center pb-5">Cadastro de Cliente</h2>
	      		</div>
      		</div>
      		
      		<div class="row">
      			<div class="col-md-1"></div>
	      		<div class="col-md-10">
					<form action="/cliente" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<label for="cliente">Nome do Cliente</label>
					      		<input type="text" class="form-control" placeholder="Nome do Cliente" name="cli_name">
					    	</div>
					       	<div class="col-md-12">
					       		<label for="cliente">Observação sobre Cliente</label>
					    	  	<input type="text" class="form-control" placeholder="Observação sobre Cliente" name="cli_obs">
					    	</div>
					  	</div>
					  	<button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
					</form>   
	      		</div>
				<div class="col-md-1">
	      		</div>
			</div>
			    
      </div>
      
    </main>
      