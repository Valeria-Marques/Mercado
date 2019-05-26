<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compras;
use App\User;

class ComprasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function _construct(){
        $this.middleware('auth');
    }
    public function index(){
        return view('Admin/homeCompras');
    }
    public function form(){
        return view('Admin/createCompras');
    }
    public function create(Request $request)
    {   
        $dados = $request->all();

        $str = $dados['price'];
        $str = str_replace('.', '', $str); // remove o ponto
        $dados['price'] =  str_replace(',', '.', $str); // troca a vírgula por ponto

        Compras::create($dados);
         return redirect('admin/compras/view');

    }
    public function view(){
   $compras = Compras::orderBy('name','ASC')->paginate(2);
   $users = User::all();
   $userCount = $users->count('id');
   $count = $compras->count('price');
   $id = $users[0];
   $soma = $this->moeda($compras->sum('price'));

     return view('Admin/compras', compact('compras',
                                          'users',
                                          'id',
                                         'count',
                                         'soma'));
}
private function moeda($valor){
    return number_format($valor,2,",",".");
 }

 public function update($id){
    $compras = Compras::find($id);
    return view('Admin/updateCompras', compact('compras'));

 }

 public function update_data(Request $req, $id){
    $compras = $req->all();

    $str = $compras['price'];
    $str = str_replace('.', '', $str); // remove o ponto
    $compras['price'] =  str_replace(',', '.', $str); // troca a vírgula por ponto

    Compras::find($id)->update($compras);
    return redirect('admin/compras/view');

 }
 public function delete($id){

    $compras = Compras::find($id);
    $compras->delete();
    return redirect('admin/compras/view');

}


}
