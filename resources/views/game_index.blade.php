@extends('layouts.layout')
@php
    $user = auth('web')->user()
@endphp
@section('content')
    @if ($user?->role === \App\Enums\UserRoleEnum::ADMIN->value)
        <div class="d-flex flex-row-reverse mb-3" style="align-items: center">
            <a href="{{route('admin.games.create')}}" title="{{__('Add new game')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor"
                     class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
            </a>
            <a href="{{route('admin.games.create')}}">
                <div style="margin-right: 1.5rem">{{__('Add new game')}}</div>
            </a>
        </div>
    @endif
    @if($games->count() === 0)
        <p>{{__('The games list is empty. We will add some game in future.')}}</p>
    @else
        <div class="list-group w-auto">
            @foreach($games as $game)


                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{$game->name}}</h6>
                        <p class="mb-0 opacity-75">{{$game?->description}}</p>
                    </div>
                    <small
                        class="opacity-50 text-nowrap">{{\Carbon\Carbon::parse($game->created_at)->diffForHumans()}}</small>
                    @if($user?->role !== \App\Enums\UserRoleEnum::ADMIN->value)
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                            </svg>
                        </a>
                    @endif
                    @if($user?->role === \App\Enums\UserRoleEnum::ADMIN->value)
                        <a href="{{route('admin.games.edit',['game' => $game->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <form method="post" action="{{route('admin.games.destroy',['game' => $game->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" style="border: none" class="text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>
                <hr/>


            @endforeach
        </div>
        {{$games->links()}}

    @endif
@endsection
