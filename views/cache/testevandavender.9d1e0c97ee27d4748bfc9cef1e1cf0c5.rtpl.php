<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Realizar Venda</h2>					
	      	    <!-- Título da página fim -->  
	      		</div>   	
				<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">
	      			
	      			
	      			
	      			
	      			
	      			
	      			<!-- form inicio -->
	      			<form action="/vanda-fechar-venda" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		
					    		<!-- Número do Cliente -->
					    		<input type="text" id="id_cliente" name="id_cli" value="<?php echo htmlspecialchars( $cliid, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control invisible d-none">					    		
					    		
					    		<h4 id="venda_nome_cliente"><?php echo htmlspecialchars( $clinome, ENT_COMPAT, 'UTF-8', FALSE ); ?>

					    			<br><span><small><?php echo htmlspecialchars( $cliobs, ENT_COMPAT, 'UTF-8', FALSE ); ?></small></span>
					    		</h4>					    		
					    		
					    		<div class="form-group">
								    <label for="exampleFormControlSelect1">Produtos</label>
								    <select class="form-control" id="selecao_produtos">								    
								    <?php $counter1=-1;  if( isset($produtoslist) && ( is_array($produtoslist) || $produtoslist instanceof Traversable ) && sizeof($produtoslist) ) foreach( $produtoslist as $key1 => $value1 ){ $counter1++; ?>

        								<option value="<?php echo htmlspecialchars( $value1->getPk(), ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1->getNome(), ENT_COMPAT, 'UTF-8', FALSE ); ?> R$<?php echo htmlspecialchars( $value1->getValor(), ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
    								<?php } ?>								      
								    </select>
								</div>					      		
					      		
					      		<label for="cliente">Qualtidade</label>
					      		<input type="number" id="venda_cli_quantidade" name="venda_cli_quantidade" min="1" max="500" class="form-control" placeholder="Valor">
					      		
					      		<input type="text" id="json_quantidades" name="json_quantidades" class="form-control invisible d-none" >
					      		<input type="text" id="json_indices" name="json_indices" placeholder="Valor"  class="form-control invisible d-none" >
					    	</div>					       	
					  	</div>
					  	<button id="adicionar" type="button" class="btn btn-primary mt-3">ADICIONAR PRODUTO</button>
					  	<button type="submit" id="btn_fechar_pedido" value="1" name="fechar_pedido" class="btn btn-primary mt-3">FECHAR PEDIDO</button>
					  	<a href="/venda" class="btn btn-secondary mt-3 active" role="button" aria-pressed="true">
							      		CANCELAR
						</a>
					<!-- form fim -->  	
					</form>
					
					
					
					
					
					
	      		<!-- coluna 1 da esquerda fim -->
	      		</div>	   	      		       	

				<!-- coluna 2 da direita início -->
	      		<div class="col-md-6 mb-5">
	      			
	      			
					
			
					
	      			
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
							    <tr>							      							      
								    <td></td>
								    <td></td>
								    <td></td>							      
							    </tr>							    						    							    						    
							  </tbody>
						</table>						
					<!-- tabela responsiva fim -->
					</div>
					<h5>Total do Pedido R$ <span id="total_pedido">0.00</span> </h5>	
	      			
	      			
	      			
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
var produtoId = Array(<?php $counter1=-1;  if( isset($produtoslist) && ( is_array($produtoslist) || $produtoslist instanceof Traversable ) && sizeof($produtoslist) ) foreach( $produtoslist as $key1 => $value1 ){ $counter1++; ?>"<?php echo htmlspecialchars( $value1->getPk(), ENT_COMPAT, 'UTF-8', FALSE ); ?>",<?php } ?>"null")
var nomeProduto = Array(<?php $counter1=-1;  if( isset($produtoslist) && ( is_array($produtoslist) || $produtoslist instanceof Traversable ) && sizeof($produtoslist) ) foreach( $produtoslist as $key1 => $value1 ){ $counter1++; ?>"<?php echo htmlspecialchars( $value1->getNome(), ENT_COMPAT, 'UTF-8', FALSE ); ?>",<?php } ?>"null")
var valorProduto = Array(<?php $counter1=-1;  if( isset($produtoslist) && ( is_array($produtoslist) || $produtoslist instanceof Traversable ) && sizeof($produtoslist) ) foreach( $produtoslist as $key1 => $value1 ){ $counter1++; ?>"<?php echo htmlspecialchars( $value1->getValor(), ENT_COMPAT, 'UTF-8', FALSE ); ?>",<?php } ?>"null")

var lista_itens = Array()
lista_itens["produto_id"] = Array()
lista_itens["produto_quantidade"] = Array()
lista_itens["produto_valor"] = Array()


	$(document).ready(function(){
		
		
		$("#adicionar").click(function(){
			
			var quantidade_vazia = $("#venda_cli_quantidade").val()
			console.log(quantidade_vazia)
			
			if(quantidade_vazia == "")
			{
				//console.log("tá vázia")
			}
			else
			{
				//console.log("não tá vázia")
				
				// Capta os valores dos input, com o id do produto e a quantidade deles
				lista_itens["produto_id"].push( $("#selecao_produtos").val() );
				lista_itens["produto_quantidade"].push( $("#venda_cli_quantidade").val() );
				
				// Variável que guardará um string com o preenchimento da tabela de pedido
				var string_lista_de_itens = "";
				// Variável que guardará o valor to total do pedido
				var total_pedido = 0.00
				
				lista_itens["produto_id"].forEach(function(valor, indice, array){
					// Retorna o índice do produto
					var indice_do_produto = produtoId.indexOf(valor)
					// Retorna a quantidade do produto				
					var quantidade_produtos = lista_itens["produto_quantidade"][indice]
					// Retorna o valor do produto
					var valor_unitario = valorProduto[indice_do_produto]
					// Armazena o valor do subtotal do produto
					var valor_total_produto =  parseFloat(quantidade_produtos) * parseFloat(valor_unitario)
					total_pedido += parseFloat(valor_total_produto)
					
					// Armazena uma String com o código HTML do preenchimento da tabela do pedido
					string_lista_de_itens += '<tr><td>'+ nomeProduto[indice_do_produto]+' R$'+ valor_unitario +'</td><td>'+ quantidade_produtos +'</td><td>R$'+valor_total_produto.toFixed(2)+'</td></tr>'
					
				})
				
				// Preenche a tabela de produtos com a string html
				$("#tab_itens").html( string_lista_de_itens );
				// demonstra o total do pedido
				$("#total_pedido").html( total_pedido.toFixed(2) );
				
				// Envia os id dos produtos para o input 
				var id_produtosJSON = JSON.stringify(lista_itens["produto_id"]);
				$("#json_indices").val( id_produtosJSON );
				
				// Envia as quantidades dos produtos para o input 
				var quantidade_produtosJSON = JSON.stringify( lista_itens["produto_quantidade"] );
				$("#json_quantidades").val(quantidade_produtosJSON);
			}			
				
			
		// $("#adicionar").click(function() - fim	
		});
			
		
		
		
		
	//$(document).ready(function() - fim   
	});



</script>
    
      