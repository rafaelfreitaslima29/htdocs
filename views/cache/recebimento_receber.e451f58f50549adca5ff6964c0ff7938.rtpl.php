<?php if(!class_exists('Rain\Tpl')){exit;}?><meta charset="UTF-8">
	<!-- main inicio -->
    <main role="main" class="container-fluid">
    	<!-- conteiner inicio -->
    	<div class="conteiner">
	    	<!-- row inicio -->
      		<div class="row">  
      			<div class="col-md-12 mx-auto">     	
					<h2 class="text-center mb-5">Receber</h2>
	      	    <!-- Título da página fim -->  
	      		</div>   	
				<!-- coluna 1 da esquerda início -->
	      		<div class="col-md-6 mb-5">
	      			<!-- form inicio -->
	      			<form action="/recebimento-receber-recebido" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<h4><?php echo $clinome; ?>
					    			<br><span><small><?php echo $cliobs; ?></small></span>
					    		</h4>
					    		<!-- Número do id Cliente -->
					    		<input type="text" id="id_cliente" name="id_cli" value="<?php echo $cliid; ?>" class="form-control invisible d-none">					    		
					    		
					    		<label for="cliente">Valor</label>
					      		<input type="text" id="receber_cli_valor" name="receber_cli_valor" class="form-control" placeholder="Valor" >
					      		<label for="cliente">Observação do Recebimento</label>
					      		<input type="text" class="form-control" placeholder="Observação do Recebimento" name="receber_cli_obs">
					    	</div>					       	
					  	</div>
					  	<button type="submit" id="receber" class="btn btn-primary mt-3">RECEBER</button>
					  	<a href="/recebimento" class="btn btn-secondary mt-3 active" role="button" aria-pressed="true">
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
	
		// faz o botaão de cadastrar sumir
		$("#receber").hide();
		
				
		
		$("#receber_cli_valor").focusout(function(){
			
			var conteudoNomeCliente = $("#receber_cli_valor").val();
			console.log(conteudoNomeCliente)
			
			if(conteudoNomeCliente  === "")
			{
				console.log("vazio nome")
				
			}
			else
			{
				console.log("Com conteúdo nome")
				$("#receber").show();	
			}
		});
		
	
	});



</script>