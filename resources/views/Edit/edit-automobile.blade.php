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
                                <h2 class="text-uppercase text-center mb-5">{{$automobile->brand}} {{$automobile->model}}</h2>
                                <form action="{{route("automobile.edit",[$automobile->id])}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="brand">Марка</label>
                                        <input type="text" id="brand" name="brand"
                                               class="form-control form-control-lg @if($errors->has('any')) is-invalid @endif"
                                               value="{{$automobile->brand}}"/>
                                        @error('any')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="model">Модель</label>
                                        <input type="text" id="model" name="model"
                                               class="form-control form-control-lg @if($errors->has('any')) is-invalid @endif"
                                               value="{{$automobile->model}}"/>
                                        @error('any')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="color">Цвет кузова</label>
                                        <input type="text" id="color" name="color"
                                               class="form-control form-control-lg @if($errors->has('any')) is-invalid @endif"
                                               value="{{$automobile->color}}"/>
                                        @error('any')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="number_rf">Гос Номер РФ</label>
                                        <input type="text" id="number_rf" name="number_rf"
                                               class="form-control form-control-lg @error('number_rf') is-invalid @enderror"
                                               value="{{$automobile->number_rf}}"/>
                                        @error('number_rf')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <my-checkbox get_my_value="{{$automobile->is_active}}"></my-checkbox>
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
