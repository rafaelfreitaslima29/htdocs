<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Saldo dos Clientes</h2>
	      	    <!-- Título da página fim -->  
	      		</div> 
	      			      		
	      		<!-- coluna 2 da direita início -->
	      		<div class="col-md-12 col-lg-12">
					
					<!-- tabela responsiva inicio -->
					<div class="table-responsive-sm">
					  	<table class="table table-hover table-dark">
							  <thead>
							    <tr>							      
							      <th scope="col">#</th>
							      <th scope="col">Cliente</th>
							      <th scope="col">Vendas</th>
							      <th scope="col">Pagamentos</th>
							      <th scope="col">Saldo</th>							      							      
							    </tr>
							  </thead>
							  <tbody>
							  	<?php $counter1=-1;  if( isset($clientessaldos) && ( is_array($clientessaldos) || $clientessaldos instanceof Traversable ) && sizeof($clientessaldos) ) foreach( $clientessaldos as $key1 => $value1 ){ $counter1++; ?>
							    <tr>
							    							      
							      <td><a href="/" class="badge badge-info"><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> </td>
							      <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td>R$<?php echo htmlspecialchars( $value1["saldo_devedor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td>R$<?php echo htmlspecialchars( $value1["saldo_credor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      <td>R$<?php echo htmlspecialchars( $value1["saldo_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							      							      							      
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