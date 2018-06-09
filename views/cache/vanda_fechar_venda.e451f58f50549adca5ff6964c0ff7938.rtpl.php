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
	      		<div class="col-md-6 mb-5">
	      			
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

console.log(produtosJSON)
				
console.log(produtosJSON[1].produto_nome)
document.write(produtosJSON[1].produto_nome)


//var produtosArray = JSON.parse( produtosJSON )
//console.log( produtosArray )





var produtoId = Array(<?php $counter1=-1;  if( isset($produtoslist) && ( is_array($produtoslist) || $produtoslist instanceof Traversable ) && sizeof($produtoslist) ) foreach( $produtoslist as $key1 => $value1 ){ $counter1++; ?>"<?php echo $value1->getPk(); ?>",<?php } ?>"null")
var nomeProduto = Array(<?php $counter1=-1;  if( isset($produtoslist) && ( is_array($produtoslist) || $produtoslist instanceof Traversable ) && sizeof($produtoslist) ) foreach( $produtoslist as $key1 => $value1 ){ $counter1++; ?>"<?php echo $value1->getNome(); ?>",<?php } ?>"null")
var valorProduto = Array(<?php $counter1=-1;  if( isset($produtoslist) && ( is_array($produtoslist) || $produtoslist instanceof Traversable ) && sizeof($produtoslist) ) foreach( $produtoslist as $key1 => $value1 ){ $counter1++; ?>"<?php echo $value1->getValor(); ?>",<?php } ?>"null")

var lista_itens = Array()
lista_itens["produto_id"] = Array()
lista_itens["produto_quantidade"] = Array()
lista_itens["produto_valor"] = Array()


	$(document).ready(function(){
		
		
		$("#adicionar").click(function(){
			
			lista_itens["produto_id"].push( $("#selecao_produtos").val() );
			lista_itens["produto_quantidade"].push( $("#venda_cli_quantidade").val() );
			
			//var id_produtos = JSON.stringify(lista_itens["produto_id"]);
			//console.log(id_produtos);
			//console.log( lista_itens["produto_id"] )
			
			
			//var quantidade_produtos = JSON.stringify( lista_itens["produto_quantidade"] );
			//console.log( quantidade_produtos );
			//console.log( lista_itens["produto_quantidade"] );
			
			var string_lista_de_itens = "";
			var total_pedido = 0.00
			
			lista_itens["produto_id"].forEach(function(valor, indice, array){
				
				var indice_do_produto = produtoId.indexOf(valor)
								
				var quantidade_produtos = lista_itens["produto_quantidade"][indice]
				
				var valor_unitario = valorProduto[indice_do_produto]
				
				var valor_total_produto =  parseFloat(quantidade_produtos) * parseFloat(valor_unitario)
				total_pedido += parseFloat(valor_total_produto)
				
				string_lista_de_itens += '<tr><td>'+ nomeProduto[indice_do_produto]+' R$'+ valor_unitario +'</td><td>'+ quantidade_produtos +'</td><td>R$'+valor_total_produto.toFixed(2)+'</td></tr>'
				
			})
			
			//console.log( lista_itens["produto_id"] )
			//console.log( lista_itens["produto_quantidade"] )
			
			$("#tab_itens").html( string_lista_de_itens );
			$("#total_pedido").html( total_pedido.toFixed(2) );
			
			
		});
		
		
		$("#btn_fechar_pedido").click(function(){
			
			console.log( lista_itens["produto_id"] )
			console.log("qqqqqqqqqq")	
			
		});
		
		
		
	   
	});



</script>
    
      