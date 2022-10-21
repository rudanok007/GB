@include("core::template.inner")

@section('content')
    <div class="wrapper">
        <div class="container">

                    <div class="form-auth">
                        {!! Form::open(['route' => 'auth', 'method' => 'post']) !!}
{{--                        <form action="{{ route('auth') }}" method="post" id="auth">--}}
                            @csrf
                        {!! Form::label('email', 'Введите логин') !!}
                        {!! Form::text('email', null, ['class' => ['form-control', 'form-group'], 'placeholder' => 'example@example.com']); !!}
{{--                            <input type="text" id="email" name="email" class="form-control form-group">--}}
                        {!! Form::label('password', 'Введите пароль') !!}
                        {!! Form::password('password', ['class' => ['form-control', 'form-group']]); !!}
{{--                            <input type="password" id="password" name="password" class="form-control form-group">--}}
                            <div class="form-check" style="">

                                <label class="form-check-label" for="remember_token">
                                    Запомнить меня
                                    {!! Form::checkbox('remember', true, false) !!}
                                </label>
                            </div>
                            <input type="submit" class="btn btn-success form-group">
                        {!! Form::close() !!}
{{--                        </form>--}}
                     </div>

        </div>
    </div>
