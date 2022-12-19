<label for="companyId" class="">企業ID</label>
<input name="company_id" class="mb-3 rounded" type="text" id="companyId" @if(!empty($company)) value="{{$company['company_id']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="managerId" class="">担当者ID</label>
<input name="manager_id" class="mb-3 rounded" type="text" id="managerId" @if(!empty($company)) value="{{$company['manager_id']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="companyName" class="">企業名</label>
<input name="company_name" class="mb-3 rounded" type="text" id="companyName" @if(!empty($company)) value="{{ $company['company_name'] }}" @endif @if($is_read==true) readonly="" @endif>
<label for="prefecture" class="">都道府県</label>
<input name="prefecture" class="mb-3 rounded" type="text" id="prefecture" @if(!empty($company)) value="{{ $company['prefecture'] }}" @endif @if($is_read==true) readonly="" @endif>
<label for="address" class="">住所（市区町村以下）</label>
<input name="address" class="mb-3 rounded" type="text" id="address" @if(!empty($company)) value="{{ $company['address'] }}" @endif @if($is_read==true) readonly="" @endif>
<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確認</button>
</div>