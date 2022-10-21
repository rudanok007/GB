@include("core::template.inner")

@section('content')
    <div class="wrapper">
        <div class="container">

            <div class="title">
                <h1>Новостной портал</h1>
            </div>

            <div class="left-widget-panel">
                <div class="card">
                    <div class="title">
                        Фильтр по Категориям
                        <hr>
                    </div>

                    <div class="filters">
                        {!!   Form::open(['route' => 'filters', 'method' => 'get']) !!}
                    @foreach($category as $item)
                        <ul>
                       <li>
                           {!! Form::label($item->name) !!}
                           {!! Form::checkbox('category[]',
                            $item->code,
                            false,
                            [
                                 'class' => 'form-group',
                                 'checked' => (isset($check_category) && in_array($item->code, $check_category)) ? true : false
                            ]) !!}
                       </li>
                        </ul>
                        @endforeach
                        <input type="submit" class="btn btn-success" value="Фильтровать">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    @foreach($news as $item)
                        <div class="col-lg-4">
                            <div class="card">
                                <a href="{{ url("/get_news", ['id' => $item['id']]) }}">
                                <div class="card-title">{{$item['title']}}</div>
                                <div class="card-small-text">{{$item['description']}}</div>
                                    @if($item['image'])
                                <div class="card-img"><img src="img/{{$item['image']}}" style="width: 100%" alt=""></div>
                                        @endif
                                </a>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>

        </div>
    </div>
