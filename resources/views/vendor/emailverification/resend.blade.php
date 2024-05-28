@extends('layouts.guest2')

@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-bg mb-4" style="color: #4C2A70">@lang('emailverification::messages.resend.title')</h1>
                                    </div>

                                    @if($verified)
                                        <div class="alert alert-success">
                                            @lang('emailverification::messages.done')
                                        </div>
                                    @else

                                        <form class="form-horizontal" role="form" method="POST"
                                              action="{{ route('resendVerificationEmail') }}">
                                            {!! csrf_field() !!}


                                            <div class="alert alert-warning dark">
                                                @lang('emailverification::messages.resend.warning', ['email' => $email])
                                            </div>

                                            <p>
                                                @lang('emailverification::messages.resend.instructions')
                                            </p>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">@lang('emailverification::messages.resend.email')</label>

                                                <div class="col-md-6">

                                                    <input type="text" class="form-control" name="email"
                                                           value="{{ old('email', $email) }}">

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group">


                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        @lang('emailverification::messages.resend.submit')
                                                    </button>
                                                </div>
                                            </div>


                                        </form>


                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection