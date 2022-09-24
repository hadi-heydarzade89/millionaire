@extends('layouts.layout')

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4" action="{{route('admin.games.update',['game' => $game->id])}}" method="post">
                                <input type="hidden" name="_method" value="put"/>
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label ">{{__('Game name')}}</label>
                                    <p class="small text-danger">@if($errors->has('name')) {{$errors->first('name')}} @endif</p>
                                    <input name="name" type="text" class="form-control" id="name"
                                           value="{{$game?->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label ">{{__('Description')}}</label>
                                    <p class="small text-danger">@if($errors->has('description')) {{$errors->first('description')}} @endif</p>
                                    <input name="description" type="text" class="form-control" id="description"
                                           value="{{$game?->description}}">
                                </div>
                                <div class="mb-3">
                                    <label for="max_allowed_questions"
                                           class="form-label ">{{__('Max allowed questions')}}</label>
                                    <p class="small text-danger">@if($errors->has('max_allowed_questions')) {{$errors->first('max_allowed_questions')}} @endif</p>
                                    <input min="{{config('app.minimum_score')}}" max="{{config('app.maximum_score')}}"
                                           name="max_allowed_questions" type="number" class="form-control"
                                           id="max_allowed_questions" value="{{$game?->max_allowed_questions}}">
                                </div>


                                <div class="mb-3">
                                    <label for="status" class="form-label">State</label>
                                    <select name="status" class="form-select form-select-lg" id="status" required="">
                                        <option disabled="" value="">{{__('Choose...')}}</option>
                                        @foreach(\App\Enums\GameStatusEnum::cases() as $gameStatus)
                                            @if($game->status == $gameStatus->value)
                                                <option selected
                                                        value="{{$gameStatus->value}}">{{$gameStatus->name}}</option>
                                            @else
                                                <option value="{{$gameStatus->value}}">{{$gameStatus->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <p class="small text-danger">@if($errors->has('status')) {{$errors->first('status')}} @endif</p>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">{{__('Update')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
