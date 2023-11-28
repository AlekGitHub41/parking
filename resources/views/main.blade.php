@extends('layouts.app')

@section('content')
    <div class="mt-3 ms-5" style="width: 90%; height: 100%;">
        <h2 class="text-uppercase text-center mb-4 mt-4" style="color: white">Клиенты и их машины</h2>
        <div class="row">
            <div class="rounded-circle col ps-5">
                <table class="table table-dark table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">ФИО</th>
                        <td>Авто</td>
                        <td>Номер</td>
                        <td>Редактировать</td>
                        <td>Удалить</td>
                    </tr>
                    @foreach ($clients as $client)
                        <tr>
                            <th scope="row">{{$client->FCS}}</th>
                            @if($client->automobile_id)
                                <td>{{ $client->brand }} {{ $client->model }}</td>
                                <td>{{ $client->number_rf }}</td>
                                <td><a class="pe-2" href="{{route("client.edit",[$client->client_id])}}">Редактировать
                                        клиента</a>/<a
                                        class="ps-2" href="{{route("automobile.edit",[$client->automobile_id])}}">Редактировать
                                        авто клиента</a></td>
                                <td><a class="pe-2" href="{{route('client.destroy',[$client->client_id])}}">Удалить
                                        клиента</a>/<a
                                        class="ps-2"
                                        href="{{route("automobile-note.destroy",[$client->automobile_id])}}">Удалить
                                        запись авто</a></td>
                            @else
                                <td>Данные отсутствуют</td>
                                <td>Данные отсутствуют</td>
                                <td><a class="pe-2" href="{{route("client.edit",[$client->client_id])}}">Редактировать
                                        клиента</a>/<span class="ps-2">Данные отсутствуют</span></td>
                                <td><a class="pe-2" href="{{route('client.destroy',[$client->client_id])}}">Удалить
                                        клиента</a>/<span class="ps-2">Данные отсутствуют</span></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3" style="padding-right: 7%;">
                {!! $clients->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
