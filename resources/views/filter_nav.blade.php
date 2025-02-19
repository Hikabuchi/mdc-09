<div class="d-flex" xmlns:a="http://www.w3.org/1999/html">
    <div class="d-flex flex-column flex-shrink-0 p-3  shadow" style="width: 230px;">
        <a href="/" class="d-flex align-items-center  mb-md-0 me-md-auto text-black text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Фильтр</span>
        </a>
        <form action="/filter" method="get">
            <hr>
            <label for="genre"><strong>Жанры: </strong></label><br>
            <select multiple name="genre[]" id="genre" class="sel2 col-12">
                @foreach($genres as $gen)
                    <option value="{{$gen->id}}" @if(is_array(request()->genre) && in_array($gen->id, request()->genre)) selected @endif>{{$gen->name}}</option>
                @endforeach
            </select>
            <hr>

            <select name="year" id="year">
                <option value="">Выбрать год</option>
                @foreach($years as $year)
                    <option value="{{$year->year}}" @if(request()->year == $year->year) selected @endif>{{$year->year}}</option>
                @endforeach
            </select>
            <hr>
            <label for="country"><strong>Страны: </strong></label><br>
            <select multiple name="country[]" id="country" class="sel2 col-12">
                @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(is_array(request()->country) && in_array($country->id, request()->country)) selected @endif>{{$country->name}}</option>
                @endforeach
            </select>
            <hr>
            <button type="submit" class="btn btn-primary">Фильтровать</button>
        </form>


    </div>
