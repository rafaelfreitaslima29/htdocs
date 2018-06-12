<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Venda Fechada</h2>					
	      	    <!-- Título da página fim -->  
	      		</div>   	
				
				
				
				
				
				
				
				<!-- coluna 2 da direita início -->
	      		<div class="col-md-12 mb-5">
	      			
	      			<h4 id="venda_nome_cliente"><?php echo $clinome; ?>
						<br><span><small><?php echo $cliobs; ?></small></span>
					</h4>		
			
					
	      			
	      			<h4>Produtos do Pedido</h4>	
	      				      			      
	      				      			      			
	      			<!-- tabela responsiva inicio -->
					<div class="table-responsive-sm">
					  	<table class="table table-hover table-dark">
							  <thead>
							   	<tr>							      							      
								    <th scope="col">Produto</th>
								    <th scope="col">Quantidade</th>
								    <th scope="col">Valor</th>							      							      
							    </tr>
							  </thead>
							  <tbody id="tab_itens">
							    
        								
        							<?php $counter1=-1;  if( isset($listaprodutos) && ( is_array($listaprodutos) || $listaprodutos instanceof Traversable ) && sizeof($listaprodutos) ) foreach( $listaprodutos as $key1 => $value1 ){ $counter1++; ?>		
        							<tr>
        								<td><?php echo $value1->getLista_pedido_produto()->getNome(); ?> R$<?php echo $value1->getLista_pedido_produto()->getValor(); ?></td>
        								<td><?php echo $value1->getLista_pedido_quantidade(); ?></td>	
        								<td><?php echo $value1->getLista_pedido_subtotal(); ?></td>	
        							</tr>		
    								<?php } ?>
							    							      							      
								    
								    
								    						      
							    							    						    							    						    
							  </tbody>
						</table>						
					<!-- tabela responsiva fim -->
					</div>
					<h5>Total do Pedido R$ <span id="total_pedido"><?php echo $totalpedido; ?></span> </h5>	
	      			
	      			<a href="/" class="btn btn-primary mt-3 active" role="button" aria-pressed="true">
							      		VOLTAR INICIO
					</a>
	      			
	      		<!-- coluna 2 da direita fim -->
	      		</div>	   	      		       	
				
				
				
				
      	    <!-- row fim -->  
      		</div>
   	  <!-- conteiner fim --> 		    
      </div>
    <!-- main fim -->  
    </main>
    
    
<script>

// Preeencher com PHP	
var produtosJSON = <?php echo $jsonprodutoslist; ?>

//var jsonQuantidadesPedido = 
//var jsonIndicesPedido = 


console.log(produtosJSON)


</script>
    
      