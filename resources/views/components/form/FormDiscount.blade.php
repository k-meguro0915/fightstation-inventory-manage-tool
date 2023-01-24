@include('components/form/ValidateError')
<label class="mb-3 text-sm text-red-500">割引率と割引後の値段は、どちらか一方を入力すると自動で計算されたものがもう一方に入力されます。</label>
<label class="mb-3 text-sm text-red-500">割引率と割引後の値段は、少数点以下切り下げになります。</label>
<table class="table-auto w-full my-5">
  <thead>
    <th class="border" scope="col">商品名</th>
    <th class="border" scope="col">金額</th>
    <th class="border" scope="col">割引率</th>
    <th class="border" scope="col">割引後の値段</th>
  </thead>
  <tbody>
    @foreach($inventory as $key => $value)
      <tr class="text-center">
        <td class="border p-2">{{$value->product_name}}</td>
        <td class="border p-2">{{$value->product_price}}円</td>
        <td class="border p-2"><input type="text" id="price-discount-rate{{$key}}" name="discount[{{$key}}][rate]" value="{{$value->discount_rate}}" class="mb-3 rounded mx-2 w-40" onchange="showPrice({{$value->product_price}},{{$key}})"><span>%</span></td>
        <td class="border p-2"><input type="number" step="1" id="price-after-discount{{$key}}" value="{{ floor($value->product_price * ( (100 - $value->discount_rate) / 100 )) }}" onchange="showRate({{$value->product_price}},this.value,{{$key}})" class="mb-3 rounded mx-2 w-40" onchange="showPrice(this.value,{{$value->product_price}},{{$key}})"><span>円</span></td>
        <input type="hidden" name="discount[{{$key}}][station_id]" value="{{$value->station_id}}">
        <input type="hidden" name="discount[{{$key}}][product_id]" value="{{$value->product_id}}">
      </tr>
    @endforeach
  </tbody>
</table>
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確定</button>
</div>
<script type="text/javascript">
  function showPrice(price,id_key){
    let ret = 0;
    let rate = document.getElementById('price-discount-rate'+id_key).value;
    ret = price * ((100-rate) / 100);
    ret = Math.floor(ret);
    let input = document.getElementById('price-after-discount'+id_key);
    input.value = ret;
  }
  function showRate(price,rate,id_key){
    let ret = 0;
    ret = price * ((100-rate) / 100);
    ret = Math.floor(ret);
    let input = document.getElementById('price-discount-rate'+id_key);
    input.value = ret;
  }
</script>