<?php
namespace Rfls\controller;

require_once 'vendor/autoload.php';



use Rain\Tpl;
use Slim\App;
use Rfls\View\Pagina;
use Rfls\Model\Entidades\Client;
use Rfls\Model\Dao\ClienteDao;
use Rfls\View\Utilidades;
use Rfls\Model\Dao\ProdutoDao;
use Rfls\Model\Entidades\Produto;
use Rfls\Model\Entidades\Pedido;
use Rfls\Model\Dao\PedidoDao;
use Rfls\Model\Dao\ListaPedidoDao;
use Rfls\Model\Entidades\ListaPedido;
use Rfls\Model\Entidades\Recebimento;
use Rfls\Model\Dao\RecebimentoDao;
use Rfls\Model\ViewModel\GerenciamentoProdutoViewModel;
use Rfls\Model\ViewModel\GerenciamentoProdutoAlterarViewModel;
use Rfls\Model\ViewModel\VendaViewModel;
use Rfls\Model\ViewModel\VendaVenderViewModel;
use Rfls\Model\ViewModel\VendaFecharVendaViewModel;
use Rfls\Model\ViewModel\CadastroClienteViewModel;



class Routes
{
    private $app;
    
    private $tpl;
    
    private $clienteDao;
    
    function __construct()
    {
        $this->app = new App();
        $this->tpl = new Tpl();
       
        // Rotas
        $this->routeHome();
        
        $this->routeVenda();
        $this->routeVendaVender();
        $this->routeVendaFecharVenda();
        
        $this->routeRecebimento();
        $this->routeRecebimentoReceber();
        
        $this->routeCliente();
        $this->routeClienteConfirm();
        
        $this->routeRelatorio();    
        
        $this->routeGerenciamento();
        $this->routeGerenciamentoProduto();
        $this->routeGerenciamentoProdutoAlterar();
    }
    
    // Configura��o da Rota home "\"
    public function routeHome()
    {           
         $this->app->any('/', function ($request, $response, $args) {
           
            $pagina = new Pagina();
                        
            $pagina->setTpl("main");            
            
        }); 
    }
 
    
    // Configura��o da Rota Venda "\venda"
    public function routeVenda()
    {
        $this->app->any('/venda', function ($request, $response, $args) 
        {            
            $pagina = new Pagina();
            
            $vendaViewModel = new VendaViewModel();
            $vendaViewModel->pesquisarCliente($pagina);
            
            // �ltimo comando
            $pagina->setTpl("venda");            
        });
    }
    
    
    // Configura��o da Rota Venda "\venda"
    public function routeVendaVender()
    {
        $this->app->any('/venda-vender', function ($request, $response, $args) 
        {            
            $pagina = new Pagina();
            
            $vendaVenderViewModel = new VendaVenderViewModel();
            // Retorna os Dados do Cliente
            $vendaVenderViewModel->retornarCliente($pagina);
            
            // Retorna a lista de Produtos
            $vendaVenderViewModel->retornarListaProdutos($pagina);
            
            
            
            // �ltimo comando
            $pagina->setTpl("vanda_vender");            
        });
    }
    
    
    
    // Configura��o da Rota Venda "\venda"
    public function routeVendaFecharVenda()
    {
        $this->app->any('/vanda-fechar-venda', function ($request, $response, $args)
        {
            $pagina = new Pagina();
            
            $viewModel = new VendaFecharVendaViewModel();
            // Retorna os Dados do Cliente
            $viewModel->retornarCliente($pagina);
            
            //Retorna a lista de Produtos em JSON
            $viewModel->JONretornarListaProdutos($pagina);
            
            $viewModel->retornarListaProdutosDoPedido($pagina);
            
            // �ltimo comando
            $pagina->setTpl("vanda_fechar_venda");
        });
    }
    
    
    
