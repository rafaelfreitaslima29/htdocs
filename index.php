<?php

require_once 'Config.php';
$config = new Config();




use view\Pagina;
use Model\ViewModel\VendaViewModel;
use Model\ViewModel\VendaVenderViewModel;
use Model\ViewModel\VendaFecharVendaViewModel;
use Model\ViewModel\CadastroClienteViewModel;
use Model\ViewModel\CadastroClienteConfirmadoViewModel;
use Model\ViewModel\RecebimentoViewModel;
use Model\ViewModel\RecebimentoReceberViewModel;
use Model\ViewModel\RecebimentoReceberRecebidoViewModel;
use Model\ViewModel\GerenciamentoProdutoViewModel;
use Model\ViewModel\GerenciamentoProdutoAlterarViewModel;
use Model\ViewModel\RelatorioSaldoClientesViewModel;



$aplicacao =  isset( $_GET['app'] ) ? $_GET['app'] : "";
var_dump($aplicacao);

switch ($aplicacao) 
{
    case "venda":
        $pagina = new Pagina();
        $pagePartes = array(
        "head"   => "head",
        "body"   => "venda",
        "footer" => "footer"
        );        
        $viewModel = new VendaViewModel();
        $viewModel->pesquisarCliente($pagina);
        $pagina->drawPagina($pagePartes);
        break;
    
    case "venda-vender":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "venda_vender",
            "footer" => "footer"
        );
        $viewModel = new VendaVenderViewModel();
        $viewModel->retornarCliente($pagina);
        $viewModel->retornarListaProdutos($pagina);
        $pagina->drawPagina($pagePartes);
        break;
        
    case "venda_fechar_venda":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "venda_fechar_venda",
            "footer" => "footer"
        );
        $viewModel = new VendaFecharVendaViewModel();
        $viewModel->retornarCliente($pagina);
        $viewModel->retornarListaProdutosDoPedido($pagina);
        $viewModel->JONretornarListaProdutos($pagina);
        $pagina->drawPagina($pagePartes);
        break;
                
    case "cadastrar_cliente":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "cadastro_cliente",
            "footer" => "footer"
        );
        $viewModel = new CadastroClienteViewModel();
        $viewModel->ClienteCadastradosRecentes($pagina);
        $pagina->drawPagina($pagePartes);
        break;
            
    case "cadastrar_cliente_confirmado":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "cadastro_cliente_confirm",
            "footer" => "footer"
        );
        $viewModel = new CadastroClienteConfirmadoViewModel();
        $viewModel->cadastarCliente($pagina);
        $pagina->drawPagina($pagePartes);
        break;

    case "recebimento":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "recebimento",
            "footer" => "footer"
        );
        $viewModel = new RecebimentoViewModel();
        $viewModel->pesquisarCliente($pagina);
        $pagina->drawPagina($pagePartes);
        break;
                
    case "recebimento-receber":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "recebimento_receber",
            "footer" => "footer"
        );
        $viewModel = new RecebimentoReceberViewModel();
        $viewModel->retornarCliente($pagina);
        //$viewModel->pesquisarCliente($pagina);
        //$viewModel->cadastarCliente($pagina);
        $pagina->drawPagina($pagePartes);
        break;
                
    case "recebimento-receber-recebido":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "recebimento_receber_recebido",
            "footer" => "footer"
        );
        $viewModel = new RecebimentoReceberRecebidoViewModel();
        $viewModel->retornarCliente($pagina);
        $pagina->drawPagina($pagePartes);
        break;
        
    case "gerenciamento":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "gerenciamento",
            "footer" => "footer"
        );
        $pagina->drawPagina($pagePartes);
        break;
        
    case "gerenciamento-produto":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "gerenciamento_produto",
            "footer" => "footer"
        );
        $viewModel = new GerenciamentoProdutoViewModel();
        $viewModel->cadastrarProduto($pagina);
        $viewModel->listaTodosOsProdutos($pagina);
        $pagina->drawPagina($pagePartes);
        break;
        
    case "gerenciamento-produto-alterar":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "gerenciamento_produto_alterar",
            "footer" => "footer"
        );
        $viewModel = new GerenciamentoProdutoAlterarViewModel();
        $viewModel->alterarProduto($pagina);
        $viewModel->deletarProduto($pagina);
        $viewModel->recuperarProduto($pagina);
        $pagina->drawPagina($pagePartes);
        break;
        
    case "relatorios":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "relatorios",
            "footer" => "footer"
        );
        $pagina->drawPagina($pagePartes);
        break;
        
    
    case "relatorio-saldo-clientes":
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "relatorio_saldo_clientes",
            "footer" => "footer"
        );
        $viewModel = new RelatorioSaldoClientesViewModel();
        $viewModel->saldoPedidosCliente($pagina);
        $pagina->drawPagina($pagePartes);
        break;
        
        
        
    case 1:
        echo "i equals 1";
        break;
    
        
    case "":
        
        $pagina = new Pagina();
        $pagePartes = array(
            "head"   => "head",
            "body"   => "main",
            "footer" => "footer"
        );
        
        $pagina->drawPagina($pagePartes);
        
        break;
    default:
        $pagina = new Pagina();
        $pagePartes = array(
        "head"   => "",
        "body"   => "",
        "footer" => ""
            );
        
        $pagina->drawHead( $pagePartes["head"] );
        $pagina->drawBody( $pagePartes["body"] );
        $pagina->drawFooter( $pagePartes["footer"]);
        
}



//$pagina->setPagePartes($pagePartes);
//$pagina->configuracaoPage();

//use controller\Rotas;
//echo "aaaaaaaaaaaaaa";



/*

$app = new Slim\Slim();

$app->get('/', function ( ) {
    
    
    echo "eutou na home";
    
});

    
$app->get('/venda', function ( ) {
        
        
        echo "eutou na venda";
        
});


// Run app
$app->run();



//$pagina = new Pagina();


//$pagina->teste();



//$rotas = new Rotas();

//$rotas->teste();

//$rotas->nomeRota(0);

//$rotas->rotaLista();

//$rotas->runApp();
*/