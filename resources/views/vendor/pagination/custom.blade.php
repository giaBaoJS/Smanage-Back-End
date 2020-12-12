<div class='pagination'>
  <nav>
    <div class="{{$result->onFirstPage() ? 'disable' : ''}}" ><a href='{{$result->previousPageUrl()}}'><</a></div>
    <div><b class="page">{{$result->currentPage()}} </b> &nbsp;/&nbsp; <span class="total-page">{{$result->lastPage()}}</span></div>
    <div class="{{$result->lastPage() === $result->currentPage() ? 'disable' : ''}}"><a href='{{$result->nextPageUrl()}}'>></a></div>
  </nav>
</div>