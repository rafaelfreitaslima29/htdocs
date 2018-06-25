<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Cadastro de Cliente</h2>
	      	    <!-- Título da página fim -->  
	      		</div>   	
				
				
				
				<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">
	      			<!-- form inicio -->
	      			<form action="/" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    	
					    		<input type="text" value="cadastrar_cliente_confirmado" name="app" class="invisible d-none">
					    	
					    		<label for="cliente">Nome do Cliente</label>
					      		<input type="text" name="cli_nome" id="cli_nome" class="form-control text-uppercase" placeholder="Nome do Cliente" >
					    	</div>
					       	<div class="col-md-12">
					       		<label for="cliente">Observação sobre Cliente</label>
					    	  	<input type="text" name="cli_obs" id="cli_obs" class="form-control text-uppercase" placeholder="Observação sobre Cliente" >
					    	</div>
					  	</div>					  	
					  		<button type="submit" id="cadastrar" class="btn btn-primary mt-3">Cadastrar</button>
					  	
					<!-- form fim -->  	
					</form>
	      		<!-- coluna 1 da esquerda fim -->
	      		</div>	      		
	      		
	      		
	      		
	      		
	      		<!-- coluna 2 da direita início -->
	      		<div class="col-md-6">
					
					<h2 class="text-center mb-2">Cadastros Recentes</h2>
					<!-- tabela responsiva inicio -->
					<div class="table-responsive-sm">
					  	<table class="table table-hover table-dark">
							  <thead>
							    <tr>							      
							      <th scope="col">Nome</th>
							      <th scope="col">Observação</th>							      							      
							    </tr>
							  </thead>
							  <tbody>
							   	<?php $counter1=-1;  if( isset($arrayclientes) && ( is_array($arrayclientes) || $arrayclientes instanceof Traversable ) && sizeof($arrayclientes) ) foreach( $arrayclientes as $key1 => $value1 ){ $counter1++; ?>

							    <tr>							      
							      <td><?php echo htmlspecialchars( $value1->getCli_name_text(), ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td><?php echo htmlspecialchars( $value1->getCli_obs_text(), ENT_COMPAT, 'UTF-8', FALSE ); ?></td>							      							      
							    </tr>
							   	<?php } ?>	    
							  </tbody>
						</table>
					<!-- tabela responsiva fim -->
					</div>	
	      		<!-- coluna 2 da direita fim -->
	      		</div>       	
      	    <!-- row fim -->  
      		</div>
   	  <!-- conteiner fim --> 		    
      </div>
    <!-- main fim -->  
    </main>
    
    
<script>



	$(document).ready(function(){
	
		// faz o botaão de cadastrar sumir
		$("#cadastrar").hide();
		
				
		
		$("#cli_nome").focusout(function(){
			
			var conteudoNomeCliente = $("#cli_nome").val();
			console.log(conteudoNomeCliente)
			
			if(conteudoNomeCliente  === "")
			{
				console.log("vazio nome")
				
			}
			else
			{
				console.log("Com conteúdo nome")
				$("#cadastrar").show();	
			}
		});
		
	
	});



</script>
    
    
    
      