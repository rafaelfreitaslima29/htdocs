<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Realizar Venda</h2>
					<p id="teste">Bom dia</p>
	      	    <!-- Título da página fim -->  
	      		</div>   	
				<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">
	      			<!-- form inicio -->
	      			<form action="/venda-vender" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<!-- Número do Pedido -->
					    		<input type="text" id="numero_pedido" class="form-control invisible d-none" name="numero_pedido" value="12">
					    		
					    		<h4 id="venda_nome_cliente">Rafael Freitas
					    			<br><span><small>Da vila</small></span>
					    		</h4>
					    		<div class="form-group">
								    <label for="exampleFormControlSelect1">Produtos</label>
								    <select class="form-control" id="selecao_produtos">
								      <option value="1">Água R$2,50</option>
								      <option value="2">Gás R$2,50</option>
								      <option value="3">Batata R$2,50</option>
								      <option value="4">Banana R$2,50</option>
								      <option value="5">Arroz R$2,50</option>
								    </select>
								  </div>					      		
					      		<label for="cliente">Qualtidade</label>
					      		<input type="number" id="venda_cli_quantidade" class="form-control" placeholder="Valor" name="venda_cli_quantidade">
					      		
					      		<input type="text" id="envio_array" class="form-control invisible d-none" placeholder="Valor" name="envio_array">
					      		
					    	</div>					       	
					  	</div>
					  	<button id="adicionar" type="button" class="btn btn-primary mt-3">ADICIONAR PRODUTO</button>
					  	<button type="submit" value="1" name="fechar_pedido" class="btn btn-primary mt-3">FECHAR PEDIDO</button>
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
	      			<button type="button" class="btn btn-danger btn-block mt-1 mb-1">APAGAR PEDIDO</button>
	      			      			
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
							      							      
							      <td>Água</td>
							      <td>1</td>
							      <td>R$25.55</td>							      
							    </tr>							    						    							    						    
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



var lista_itens = Array()
lista_itens["produto_id"] = Array()
lista_itens["produto_quantidade"] = Array()
lista_itens["produto_valor"] = Array()

// Preeencher com PHP
var produtoId = Array("1", "2")
var nomeProduto = Array("ÁGUA", "GÁS")
var valorProduto = Array("3.50", "90.00")

	$(document).ready(function(){
		
		
		$("#adicionar").click(function(){
			
			lista_itens["produto_id"].push( $("#selecao_produtos").val() );
			lista_itens["produto_quantidade"].push( $("#venda_cli_quantidade").val() );
			
			var x = JSON.stringify(lista_itens["produto_id"]);
			
			console.log(x);
			console.log( lista_itens["produto_quantidade"] )
			$("#envio_array").val(x);
			
			$("#tab_itens").html('<tr><td>Pão</td><td>1</td><td><a href="/venda-vender" class="btn btn-danger btn-lg active" role="button" aria-pressed="true"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#ffffff" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg></a></td></tr>');
			
		});
		
		
	   
	});



</script>
    
      