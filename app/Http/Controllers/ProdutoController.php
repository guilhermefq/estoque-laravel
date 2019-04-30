<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function __construct()
    {
        /* $this->middleware('nosso-middleware',
            ['only' => ['adiciona', 'remove']]); */
        $this->middleware('auth',
            ['only' => ['adiciona', 'remove']]);
    }

    public function lista() {

        //$produtos = DB::select('select * from produtos');
        $produtos = Produto::all();

        return view('produto.listagem')->with('produtos', $produtos);

        //return view('listagem', ['produtos' => $produtos]);

        /*
        $data = [];
        $data['produtos'] = $produtos;
        return view('listagem', $data); */

        //view()->file('/caminho/para/sua/view');

        /*if(view()->exists('listagem')){
            return view('listagem');
        }*/

        /*if(View::exists('listagem')) {
            //
        }*/
    }

    public function mostra($id) {
        //$id = Request::route('id');
        //$resposta = DB::select('select * from produtos where id = ?',[$id]);
        $produto = Produto::find($id);

        if(empty($produto)) {
            return "Esse produto não existe";
        }
            return view('produto.detalhes')->with('p', $produto);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request){
        // $all = Request::all(); //Retorna um array com todos os valores
        // $only = Request:only('nome', 'valor', '...');

        //$params = Request::all();
        //$produto = new Produto($params);
        Produto::create($request->all()); // factory method
        /*$produto->nome = Request::input('nome');
        $produto->descricao = Request::input('descricao');
        $produto->valor = Request::input('valor');
        $produto->quantidade = Request::input('quantidade');*/

        // $produto->save(); // substituido pelo factory method
        // DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)',
        // array($nome, $quantidade, $valor, $descricao));
        /* DB::table('produtos')->insert(
            ['nome' => $nome,
             'valor' => $valor,
             'descricao' => $descricao,
             'quantidade' => $quantidade]
        ); */

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
        // return redirect('/produtos')->withInput(Request::only('nome'));
        // return view('produto.adicionado')->with('nome', $nome);
        // return implode(', ', array($nome, $descricao, $valor, $quantidade));
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->action('ProdutoController@lista');
    }

    public function listaJson(){
        $produtos = Produto::all();
        return $produtos;
        // return response()->json($produtos); // De forma explicita
    }
}
