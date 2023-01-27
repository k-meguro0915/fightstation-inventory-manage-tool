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
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確認</button>
</div>