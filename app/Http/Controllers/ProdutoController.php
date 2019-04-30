<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Request;

class ProdutoController extends Controller {

    public function lista() {

        $produtos = DB::select('select * from produtos');

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
        $resposta = DB::select('select * from produtos where id = ?',[$id]);

        if(empty($resposta)) {
            return "Esse produto não existe";
        }
            return view('produto.detalhes')->with('p', $resposta[0]);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(){
        // $all = Request::all(); //Retorna um array com todos os valores
        // $only = Request:only('nome', 'valor', '...');

        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        // DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)',
        // array($nome, $quantidade, $valor, $descricao));
        DB::table('produtos')->insert(
            ['nome' => $nome,
             'valor' => $valor,
             'descricao' => $descricao,
             'quantidade' => $quantidade]
        );

        return view('produto.adicionado')->with('nome', $nome);
        // return implode(', ', array($nome, $descricao, $valor, $quantidade));
    }
}
