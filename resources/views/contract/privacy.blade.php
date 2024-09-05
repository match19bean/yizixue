@extends('layouts.guest2')

@section('content')
    <div class="l-contract">
        <div class="l-contract__content container">
            <h2 class="l-contract__title">隱私權</h2>
            <div class="row">
                <div class="col-md-12">
                    <dl>
                        <dd>
                            <ol>
                                {!! !empty($contract->content) ? nl2br($contract->content) :'' !!}
                            </ol>
                        </dd>
                    </dl>
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