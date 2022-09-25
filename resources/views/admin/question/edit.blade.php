@extends('layouts.layout')

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <h1>{{__('Add new question')}}</h1>
                            <p class="small text-success">@if($errors->has('message')) {{$errors->first('message')}} @endif</p>
                            <p class="small text-danger">@if($errors->has('failed')) {{$errors->first('failed')}} @endif</p>
                            <form class="mb-3 mt-md-4" action="{{route('admin.questions.update',['question' => $question->id])}}" method="post">
                                <input type="hidden" name="_method" value="put"/>
                                @csrf
                                <div class="mb-3">
                                    <label for="question" class="form-label ">{{__('Question')}}</label>
                                    <p class="small text-danger">@if($errors->has('question')) {{$errors->first('question')}} @endif</p>
                                    <input name="question" type="text" class="form-control" id="question" autofocus
                                           value="{{$question?->question}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rate"
                                           class="form-label ">{{__('Question score')}}</label>
                                    <p class="small text-danger">@if($errors->has('rate')) {{$errors->first('rate')}} @endif</p>
                                    <input min="{{config('app.minimum_score')}}" max="{{config('app.maximum_score')}}"
                                           name="rate" type="number" class="form-control"
                                           id="rate" value="{{$question->rate}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="validationServer04" class="form-label">{{__('Game')}}</label>
                                    <p class="small text-danger">@if($errors->has('game_id')) {{$errors->first('game_id')}} @endif</p>
                                    <select name="game_id" class="form-select form-select-lg"
                                            aria-label=".form-select-lg example" required>
                                        <option selected="" disabled="" value="">{{__('Choose...')}}</option>
                                        @foreach($games as $gameObject)
                                            @if($question->id === $gameObject->id)
                                                <option selected
                                                        value="{{$gameObject->id}}">{{$gameObject->name}}</option>
                                            @else
                                                <option value="{{$gameObject->id}}">{{$gameObject->name}}</option>
                                            @endif
                                        @endforeach

                                    </select>
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
