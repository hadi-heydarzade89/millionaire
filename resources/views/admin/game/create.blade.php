@extends('layouts.layout')

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <p class="small text-success">@if($errors->has('message')) {{$errors->first('message')}} @endif</p>
                            <p class="small text-danger">@if($errors->has('failed')) {{$errors->first('failed')}} @endif</p>
                            <form class="mb-3 mt-md-4" action="{{route('admin.games.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label ">{{__('Game name')}}</label>
                                    <p class="small text-danger">@if($errors->has('name')) {{$errors->first('name')}} @endif</p>
                                    <input name="name" type="text" class="form-control" id="name" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label ">{{__('Description')}}</label>
                                    <p class="small text-danger">@if($errors->has('description')) {{$errors->first('description')}} @endif</p>
                                    <input name="description" type="text" class="form-control" id="description">
                                </div>
                                <div class="mb-3">
                                    <label for="max_allowed_questions"
                                           class="form-label ">{{__('Max allowed questions')}}</label>
                                    <p class="small text-danger">@if($errors->has('max_allowed_questions')) {{$errors->first('max_allowed_questions')}} @endif</p>
                                    <input min="1" max="10"
                                           name="max_allowed_questions" type="number" class="form-control"
                                           id="max_allowed_questions" required>
                                </div>


                                <div class="mb-3">
                                    <label for="status" class="form-label">State</label>
                                    <select name="status" class="form-select form-select-lg" id="status" required>
                                        <option disabled="" value="">{{__('Choose...')}}</option>
                                        @foreach(\App\Enums\GameStatusEnum::cases() as $game)
                                            <option  value="{{$game?->value}}">{{$game->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="small text-danger">@if($errors->has('status')) {{$errors->first('status')}} @endif</p>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">{{__('Submit')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
