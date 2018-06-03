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
	      			<form action="/cliente" method="get">
						<div class="form-row">
					    	<div class="col-md-12">
					    		<label for="cliente">Pesquisar Cliente</label>
					      		<input type="text" class="form-control" placeholder="Pesquisar" name="pesq_cli_name">
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
							      <th scope="col">Vender</th>							      							      
							    </tr>
							  </thead>
							  <tbody>
							    <tr>							      
							      <td>Thornton</td>
							      <td>Rua da sorveteria</td>
							      <td>
							      	<a href="/venda-vender" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
							      		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
										    <path fill="#ffffff" d="M11,9H13V6H16V4H13V1H11V4H8V6H11M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
										</svg>
							      	</a>							      		
							      </td>							      
							    </tr>
							    <tr>							      
							      <td>Thornton</td>
							      <td>Rua da sorveteria</td>
							      <td>
							      	<a href="/recebimento-receber" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
							      		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
										    <path fill="#ffffff" d="M11,9H13V6H16V4H13V1H11V4H8V6H11M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
										</svg>
							      	</a>							      		
							      </td>							      
							    </tr>
							    <tr>							      
							      <td>Thornton</td>
							      <td>Rua da sorveteria</td>
							      <td>
							      	<a href="/recebimento-receber" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
							      		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
										    <path fill="#ffffff" d="M11,9H13V6H16V4H13V1H11V4H8V6H11M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
										</svg>
							      	</a>							      		
							      </td>							      
							    </tr>
							    <tr>							      
							      <td>Thornton</td>
							      <td>Rua da sorveteria</td>
							      <td>
							      	<a href="/recebimento-receber" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
							      		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
										    <path fill="#ffffff" d="M11,9H13V6H16V4H13V1H11V4H8V6H11M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
										</svg>
							      	</a>							      		
							      </td>							      
							    </tr>
							    <tr>							      
							      <td>Thornton</td>
							      <td>Rua da sorveteria</td>
							      <td>
							      	<a href="/recebimento-receber" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
							      		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
										    <path fill="#ffffff" d="M11,9H13V6H16V4H13V1H11V4H8V6H11M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
										</svg>
							      	</a>							      		
							      </td>							      
							    </tr>							    						    
							  </tbody>
						</table>
					<!-- tabela responsiva fim -->
					</div>	
	      		<!-- coluna 2 da direita fim -->
	      		</div>
	      		<!-- coluna 3 da esquerda início -->
	      		<div class="col-md-6 col-lg-12" >
					<!-- Titulo -->
					<h4 class="text-center mb-2">Últimos Recebimentos:</h4>
					<!-- tabela responsiva inicio -->
					<div class="table-responsive-sm">
					  	<table class="table table-hover table-dark">
							  <thead>
							    <tr>							      
							      <th scope="col">Data</th>
							      <th scope="col">Cliente</th>
							      <th scope="col">Valor</th>							      
							    </tr>
							  </thead>
							  <tbody>
							    <tr>							      
							      <td>25/05/2018</td>
							      <td>Otto</td>
							      <td>R$25,60</td>							      
							    </tr>
							    <tr>							      
							      <td>25/05/2018</td>
							      <td>Thornton</td>
							      <td>R$25,60</td>							      
							    </tr>
							    <tr>							      
							      <td>25/05/2018</td>
							      <td>Thornton</td>
							      <td>R$25,60</td>							      
							    </tr>
							    <tr>							      
							      <td>25/05/2018</td>
							      <td>Thornton</td>
							      <td>R$25,60</td>							      
							    </tr>
							    <tr>							      
							      <td>25/05/2018</td>
							      <td>Thornton</td>
							      <td>R$25,60</td>							      
							    </tr>							    
							  </tbody>
						</table>
					<!-- tabela responsiva fim -->
					</div>	
	      		<!-- coluna 2 da esquerda fim -->
	      		</div>	      		       	
      	    <!-- row fim -->  
      		</div>
   	  <!-- conteiner fim --> 		    
      </div>
    <!-- main fim -->  
    </main>      