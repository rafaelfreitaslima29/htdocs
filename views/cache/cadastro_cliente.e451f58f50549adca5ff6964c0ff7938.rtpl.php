<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">     	
				<!-- Título da página início -->
				<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Cadastro de Cliente</h2>
	      	    <!-- Título da página fim -->  
	      		</div>
				<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">
	      			<!-- form inicio -->
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
							    <tr>							      
							      <td>Mark</td>
							      <td>Otto</td>							      
							    </tr>
							    <tr>							      
							      <td>Jacob</td>
							      <td>Thornton</td>							      
							    </tr>
							    <tr>							      
							      <td>Jacob</td>
							      <td>Thornton</td>							      
							    </tr>
							    <tr>							      
							      <td>Jacob</td>
							      <td>Thornton</td>							      
							    </tr>
							    <tr>							      
							      <td>Jacob</td>
							      <td>Thornton</td>							      
							    </tr>							    
							  </tbody>
						</table>
					<!-- tabela responsiva fim -->
					</div>
					
					<!-- Grupo de cartões fim -->  
					
	      		<!-- coluna 2 da direita fim -->
	      		</div>       	
      	    <!-- row fim -->  
      		</div>
   	  <!-- conteiner fim --> 		    
      </div>
      
    </main>
      