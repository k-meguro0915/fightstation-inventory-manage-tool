<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Product;

class ProductsController extends Controller
{
    private $service;
    public function __construct(ProductService $service)
    {
      // $this->middleware('auth');
      $this->service = $service;
    }
    public function index(){
      $list = $this->service->all();
      return view('ListProducts',[
        "products" => $list
      ]);
    }
    public function create(){
      return view('CreateProduct');
    }
    public function edit($request){
      $ret = $this->service->edit($request);
      return view('EditProduct',[
        'product' => $ret[0]->getAttributes()
      ]);
    }
    public function confirm(Request $request){
      // $ret = $this->service->store($request);
      $this->validate($request, [
        'jan_code' => 'required|integer',
        'product_name' => 'required',
        'product_price' => 'required|integer|min:0',
        'product_point' => 'required|integer|min:0',
      ]);
      return view('ConfirmProduct',[
        'product' => $request
      ]);
    }
    public function commit(Request $request){
      $ret = $this->service->commit($request);
      $message = $ret == 'true' ? '登録が完了しました。' : $ret;
      return redirect('/products')->with('flash_message',$message);
    }
    public function delete($product_id){
      $ret = $this->service->delete($product_id);
      $message = $ret == 'true' ? '削除が完了しました。' : $ret;
      return redirect('/products')->with('flash_message',$message);
    }
}
