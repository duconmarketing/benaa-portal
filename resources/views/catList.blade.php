<div class="filter-categories">
    <ul class="filter-categories__list">
        @foreach($categories as $cat)
            @if($parentId == $cat['Id'])
                <li class="filter-categories__item filter-categories__item--current">
                    <a href="{{URL::to('/')}}/product/{{$cat['Id']}}">{{ucwords(strtolower($cat['Name']))}}</a>
                </li>
            @else
            <li class="filter-categories__item">
                <a href="{{URL::to('/')}}/product/{{$cat['Id']}}">{{ucwords(strtolower($cat['Name']))}}</a>
            </li>
            @endif
        @endforeach
    </ul>
</div>
