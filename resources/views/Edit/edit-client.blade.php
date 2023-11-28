@extends('layouts.app')

@section('content')
    <section class="bg-image mt-3 mb-3"
             style="background-color: rgb(32,33,36);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100 w-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-2 align-self-start" style="padding-left: 5%;">
                    </div>
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6" style="margin-right: 15%;">
                        <div class="card" style="border-radius: 15px; background-color: rgb(13,17,23); color: white">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">{{$client->FCS}}</h2>
                                <form action="{{route("client.edit",[$client->id])}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="FCS">ФИО</label>
                                        <input id="FCS" type="text" name="FCS"  class="form-control form-control-lg @error('FCS') is-invalid @enderror" value="{{ $client->FCS }}"/>
                                        @error('FCS')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4" style="color: white">
                                        <label class="form-label" for="telephone">Телефон</label>
                                        <input type="text" name="telephone" id="telephone" class="form-control form-control-lg @error('telephone') is-invalid @enderror" value="{{ $client->telephone }}"/>
                                        @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="address">Адрес</label>
                                        <input type="text" id="address" name="address" class="form-control form-control-lg @if($errors->has('any')) is-invalid @endif" value="{{ $client->address }}"/>
                                        @if($errors->has('any'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('any') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-outline mb-4">
                                        <change-gender get_value_main="{{$client->gender}}"></change-gender>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                            Сохранить
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
