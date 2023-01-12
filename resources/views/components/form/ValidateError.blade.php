@if ($errors->any())
  <div class="none box-border p-1 text-center border border-gray-300 rounded-sm bg-gray-100">
    <ul>
      @foreach ($errors->all() as $error)
        <li class="text-red-500">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif