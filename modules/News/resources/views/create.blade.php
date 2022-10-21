@include('core::template.inner')

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="form">
                {!! Form::model(\Modules\News\Model\News::class, ['route' => 'news.create']) !!}
                {!! Form::label('title', 'Введите название') !!}
                {!! Form::text('title', null, ['class' => ['form-control', 'form-group']]) !!}
                {!! Form::label('category_code', 'Выберите категорию') !!}
                {!! Form::select('category_code', \Modules\News\Model\Category::all()->pluck('name', 'code'), ['class' => ['form-control', 'form-group']]) !!}
                {!! Form::label('description', 'Введите малое описание') !!}
                {!! Form::text('description', null, ['class' => ['form-control', 'form-group']]) !!}
                {!! Form::label('fulltext', 'Введите полное описание') !!}
                {!! Form::textarea('fulltext', null, ['class' => ['form-control', 'form-group']]) !!}
                {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
