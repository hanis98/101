@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card border-0 shadow-sm ">
                    @isset($card_header)
                        <div class="card-header border-0 bg-white">
                            {{ $card_header }}
                        </div>
                    @endisset
                    <div class="card-body border-0">
                        {{ $card_body }}
                    </div>
                    @isset($card_footer)
                        <div class="card-footer border-0 bg-default">
                            {{ $card_footer }}
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection