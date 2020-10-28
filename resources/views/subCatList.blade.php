<div class="filter-categories">
    <ul class="filter-categories__list">
        @foreach($subcategories as $subcat)
            <li class="filter-categories__item filter-categories__item--current">
                <a href="{{$subcat['Id']}}">{{ucwords(strtolower($subcat['Name']))}}</a>
            </li>
        @endforeach
    </ul>
</div>
