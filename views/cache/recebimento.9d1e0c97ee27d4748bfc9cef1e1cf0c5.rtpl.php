<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Recebimento</h2>
	      	    <!-- Título da página fim -->  
	      		</div>   	
				<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">
	      			<!-- form inicio -->
	      			<form action="/" method="get">
	      				<!-- App da tela -->
	      				<input type="text" value="recebimento" name="app" class="invisible d-none">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<label for="cliente">Pesquisar Cliente</label>
					      		<input type="text" name="pesq_cli_name" class="form-control" placeholder="Pesquisar">
					    	</div>					       	
					  	</div>
					  	<button type="submit" class="btn btn-primary mt-3">Pesquisar</button>
					<!-- form fim -->  	
					</form>
	      		<!-- coluna 1 da esquerda fim -->
	      		</div>	      		
	      		
	      		
	      		<!-- coluna 2 da direita início -->
	      		<div class="col-md-6 col-lg-12">
					<!-- Titulo -->
					<h4 class="text-center mb-2">Resultados:</h4>
					<!-- tabela responsiva inicio -->
					<div class="table-responsive-sm">
					  	<table class="table table-hover table-dark">
							  <thead>
							    <tr>							      
							      <th scope="col">Cliente</th>
							      <th scope="col">Observação</th>
							      <th scope="col">Receber</th>							      							      
							    </tr>
							  </thead>
							  <tbody>
							  	<?php $counter1=-1;  if( isset($arrayclientes) && ( is_array($arrayclientes) || $arrayclientes instanceof Traversable ) && sizeof($arrayclientes) ) foreach( $arrayclientes as $key1 => $value1 ){ $counter1++; ?>

							    <tr>							      
							      <td><?php echo htmlspecialchars( $value1->getCli_name_text(), ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td><?php echo htmlspecialchars( $value1->getCli_obs_text(), ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td>
							      	<a href="/?app=recebimento-receber&id_cli=<?php echo htmlspecialchars( $value1->getCli_pk_int(), ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
							      		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
									    	<path fill="#ffffff" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
										</svg>
							      	</a>							      		
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