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
	      			<form action="/cliente" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<h4 id="venda_nome_cliente">Rafael Freitas
					    			<br><span><small>Da vila</small></span>
					    		</h4>
					    		
					    		
					    		
					    		<label for="cliente">Produto</label>
					      		<input value="peixe" id="produto_nome" type="text" class="form-control" placeholder="Produto" name="venda_cli_produto">
					    		
					    		<label for="cliente">Valor</label>
					      		<input type="number" class="form-control" placeholder="Valor" name="venda_cli_valor">
					      		
					      		<label for="cliente">Qualtidade</label>
					      		<input type="number" class="form-control" placeholder="Valor" name="venda_cli_quantidade">
					      		
					      		
					      		
					      		
					    	</div>					       	
					  	</div>
					  	<button id="adicionar" type="button" class="btn btn-primary mt-3">ADICIONAR PRODUTO</button>
					  	<button type="submit" class="btn btn-primary mt-3">FECHAR PEDIDO</button>
					  	<a href="/venda" class="btn btn-secondary mt-3 active" role="button" aria-pressed="true">
							      		CANCELAR
						</a>
					<!-- form fim -->  	
					</form>
	      		<!-- coluna 1 da esquerda fim -->
	      		</div>	   	      		       	
      	    <!-- row fim -->  
      		</div>
   	  <!-- conteiner fim --> 		    
      </div>
    <!-- main fim -->  
    </main>
    
    
<script> 

	$(document).ready(function(){
		//$("#produto_nome").val("Rapadura");
		//alert($("#venda_nome_cliente").html());
		//alert( $("#produto_nome").val() );
		//var dado = $("#produto_nome").attr("id");
		
		//alert(dado);
		
		//$("#teste").html("<h1>Deu certo!!</h1>");
	   // jQuery methods go here...

		$("#adicionar").click(function(){
		    $.get("/venda-vender", function("oi", status){
		        alert("Data: " + data + "\nStatus: " + status);
		    });
		});
	   
	   
	   
	});



</script>
    
      