@extends('layouts.merge.dashboard')

@section('title', 'Listar Comentário')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')
            <div class="container justify-content-center mt-2 mb-5">
                <div class="flex-grow-1 container-p-y">
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <div class="card-body">
                                <table class="table datatables table-hover table-bordered" id="dataTable-1">
                                    <thead class="bg-primary ">
                                        <tr class="text-center text-ligth">
                                            <th style="color: #fff;">#</th>
                                            <th style="width: 100%; color: #fff;">Nome</th>
                                            <th style="width: 100%; color: #fff;">Apelido</th>
                                            <th style="color: #fff;">Acções</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">

                                        @foreach ($data as $item)
                                        <tr class="text-center text-dark">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->fullname }} </td>
                                            <td>{{ $item->nickname }} </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url("admin/personComment/show/{$item->id}") }}"><i class="bx bx-detail"></i> Detalhe</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection