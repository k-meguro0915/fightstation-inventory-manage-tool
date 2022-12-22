<label for="managerId" class="">担当者名</label>
<input name="name" class="mb-3 rounded" type="text" id="managerId" @if(!empty($manager)) value="{{$manager['id']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="managerId" class="">メールアドレス</label>
<input name="name" class="mb-3 rounded" type="mail" id="managerId" @if(!empty($manager)) value="{{$manager['email']}}" @endif @if($is_read==true) readonly="" @endif>
<label for="managerId" class="">パスワード</label>
<input name="password" class="mb-3 rounded" type="password" id="managerId" @if($is_read==true) readonly="" @endif>
<label for="managerId" class="">パスワード（確認用）</label>
<input name="password_confirmation" class="mb-3 rounded" type="password" id="managerId" @if($is_read==true) readonly="" @endif>

<div class="flex flex-col flex-wrap items-end">
  <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">登録</button>
</div>