@if(quickLinks())
<div class="table-of-contents">
    <h2>Quick Links</h2>
    <ul>
        @foreach (quickLinks() as $page)
        <li> <a href="{{route('page.index', $page->slug)}}">{{$page->name}}</a> </li>
        @endforeach
    </ul>
</div>
@endif