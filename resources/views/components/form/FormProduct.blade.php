<label for="productId" class="form-label">商品ID</label>
<input name="product_id" type="text" class="form-control" id="productId" @if(!empty($product)) value="{{$product['product_id']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="janCode" class="form-label">JANコード</label>
<input name="jan_code" type="text" class="form-control" id="janCode" minlength="8" maxlength="13" @if(!empty($product)) value="{{$product['jan_code']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="productName" class="form-label">商品名</label>
<input name="product_name" type="text" class="form-control" id="productName" @if(!empty($product)) value="{{$product['product_name']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="productPrice" class="form-label">価格</label>
<input name="product_price" type="number" class="form-control" id="productPrice" @if(!empty($product)) value="{{$product['product_price']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="productPoint" class="form-label">獲得ポイント</label>
<input name="product_point" type="number" class="form-control" id="productPoint" @if(!empty($product)) value="{{$product['product_point']}}" @endif @if($is_read==true) readonly="" @endif>
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確認</button>
</div>