@section('navigation')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/products">ファイトステーション 在庫管理ツール</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hm-menu" aria-controls="hm-menu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="hm-menu">
    <ul class="navbar-nav mr-auto">
      <li id="route" class="nav-item">
        <a class="nav-link" href="/company">導入企業一覧 <span class="sr-only">(current)</span></a>
      </li>
      <li id="route" class="nav-item">
        <a class="nav-link" href="/products">商品一覧 <span class="sr-only">(current)</span></a>
      </li>
      <li id="route" class="nav-item">
        <a class="nav-link" href="/stations">ステーション一覧 <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li id="route" class="nav-item">
        <a class="nav-link" href="/facilities">付帯施設一覧 <span class="sr-only">(current)</span></a>
      </li> -->
      <!-- <li id="create_roadstation" class="nav-item">
        <a class="nav-link" href="/create_roadstation">道の駅新規登録</a>
      </li> -->
    </ul>
    <form method="POST" action="{{ route('logout') }}" class="float-right">
      @csrf
      <button type="submit" class="btn btn-link">
          ログアウト
      </button>
    </form>
  </div>
</nav>
@endsection