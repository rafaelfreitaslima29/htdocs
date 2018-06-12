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
	      			<form action="/cliente-confirmado" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<label for="cliente">Nome do Cliente</label>
					      		<input type="text" name="cli_nome" id="cli_nome" class="form-control" placeholder="Nome do Cliente" >
					    	</div>
					       	<div class="col-md-12">
					       		<label for="cliente">Observação sobre Cliente</label>
					    	  	<input type="text" name="cli_obs" id="cli_obs" class="form-control" placeholder="Observação sobre Cliente" >
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
							      <th scope="col">Alterar</th>							      
							    </tr>
							  </thead>
							  <tbody>
							   
							   	<?php $counter1=-1;  if( isset($arrayclientes) && ( is_array($arrayclientes) || $arrayclientes instanceof Traversable ) && sizeof($arrayclientes) ) foreach( $arrayclientes as $key1 => $value1 ){ $counter1++; ?>
        						
   								
							    <tr>							      
							      <td><?php echo $value1->getCli_name_text(); ?></td>
							      <td><?php echo $value1->getCli_obs_text(); ?></td>
							      <td>
							      	<div class="btn-group" role="group" aria-label="Basic example">
										<a class="btn btn-primary btn-sm" href="/venda" role="button">
											<svg style="width:24px;height:24px" viewBox="0 0 24 24">
											    <path fill="#ffffff" d="M7.5,21.5L8.85,20.16L12.66,23.97L12,24C5.71,24 0.56,19.16 0.05,13H1.55C1.91,16.76 4.25,19.94 7.5,21.5M16.5,2.5L15.15,3.84L11.34,0.03L12,0C18.29,0 23.44,4.84 23.95,11H22.45C22.09,7.24 19.75,4.07 16.5,2.5M6,17C6,15 10,13.9 12,13.9C14,13.9 18,15 18,17V18H6V17M15,9A3,3 0 0,1 12,12A3,3 0 0,1 9,9A3,3 0 0,1 12,6A3,3 0 0,1 15,9Z" />
											</svg>
										</a>
										<a class="btn btn-danger btn-sm" href="/venda" role="button">
											<svg style="width:24px;height:24px" viewBox="0 0 24 24">
											    <path fill="#ffffff" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
											</svg>
										</a>					  				  
									</div>
							      </td>							      
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
    
    
    
      