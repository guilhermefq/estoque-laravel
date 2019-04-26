<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ProdutoController extends Controller {

    public function lista() {

        $produtos = DB::select('select * from produtos');

        return view('listagem')->with('produtos', $produtos);

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
}
