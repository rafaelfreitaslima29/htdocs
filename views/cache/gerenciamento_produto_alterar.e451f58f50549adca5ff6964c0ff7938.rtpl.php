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
	      			<form action="/gerenciamento-produto-alterar" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    	
					    		<input type="text" value="<?php echo $id; ?>" name="id_prod" class="invisible d-none">
					    		<label for="cliente">Nome do Produto</label>
					      		<input type="text" class="form-control" placeholder="Nome do Produto" name="prod_name" value="<?php echo $nome; ?>">
					    	</div>
					       	<div class="col-md-12">
					       		<label for="cliente">Nome do Produto</label>
					    	  	<input type="text" class="form-control" placeholder="Nome do Produto" name="prod_vlr" value="<?php echo $valor; ?>">
					    	</div>
					  	</div>
					  	<button type="submit" value="ok" name="botao_alterar" class="btn btn-primary mt-3">ALTERAR</button>
					  	<a href="/gerenciamento-produto" class="btn btn-secondary mt-3 active" role="button" aria-pressed="true">VOLTAR</a>					  	
					<!-- form fim -->  	
					</form>
					<form action="/gerenciamento-produto-alterar" method="get">
						<input type="text" value="<?php echo $id; ?>" name="id_prod" class="invisible d-none">						
					  	<input type="text" value="<?php echo $id; ?>" name="deletar" class="invisible d-none">
					  	<button type="submit" class="btn btn-danger mt-5 ml-auto">DELETAR</button>
					  	<p><?php echo $aviso; ?></p>
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
      