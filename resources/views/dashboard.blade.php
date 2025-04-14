<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>{{ __('Dashboard') }}</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-success">{{ __("You're logged in!") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

