@extends('layouts.app')

@section('content')
    <div class="main-content mt-3 ms-5" style="width: 90%; height: 100%;">
        <h2 class="text-uppercase text-center mb-4 mt-4" style="color: white">Редактирование клиентов и их машин</h2>
        <form action="{{ route("all-client.index") }}" enctype="multipart/form-data" method="get">
            @csrf
            <search-field :get_clients='@json($all_clients)'></search-field>
        </form>
        <div class="row mt-4">
            <div class="rounded-circle col">>
                <table class="table table-dark table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">ФИО</th>
                        <td>Пол</td>
                        <td>Телефон</td>
                        <td>Адрес</td>
                        <td>Редактировать клиента</td>
                        <td>Авто клиента</td>
                    </tr>
                    @if(isset($one_clients))
                        <tr>
                            <th scope="row">{{$one_clients->FCS}}</th>
                            <td>{{ $one_clients->gender }}</td>
                            <td>{{ $one_clients->telephone }}</td>
                            <td>{{ $one_clients->address }}</td>
                            <td><a class="pe-2" href="{{route("client.edit",[$one_clients->id])}}">Редактировать
                                    клиента</a>/
                                <a class="ps-2" href="{{route('client.destroy',[$one_clients->id])}}">Удалить
                                    клиента</a>
                            </td>
                            <td><a class="pe-2" href="{{route("clients-automobile.index",[$one_clients->id])}}">Все авто</a></td>
                        </tr>
                    @else
                    @foreach ($clients as $client)
                        <tr>
                            <th scope="row">{{$client->FCS}}</th>
                            <td>{{ $client->gender }}</td>
                            <td>{{ $client->telephone }}</td>
                            <td>{{ $client->address }}</td>
                            <td><a class="pe-2" href="{{route("client.edit",[$client->id])}}">Редактировать
                                    клиента</a>/
                                <a class="ps-2" href="{{route('client.destroy',[$client->id])}}">Удалить
                                    клиента</a>
                            </td>
                            <td><a class="pe-2" href="{{route("clients-automobile.index",[$client->id])}}">Все авто</a></td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            @if(isset($clients))
            <div class="d-flex justify-content-center mt-3" style="padding-right: 7%;">
                {!! $clients->links('pagination::bootstrap-5') !!}
            </div>
            @endif
        </div>
    </div>
@endsection
