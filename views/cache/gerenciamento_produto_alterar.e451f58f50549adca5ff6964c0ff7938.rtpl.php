<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Alterar Produto</h2>
	      	    <!-- Título da página fim -->  
	      		</div> 	
	      		<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">	      			
	      			<!-- form inicio -->
	      			<form action="/gerenciamento-produto" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<label for="cliente">Nome do Produto</label>
					      		<input type="text" class="form-control" placeholder="Nome do Produto" name="prod_name" value="<?php echo $nome; ?>">
					    	</div>
					       	<div class="col-md-12">
					       		<label for="cliente">Nome do Produto</label>
					    	  	<input type="text" class="form-control" placeholder="Nome do Produto" name="prod_vlr" value="<?php echo $valor; ?>">
					    	</div>
					  	</div>
					  	<button type="submit" value="ok" name="botao_ok" class="btn btn-primary mt-3">ALTERAR</button>
					  	<a href="/gerenciamento" class="btn btn-secondary mt-3 active" role="button" aria-pressed="true">VOLTAR</a>
					  	<p><?php echo $alerta; ?></p>
					<!-- form fim -->  	
					</form>
	      		<!-- coluna 1 da esquerda fim -->
	      		</div>	      		
	      		
	      		 
	      		 
	      		 
	      		     	
      	    <!-- row fim -->  
      		</div>
   	  <!-- conteiner fim --> 		    
      </div>
    <!-- main fim -->  
    </main>
    
    
    
    <script>
    //alert("Existe campo vázio!");
    </script>
      