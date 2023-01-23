@include('components/form/ValidateError')
<label class="text-sm"><span class="text-red-500">*</span>は必須入力項目</label>
<label for="manager_name" class="">担当者名<span class="text-red-500">*</span></label>
<input name="name" class="mb-3 rounded" type="text" id="manager_name" @if(!empty($manager)) value="{{$manager['name']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="manager_email" class="">メールアドレス<span class="text-red-500">*</span><span class="mx-3 text-red-500">在庫が少なくなるとメールが送信されます</span></label>
<input name="email" class="mb-3 rounded" type="email" id="manager_email" @if(!empty($manager)) value="{{$manager['email']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="manager_pass" class="">パスワード<span class="text-red-500">*</span></label>
<input name="password" class="mb-3 rounded" type="password" id="manager_pass" @if($is_read==true) readonly="" @endif>
<label for="manager_pass_confirm" class="">パスワード（確認用）<span class="text-red-500">*</span></label>
<input name="password_confirmation" class="mb-3 rounded" type="password" id="manager_pass_confirm" @if($is_read==true) readonly="" @endif>
@if(!empty($manager['id']))
<input name="id" type="hidden" id="manager_id" @if(!empty($manager)) value="{{$manager['id']}}" @endif>
@endif

<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">登録</button>
</div>