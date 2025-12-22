@extends('admin.layouts.app')
@section('panel')

    <x-admin.ui.card>
        <x-admin.ui.card.body>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center ps-0">
                    {{ __($val->name) }}
                    <span>
                        <p>{{ __($val->value) }}</p>
                    </span>
                </li>
            </ul>

        </x-admin.ui.card.body>
    </x-admin.ui.card>

@endsection