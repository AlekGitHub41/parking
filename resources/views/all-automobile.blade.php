@extends('layouts.app')

@section('content')
    <div class="main-content mt-3 ms-5" style="width: 90%; height: 100%;">
        <div class="row">
            <div class="col-3 border-end pe-5 mt-lg-4" style="height: 100vh;">
                <form action="{{route("all-automobile.index")}}" enctype="multipart/form-data" method="get">
                        <client-automobile></client-automobile>
                </form>
            </div>
            <div class="rounded-circle col-9 ps-5 mt-3" style="color: white;">
                <h2 class="text-uppercase text-center mb-5">Автомобили на стоянке</h2>
                <table class="table table-dark table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">Марка</th>
                        <td>Модель</td>
                        <td>Цвет кузова</td>
                        <td>Гос Номер РФ</td>
                        <td>Статус авто</td>
                        <td>Редактировать</td>
                        <td>Удалить</td>
                    </tr>
                    @if(is_iterable($automobiles))
                    @foreach ($automobiles as $automobile)
                        <tr>
                            <th scope="row">{{$automobile->brand}}</th>
                            <td>{{ $automobile->model }}</td>
                            <td>{{ $automobile->color }}</td>
                            <td>{{$automobile->number_rf}}</td>
                            <td>{{ $automobile->is_active==1 ? 'Находится на стоянке': "Отсутствует на стоянке"}}</td>
                            <td><a href="{{route("automobile.edit",[$automobile->id])}}">Редактировать</a></td>
                            <td><a href="{{route("automobile-note.destroy",[$automobile->id])}}">Удалить</a></td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <th scope="row">{{$automobiles->brand}}</th>
                            <td>{{ $automobiles->model }}</td>
                            <td>{{ $automobiles->color }}</td>
                            <td>{{$automobiles->number_rf}}</td>
                            <td>{{ $automobiles->is_active==1 ? 'Находится на стоянке': "Отсутствует на стоянке"}}</td>
                            <td><a href="{{route("automobile.edit",[$automobiles->id])}}">Редактировать</a></td>
                            <td><a href="{{route("automobile-note.destroy",[$automobiles->id])}}">Удалить</a></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                @if(is_iterable($automobiles))
                    <div class="d-flex justify-content-center mt-5">
                        {!! $automobiles->links('pagination::bootstrap-5') !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
