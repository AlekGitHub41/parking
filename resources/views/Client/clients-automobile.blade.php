@extends('layouts.app')

@section('content')
    <div class="main-content mt-3 ms-5" style="width: 90%; height: 100%;">
        <div class="row">
            <div class="rounded-circle col ps-5">
                @if($automobiles->count()>0)
                <h2 class="text-uppercase text-center mb-4 mt-3" style="color: white">Автомобили клиента {{ $automobiles[0]->FCS }}</h2>
                <table class="table table-dark table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">Марка</th>
                        <td>Модель</td>
                        <td>Цвет кузова</td>
                        <td>Гос Номер РФ</td>
                        <td>Статус авто</td>
                        <td>Редактировать</td>
                    </tr>
                    @foreach ($automobiles as $automobile)
                        <tr>
                            <th scope="row">{{$automobile->brand}}</th>
                            <td>{{ $automobile->model }}</td>
                            <td>{{ $automobile->color }}</td>
                            <td>{{$automobile->number_rf}}</td>
                            <td>{{ $automobile->is_active==1 ? 'Находится на стоянке': "Отсутствует на стоянке"}}</td>
                            <td>
                                <a  href="{{route("automobile.edit",[$automobile->id])}}" class="pe-2">Редактировать</a>/
                                <a
                                    class="ps-2"
                                    href="{{route("automobile-note.destroy",[$automobile->id])}}">Удалить
                                    запись авто</a></td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <h2 class="text-uppercase text-center mb-4 mt-3" style="color: white">Автомобили отсутствуют</h2>
                @endif
            </div>
        </div>
    </div>
    {{--<div class="d-flex justify-content-center">--}}
    {{--    {!! $post->links('pagination::bootstrap-4') !!}--}}
    {{--</div>--}}
@endsection
