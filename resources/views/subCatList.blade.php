<div class="filter-categories">
    <ul class="filter-categories__list">
        @foreach($subcategories as $subcat)
            @if($parentId == $subcat['Id'])
                <li class="filter-categories__item filter-categories__item--current pb-2" style="border-bottom: 1px solid #dfdbdb;">
                    <a href="{{$subcat['Id']}}">{{ucwords(strtolower($subcat['Name']))}}</a>
                </li>
            @else
            <li class="filter-categories__item pb-2" style="border-bottom: 1px solid #dfdbdb;">
                <a href="{{$subcat['Id']}}">{{ucwords(strtolower($subcat['Name']))}}</a>
            </li>
            @endif
        @endforeach
    </ul>
</div>
