@include('components/form/ValidateError')
<label class="mb-5 text-sm"><span class="text-red-500">*</span>は必須入力項目</label>
<label for="companyId" class="">導入企業<span class="text-red-500">*</span></label>
@if($is_read == 'true')
<input required name="company_id" class="mb-3 rounded" type="hidden" id="companyId" @if(!empty($company)) value="{{ $company['company_id'] }}" @endif @if($is_read==true) readonly="" @endif>
<input required name="company_name" class="mb-3 rounded" type="text" id="managerName" @if(!empty($manager)) value="{{ $manager['name'] }}" @endif @if($is_read==true) readonly="" @endif>
@else
<select class="mb-3 rounded" name="company_id" aria-label="Default select">
  <option value="">企業を選択</option>
  @foreach($company as $key => $value)
    <?php $value = $value->getAttributes();?>
    <option value="{{$value['company_id']}}" @if( !empty($station['company_id']) && $station['company_id'] == $value['company_id'] ) selected @endif>{{$value['company_name']}}</option>
  @endforeach
</select>
@endif

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