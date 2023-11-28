@extends('layouts.app')

@section('content')
<section class="bg-image mt-3 mb-3"
         style="background-color: rgb(32,33,36);">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px; background-color: rgb(13,17,23); color: white">
                        <div class="card-body p-5">
                            <form action="{{route("automobile.store")}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <h2 class="text-uppercase text-center mb-5">Машина клиента</h2>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="brand">Марка</label>
                                    <input type="text" id="brand" name="brand" class="form-control form-control-lg @if($errors->has('any')) is-invalid @endif"/>
                                    @error('any')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="model">Модель</label>
                                    <input type="text" id="model" name="model" class="form-control form-control-lg @if($errors->has('any')) is-invalid @endif"/>
                                    @error('any')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="color">Цвет кузова</label>
                                    <input type="text" id="color" name="color" class="form-control form-control-lg @if($errors->has('any')) is-invalid @endif"/>
                                    @error('any')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="number_rf">Гос Номер РФ</label>
                                    <input type="text" id="number_rf" name="number_rf" class="form-control form-control-lg @error('number_rf') is-invalid @enderror"/>
                                    @error('number_rf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <choice-client :get_data='@json($client)'></choice-client>
                                </div>
                                <div class="form-outline mb-4">
                                    <my-checkbox></my-checkbox>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                        Создать
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
