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
use Rfls\Model\ViewModel\CadastroClienteConfirmadoViewModel;
use Rfls\Model\ViewModel\RecebimentoViewModel;
use Rfls\Model\ViewModel\RecebimentoReceberViewModel;
use Rfls\Model\ViewModel\RecebimentoReceberRecebidoViewModel;
use Rfls\Model\ViewModel\RelatorioSaldoClientesViewModel;



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
        $this->routeRecebimentoReceberRecebido();
        
        $this->routeCliente();
        $this->routeClienteConfirm();
        
        $this->routeRelatorio();    
        $this->routeRelatorioSaldoClientes();
        
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
            
            $viewModel = new RecebimentoViewModel();
            $viewModel->pesquisarCliente($pagina);
            
            
            // �ltimo comando
            $pagina->setTpl("recebimento");            
        });
    }
    
    
    
    // Configura��o da Rota recebimento "\recebimento"
    public function routeRecebimentoReceber()
    {
        $this->app->any('/recebimento-receber', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            $viewModel = new RecebimentoReceberViewModel();
            $viewModel->retornarCliente($pagina);
            
            // �ltimo comando
            $pagina->setTpl("recebimento_receber");
            
        });
    }
    
    
    
    
    public function routeRecebimentoReceberRecebido()
    {
        $this->app->any('/recebimento-receber-recebido', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            $viewModel = new RecebimentoReceberRecebidoViewModel();
            $viewModel->retornarCliente($pagina);
            
            
            
            // �ltimo comando
            $pagina->setTpl("recebimento_receber_recebido");
            
        });
    }
    
    
    
    
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
            
            $pagina = new Pagina();
            
            $viewModel = new CadastroClienteConfirmadoViewModel();
            $viewModel->cadastarCliente($pagina);
            
            // �ltimo comando
            $pagina->setTpl("cadastro_cliente_confirm");
            
        });
    }
    
    
    
    
    
    
    // Configura��o da Rota Relat�rios "\relatorio"
    public function routeRelatorio()
    {
        $this->app->any('/relatorio', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            
            
            
                
            // �ltimo comando
            $pagina->setTpl("relatorios");
            
        });
    }
    
    public function routeRelatorioSaldoClientes()
    {
        $this->app->any('/relatorio-saldo-clientes', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            $viewModel = new RelatorioSaldoClientesViewModel();
            
            $viewModel->saldoPedidosCliente($pagina);
            
            
            
            // �ltimo comando
            $pagina->setTpl("relatorio_saldo_clientes");
            
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




