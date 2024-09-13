@extends('layouts.guest2')

@section('content')
    <div class="l-contract">
    <div class="l-contract__content container">
    <h2 class="l-contract__title">付費訂閱條款</h2>
    <div class="row">
        <div class="col-md-12">
        <section class="my-3">
            <dl>
                <dt>
                    {!! !empty($contract->content) ? nl2br($contract->content) :'' !!}
                </dt>
            </dl>
        </section>
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