@extends('layouts.guest2')

@section('content')
    <div class="l-contract">
        <div class="l-contract__content container">
            <h2 class="l-contract__title">簡訊聲明</h2>
            <div class="row">
                <div class="col-md-12">
                    <dl>
                        <dd>
                            <ol>
                                此簡訊於註冊 https://yizixue.com.tw/ 發送手機驗證碼註冊會員使用。
                            </ol>

                            <ol>
                                By sending a text message, registered members can receive a verification code to assist in verifying their identity.
                            </ol>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal" method="POST" action="{{ route('sms.confirm') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('country_code') ? ' has-error' : '' }}">
                                    <select id="country_code" class="form-control form-control-user o-input" name="country_code">
                                        @foreach($Data['country_codes'] as $code => $text)
                                            <option value="{{$code}}">+{{$code}} {{$text}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <input id="phone" type="text" class="form-control form-control-user o-input"
                                           name="phone" value="{{ old('phone') }}" placeholder="會員手機">
                                    @if ($errors->has('phone'))
                                        <span class="help-block alert-danger">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="checkbox text-center">
                                    <label style="color: #4C2A70;" for="sms_confirm">
                                        <input type="checkbox" name="sms_confirm" id="sms_confirm" value="1"> 我同意接收簡訊驗證碼。
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class=" text-white btn btn-user btn-block o-input"
                                        style="background-color: #4C2A70">
                                    確認
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="l-contract">
        <div class="l-contract__content container">
            <h2 class="l-contract__title"></h2>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>

@endsection