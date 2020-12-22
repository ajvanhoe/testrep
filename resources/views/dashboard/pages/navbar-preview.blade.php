<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <a class="navbar-brand mr-5">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    @foreach($pages as $page)
      <li class="nav-item">
        <a class="nav-link" href="{{route('pages.edit', $page)}}">{{$page->title}}</a> 
      </li>
        @if($page->sub_pages->isNotEmpty())
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown{{$page->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
        <div class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
        @foreach($page->sub_pages->sortBy('index') as $sub_page)
          <a class="dropdown-item bg-secondary" href="{{route('pages.edit', $sub_page)}}"><span class="text-white">{{$sub_page->title}}</span></a>
        @endforeach
        </div>
        </li>
        @endif
    @endforeach
    </ul>
 
  </div>
</nav>