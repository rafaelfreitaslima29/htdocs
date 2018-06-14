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
    
    // Configuração da Rota home "\"
    public function routeHome()
    {           
         $this->app->any('/', function ($request, $response, $args) {
           
            $pagina = new Pagina();
                        
            $pagina->setTpl("main");            
            
        }); 
    }
 
    
    // Configuração da Rota Venda "\venda"
    public function routeVenda()
    {
        $this->app->any('/venda', function ($request, $response, $args) 
        {            
            $pagina = new Pagina();
            
            $vendaViewModel = new VendaViewModel();
            $vendaViewModel->pesquisarCliente($pagina);
            
            // último comando
            $pagina->setTpl("venda");            
        });
    }
    
    
    // Configuração da Rota Venda "\venda"
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
            
            
            
            // último comando
            $pagina->setTpl("vanda_vender");            
        });
    }
    
    
    
    // Configuração da Rota Venda "\venda"
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
            
            // último comando
            $pagina->setTpl("vanda_fechar_venda");
        });
    }
    
    
    
    // Configuração da Rota recebimento "\recebimento"
    public function routeRecebimento()
    {
        $this->app->any('/recebimento', function ($request, $response, $args) 
        {            
            $pagina = new Pagina();
            
            $viewModel = new RecebimentoViewModel();
            $viewModel->pesquisarCliente($pagina);
            
            
            // último comando
            $pagina->setTpl("recebimento");            
        });
    }
    
    
    
    // Configuração da Rota recebimento "\recebimento"
    public function routeRecebimentoReceber()
    {
        $this->app->any('/recebimento-receber', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            $viewModel = new RecebimentoReceberViewModel();
            $viewModel->retornarCliente($pagina);
            
            // último comando
            $pagina->setTpl("recebimento_receber");
            
        });
    }
    
    
    
    
    public function routeRecebimentoReceberRecebido()
    {
        $this->app->any('/recebimento-receber-recebido', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            $viewModel = new RecebimentoReceberRecebidoViewModel();
            $viewModel->retornarCliente($pagina);
            
            
            
            // último comando
            $pagina->setTpl("recebimento_receber_recebido");
            
        });
    }
    
    
    
    
    public function routeCliente()
    {
        $this->app->any('/cliente', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            $viewModel = new CadastroClienteViewModel();
            
            // testar a integração
            //$viewModel->teste();
            
            // Lista cadastros recentes
            $viewModel->ClienteCadastradosRecentes($pagina);
            
            
            // último comando
            $pagina->setTpl("cadastro_cliente");    
        });
    }
    
    
    
    // Configuração da Rota Cadastro Cliente confirmação "/cliente/confirmado"
    public function routeClienteConfirm()
    {
        $this->app->any('/cliente-confirmado', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            $viewModel = new CadastroClienteConfirmadoViewModel();
            $viewModel->cadastarCliente($pagina);
            
            // último comando
            $pagina->setTpl("cadastro_cliente_confirm");
            
        });
    }
    
    
    
    
    
    
    // Configuração da Rota Relatórios "\relatorio"
    public function routeRelatorio()
    {
        $this->app->any('/relatorio', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            
            
            
                
            // Último comando
            $pagina->setTpl("relatorios");
            
        });
    }
    
    public function routeRelatorioSaldoClientes()
    {
        $this->app->any('/relatorio-saldo-clientes', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            $viewModel = new RelatorioSaldoClientesViewModel();
            
            $viewModel->saldoPedidosCliente($pagina);
            
            
            
            // Último comando
            $pagina->setTpl("relatorio_saldo_clientes");
            
        });
    }
    
    
    
    // Configuração da Rota gerenciamento "\gerenciamento"
    public function routeGerenciamento()
    {
        $this->app->any('/gerenciamento', function ($request, $response, $args) {
            
            $pagina = new Pagina();
            
            
            
            // último comando
            $pagina->setTpl("gerenciamento");
            
        });
    }
    
    
    
    // Configuração da Rota gerenciamento "\gerenciamento-produto"
    public function routeGerenciamentoProduto()
    {
        $this->app->any('/gerenciamento-produto', function ($request, $response, $args) {
            $pagina = new Pagina();
            
            // Para registrar um produto
            $gerencProd = new GerenciamentoProdutoViewModel();
            $gerencProd->cadastrarProduto($pagina);
            
            
            // Para Listar os Produtos
            $gerencProd->listaTodosOsProdutos($pagina);
            
            // último comando
            $pagina->setTpl("gerenciamento_produto");
            
        });
    }
    
    
    // Configuração da Rota gerenciamento "\gerenciamento-produto"
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
            
            
            // último comando
            $pagina->setTpl("gerenciamento_produto_alterar");
            
        });
    }
    
    
    
    
    
    
    // Metodo que faz as rotas funcionarem, tem que ser chamado no index.
    public function runApp()
    {
        $this->app->run();
    }
    
    
}




