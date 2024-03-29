@include('components/form/ValidateError')
<label class="text-sm"><span class="text-red-500">*</span>は必須入力項目</label>
<label for="janCode" class="form-label">JANコード<span class="text-red-500">*</span></label>
<input name="jan_code" type="text" class="mb-3 rounded"id="janCode" minlength="8" maxlength="13" @if(!empty($product)) value="{{$product['jan_code']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="productName" class="form-label">商品名<span class="text-red-500">*</span></label>
<input name="product_name" type="text" class="mb-3 rounded"id="productName" @if(!empty($product)) value="{{$product['product_name']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="productPrice" class="form-label">価格<span class="text-red-500">*</span></label>
<input name="product_price" type="number" class="mb-3 rounded"id="productPrice" @if(!empty($product)) value="{{$product['product_price']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="productPoint" class="form-label">獲得ポイント<span class="text-red-500">*</span></label>
<input name="product_point" type="number" class="mb-3 rounded"id="productPoint" @if(!empty($product)) value="{{$product['product_point']}}" @endif @if($is_read==true) readonly="" @endif>
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確認</button>
</div>