@extends('layouts.guest2')

@section('content')
<div class="l-contract">
    <div class="l-contract__content container">
    <h2 class="l-contract__title">服務條款</h2>
    <div class="row">
        <div class="col-md-12">
            <section class="my-3">
                <dl>
                    <dt>
                        <p>
                            {!! !empty($contract->content) ? nl2br($contract->content) :'' !!}
                        </p>
                    </dt>
                </dl>
            </section>
        </div>
    </div>
    </div>
</div>
@endsection