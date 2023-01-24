@include('components/form/ValidateError')
<label class="text-sm mb-5"><span class="text-red-500">*</span>は必須入力項目</label>
<label for="managerId" class="">営業担当者<span class="text-red-500">*</span></label>
@if($is_read == 'true')
<input required name="manager_id" class="mb-3 rounded" type="hidden" id="managerId" @if(!empty($company)) value="{{ $company['manager_id'] }}" @endif @if($is_read==true) readonly="" @endif>
<input required name="manager_name" class="mb-3 rounded" type="text" id="managerName" @if(!empty($manager)) value="{{ $manager['name'] }}" @endif @if($is_read==true) readonly="" @endif>
@else
<select class="mb-3 rounded" name="manager_id" aria-label="Default select">
  <option value="">営業担当者を選択</option>
  @foreach($managers as $key => $value)
    <?php $value = $value->getAttributes();?>
    <option value="{{$value['id']}}" @if( !empty($company['manager_id']) && $company['manager_id'] == $value['id'] ) selected @endif>{{$value['name']}}</option>
  @endforeach
</select>
@endif
<label for="companyName" class="">企業名<span class="text-red-500">*</span></label>
<input required name="company_name" class="mb-3 rounded" type="text" id="companyName" @if(!empty($company)) value="{{ $company['company_name'] }}" @endif @if($is_read==true) readonly="" @endif>
<label for="prefecture" class="">都道府県</label>
<input name="prefecture" class="mb-3 rounded" type="text" id="prefecture" @if(!empty($company)) value="{{ $company['prefecture'] }}" @endif @if($is_read==true) readonly="" @endif>
<label for="address" class="">住所（市区町村以下）</label>
<input name="address" class="mb-3 rounded" type="text" id="address" @if(!empty($company)) value="{{ $company['address'] }}" @endif @if($is_read==true) readonly="" @endif>
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確認</button>
</div>