    // Configura��o da Rota recebimento "\recebimento"
    public function routeRecebimento()
    {
        $this->app->any('/recebimento', function ($request, $response, $args) 
        {            
            $pagina = new Pagina();
            
            
            
            
            // �ltimo comando
            $pagina->setTpl("recebimento");            
        });
    }
    
    
    // Configura��o da Rota recebimento "\recebimento"
    public function routeRecebimentoReceber()
    {
        $this->app->any('/recebimento-receber', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            
            
            // �ltimo comando
            $pagina->setTpl("recebimento_receber");
            
        });
    }
    
    
    // Configura��o da Rota Cadastro Cliente "/cliente"
    // FALTA TERMINAR
    public function routeCliente()
    {
        $this->app->any('/cliente', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            $viewModel = new CadastroClienteViewModel();
            
            // testar a integra��o
            //$viewModel->teste();
            
            // Lista cadastros recentes
            $viewModel->ClienteCadastradosRecentes($pagina);
            
            
            // �ltimo comando
            $pagina->setTpl("cadastro_cliente");    
        });
    }
    
    
    
    // Configura��o da Rota Cadastro Cliente confirma��o "/cliente/confirmado"
    public function routeClienteConfirm()
    {
        $this->app->any('/cliente-confirmado', function ($request, $response, $args) {
            
            $paginaCliConfirm = new Pagina();
            
            // Testes ===============
            /*
            $cliente = new Client();
            //$cliente->setCli_name_text("ti");
            //$cliente->setCli_obs_text("Samael");
            //$cliente->setCli_pk_int("7");
            
            
            $dao = $this->clienteDao = new ClienteDao();
            $x = $dao->pesquisarNome($cliente);
            var_dump($x);
            echo "<br>". $x[0]["cli_pk_int"];
            print_r($x);
            echo "<br>";
            echo $cliente->getCli_name_text();
            
            $aviso = new Utilidades();
            $aviso->AlertaAvisoClient($client);
            */
            // =======================
            
            
            // valida se tem as vari�veis, se tiver faz a inclus�o de novo cliente.
            if(isset( $_GET['cli_name']) )
            {
                /*
                $dao = $this->clienteDao = new ClienteDao();
                $cliente = new Client();
                
                $cliente->setCli_name_text(strtoupper($_GET['cli_name']));
                $cliente->setCli_obs_text($_GET['cli_obs']);
                
                $dao->incluir($cliente);
                */
            }
            
            $paginaCliConfirm->setTpl("cadastro_cliente_confirm");
            
        });
    }
    
    
    
    
    
    
    // Configura��o da Rota Relat�rios "\relatorio"
    public function routeRelatorio()
    {
        $this->app->any('/relatorio', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            // #########TESTE ############
          
            
            
            $vmProduto = new GerenciamentoProdutoViewModel();
            
            $vmProduto->Teste();
            
            
            /*
            $cli = new Client();
            $cli->setCli_pk_int(7);
            
            $receb = new Recebimento();
            $receb->setPk(4);
            $receb->setCliente_fk( 22 );
            $receb->setValor(120.60);
            $receb->setObs("teste 333");
            
            $recebDao = new RecebimentoDao();
            $x = new Recebimento();
            
            
           
            $xy = $recebDao->pesquisarTodosPorCliente($receb);
            foreach ($xy as $x)
            {
                echo $x->getPk()."  |  ";
                echo $x->getCliente_fk()."  |  ";
                echo $x->getData()."  |  ";
                echo $x->getObs()."  |  ";
                echo $x->getValor()."  |  ";
                
                
            }
              */  
                
  //          var_dump($x);
            
            
            
            
            
            
            
            
            
          //$produtoDao = new ProdutoDao();
          
          //$produto = new Produto();
          //$produto->setPk(2);
          
          
         // $prod = $produtoDao->pesquisar($produto);
          
          //echo $prod->getPk();
          //echo $prod->getNome();
          //echo $prod->getValor();
          
          //$quantidade = 5;
          
          //$listaPedido = new ListaPedido();
          //$listaPedido->setLista_pedido_pk(1);
          //$listaPedido->setLista_pedido_pedido_fk(1);
          //$listaPedido->setLista_pedido_produto($prod);
          
          //$listaPedido->setLista_pedido_quantidade($quantidade);
          //$listaPedido->setLista_pedido_subtotal($quantidade * $prod->getValor());
          /*
          $ped = new Pedido();
          $ped->setPk(2);
          
          $listaPedidoDao = new ListaPedidoDao();
          $listPedido = $listaPedidoDao->pesquisarPorPedido($ped);
          foreach ($listPedido as $list)
          {
              
              $pro = new Produto();
              
              echo $list->getLista_pedido_pk()." | ";
              echo $list->getLista_pedido_pedido_fk()." | ";
              $pro = $list->getLista_pedido_produto();
              
              echo $pro->getPk()." | ";
              echo $pro->getNome()." | ";
              echo $pro->getValor()." | ";
              
              echo $list->getLista_pedido_quantidade()." | ";
              echo $list->getLista_pedido_subtotal()." | ";
              echo "<br>";
              
                         
          }
          */
          
          
          /*
          $pro = new Produto();
          
          echo $listPedido->getLista_pedido_pk()." | ";
          echo $listPedido->getLista_pedido_pedido_fk()." | ";
          $pro = $listPedido->getLista_pedido_produto();
          
          echo $pro->getPk()." | ";
          echo $pro->getNome()." | ";
          echo $pro->getValor()." | ";
          
          echo $listPedido->getLista_pedido_quantidade()." | ";
          echo $listPedido->getLista_pedido_subtotal()." | ";
          */
          
          
          // 
            //$pedido = new Pedido();
            //$pedido->setPedido_client_fk(5);
            //$pedido->setPedido_estado(2);
            //$pedido->setPk(3);
            //$pedido->setPedido_saldo_total(32.55);
            
            
            //$pedidoDao = new PedidoDao();
            
            
            // $pedidoDao->incluir($pedido);
            // $pedidoDao->alterar($pedido);
            // $pedidoDao->deletar($pedido);
            //$ped = $pedidoDao->pesquisarTodos();
            
           
            //var_dump($ped);
            
            /*
            foreach ($ped as $p){
            
                echo $p->getPk()."<br>";
                echo $p->getPedido_client_fk()."<br>";
                echo $p->getPedido_data()."<br>";
                echo $p->getPedido_estado()."<br>";
                echo $p->getPedido_saldo_total()."<br>";
                
            }
            */
            /*
            echo $ped->getPk()."<br>";
            echo $ped->getPedido_client_fk()."<br>";
            echo $ped->getPedido_data()."<br>";
            echo $ped->getPedido_estado()."<br>";
            echo $ped->getPedido_saldo_total()."<br>";
            */
           
            // ###########################
          
            
            $pagina->setTpl("relatorios");
            
        });
    }
    
    
    
    // Configura��o da Rota gerenciamento "\gerenciamento"
    public function routeGerenciamento()
    {
        $this->app->any('/gerenciamento', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            
            
            // �ltimo comando
            $pagina->setTpl("gerenciamento");
            
        });
    }
    
    
    
    // Configura��o da Rota gerenciamento "\gerenciamento-produto"
    public function routeGerenciamentoProduto()
    {
        $this->app->any('/gerenciamento-produto', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            // Para registrar um produto
            $gerencProd = new GerenciamentoProdutoViewModel();
            $gerencProd->cadastrarProduto($pagina);
            
            
            // Para Listar os Produtos
            $gerencProd->listaTodosOsProdutos($pagina);
            
            // �ltimo comando
            $pagina->setTpl("gerenciamento_produto");
            
        });
    }
    
    
    // Configura��o da Rota gerenciamento "\gerenciamento-produto"
    public function routeGerenciamentoProdutoAlterar()
    {
        $this->app->any('/gerenciamento-produto-alterar', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            // Para registrar um produto
            $gerencProd = new GerenciamentoProdutoAlterarViewModel();
            $gerencProd->recuperarProduto($pagina);
            
            
            // Alterar Produto
            $gerencProd->alterarProduto($pagina);
            
            // Deletar Produto
            $gerencProd->deletarProduto($pagina);
            
            
            // �ltimo comando
            $pagina->setTpl("gerenciamento_produto_alterar");
            
        });
    }
    
    
    
    
    
    
    // Metodo que faz as rotas funcionarem, tem que ser chamado no index.
    public function runApp()
    {
        $this->app->run();
    }
    
    
}




