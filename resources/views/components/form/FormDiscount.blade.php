@include('components/form/ValidateError')
@foreach($inventory as $key => $value)
<div class="flex lg:flex-row flex-row flex-wrap items-center mb-5 p-2">
  <label for="products" class="lg:mx-2 mx-2">商品名</label>
  <span class="mr-5">{{$value->product_name}}</span>
  <label for="inventory" class="lg:mx-2 mx-2">金額</label>
  <span class="mr-5">{{$value->product_price}}円</span>
  <label for="discount" class="lg:mx-2 mx-2">割引</label>
  <input type="text" name="discount[{{$key}}][rate]" value="{{$value->discount_rate}}" class="mb-3 rounded mx-2 w-40" onchange="showPrice(this.value,{{$value->product_price}},{{$key}})"><span>%</span>
  <label class="lg:mx-2 mx-2">割引後の値段</label>
  <span id="price-after-discount{{$key}}">{{ $value->product_price * ( (100 - $value->discount_rate) / 100 ) }}円</span>
  <input type="hidden" name="discount[{{$key}}][station_id]" value="{{$value->station_id}}">
  <input type="hidden" name="discount[{{$key}}][product_id]" value="{{$value->product_id}}">
</div>
@endforeach
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確定</button>
</div>
<script type="text/javascript">
  function showPrice(rate,price,id_key){
    let ret = 0;
    ret = price * ((100-rate) / 100);
    let input = document.getElementById('price-after-discount'+id_key);
    input.innerText = ret + '円';
  }
</script>