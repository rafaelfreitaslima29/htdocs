<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Venda</h2>
	      	    <!-- Título da página fim -->  
	      		</div>   	
				<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">
	      			<!-- form inicio -->
	      			<form action="/" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<label for="cliente">Pesquisar Cliente</label>
					    		<input type="text" value="venda" name="app" class="invisible d-none">
					      		<input type="text" class="form-control" placeholder="Pesquisar" name="pesq_cli_name">
					    	</div>					       	
					  	</div>
					  	<button type="submit" class="btn btn-primary mt-3">Pesquisar</button>
					  	<p><?php echo htmlspecialchars( $alerta, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
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
							      <th scope="col">Vender</th>							      							      
							    </tr>
							  </thead>
							  <tbody>
							  <?php $counter1=-1;  if( isset($arrayclientes) && ( is_array($arrayclientes) || $arrayclientes instanceof Traversable ) && sizeof($arrayclientes) ) foreach( $arrayclientes as $key1 => $value1 ){ $counter1++; ?>

							    <tr>							      
							      <td><?php echo htmlspecialchars( $value1->getCli_name_text(), ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td><?php echo htmlspecialchars( $value1->getCli_obs_text(), ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td>
							      	<a href="/?app=venda-vender&id_cli=<?php echo htmlspecialchars( $value1->getCli_pk_int(), ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
							      		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
										    <path fill="#ffffff" d="M11,9H13V6H16V4H13V1H11V4H8V6H11M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
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