@php
    $user = auth('web')->user();
@endphp

<aside class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <ul class="list-unstyled ps-0">

        @if($user?->role === \App\Enums\UserRoleEnum::ADMIN->value)
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                {{__('Games')}}
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('public.game.index')}}" class="link-dark d-inline-flex text-decoration-none rounded">{{__('Games list')}}</a></li>
                    <li><a href="{{route('admin.games.create')}}" class="link-dark d-inline-flex text-decoration-none rounded">{{__('Create a game')}}</a></li>
                </ul>
            </div>


            <li class="border-top my-3"></li>
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                {{__('Questions')}}
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('admin.questions.index')}}" class="link-dark d-inline-flex text-decoration-none rounded">{{__('Questions list')}}</a></li>
                    <li><a href="{{route('admin.questions.create')}}" class="link-dark d-inline-flex text-decoration-none rounded">{{__('Create a question')}}</a></li>
                </ul>
            </div>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Home
                </button>
                <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Updates</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reports</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Dashboard
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Annually</a></li>
                    </ul>
                </div>
            </li>
        @elseif($user?->role === \App\Enums\UserRoleEnum::USER->value)
            <li class="mb-1">
                <a class="btn d-inline-flex align-items-center rounded border-0"
                   href="{{route('public.game.index')}}">
                    {{__('Game')}}
                </a>
            </li>
            <li class="border-top my-3"></li>
        @else
            <li class="mb-1">
                <a class="btn d-inline-flex align-items-center rounded border-0 collapsed"
                   data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    {{__('Game')}}
                </a>
            </li>
            <li class="border-top my-3"></li>
        @endif


    </ul>
</aside>
<div class="b-example-divider b-example-vr"></div>

