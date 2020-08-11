@extends('layout');

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <th scope="row">{{ $service->id }}</th>
                        <td> {{ $service->client }} </td>
                        <td> {{ $service->salesman }} </td>
                        <td> {{ $service->description }} </td>
                        <td> {{ $service->value }} </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- {{ $services }} --}}
    </div>
@endsection
