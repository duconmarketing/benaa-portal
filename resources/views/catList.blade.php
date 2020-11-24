<div class="filter-categories">
    <ul class="filter-categories__list">
        @foreach($categories as $cat)
            @if($parentId == $cat['Id'])
                <li class="filter-categories__item filter-categories__item--current pb-2" style="border-bottom: 1px solid #dfdbdb;">
                    <a href="{{URL::to('/')}}/product/{{$cat['Id']}}">{{ucwords(strtolower($cat['Name']))}}</a>
                </li>
            @else
                <li class="filter-categories__item pb-2" style="border-bottom: 1px solid #dfdbdb;">
                    <a href="{{URL::to('/')}}/product/{{$cat['Id']}}">{{ucwords(strtolower($cat['Name']))}}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
