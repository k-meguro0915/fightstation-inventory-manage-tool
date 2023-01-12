@include('components/form/ValidateError')
<label class="text-sm"><span class="text-red-500">*</span>は必須入力項目</label>
<label for="companyId" class="form-label">導入企業ID<span class="text-red-500">*</span></label>
<input name="company_id" type="text" class="mb-3 rounded" id="companyId" @if(!empty($station)) value="{{$station['company_id']}}" @endif>
<label for="stationId" class="form-label">ステーションID<span class="text-red-500">*</span></label>
<input name="station_id" type="text" class="mb-3 rounded" id="stationId" @if(!empty($station)) value="{{$station['station_id']}}" @endif>
<label for="stationName" class="form-label">ステーション名</label>
<input name="station_name" type="text" class="mb-3 rounded" id="stationName" @if(!empty($station)) value="{{$station['station_name']}}" @endif>

<h3 class="my-3 text-lg">在庫情報</h3>
<?php $arr=array(); if(!empty($inventory))$inventory->each(function($item,$key) use(&$arr){ $arr[] = $item->getAttributes()['product_id']; });?>
@for($i=0;$i < $input_field; $i++)
<div class="form-inline w-100 my-3">
  <label for="products" class="form-label mx-2">商品在庫</label>
  <select class="custom-select mx-2" name="inventory[{{$i}}][product_id]" aria-label="Default select">
    <option value="">商品を選択</option>
    @foreach($products as $key => $value)
      <?php $value = $value->getAttributes();?>
      <option value="{{$value['product_id']}}" @if( !empty($arr[$i]) && $arr[$i] == $value['product_id'] ) selected @endif>{{$value['product_name']}}</option>
    @endforeach
  </select>
  <label for="inventory" class="form-label mx-2">在庫数</label>
  <input type="number" value="<?php if( !empty($inventory) && $i < count($inventory) ) {?>{{$inventory[$i]->getAttributes()['inventory']}}<?php }?>" name="inventory[{{$i}}][inventory]" class="mb-3 rounded mx-2" id="inventory">
</div>
@endfor
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確認</button>
</div>