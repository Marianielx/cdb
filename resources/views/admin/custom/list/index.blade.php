@extends('layouts.merge.dashboard')

@section('title', 'Listar Cliente')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('layouts._includes.dashboard.Navbar')
            <!-- / Navbar -->
            <div class="container justify-content-center mt-2 mb-5">
                <div class="flex-grow-1 container-p-y">
                    <!-- Bootstrap Table with Header - Dark -->
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Cliente: ({{ $custom_total }})
                                <a href="{{ route('admin.custom.create') }}" class="btn btn-primary float-end"><i class='bx bxs-plus-circle'></i></i></a>
                            </h4>
                        </div>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <div class="card-body">
                                <table class="table datatables table-hover table-bordered" id="dataTable-1">
                                    <thead class="bg-primary">
                                        <tr class="text-center text-ligth">
                                            <th style="color: #fff;">#</th>
                                            <th style="color: #fff; width: 50px;">NIF</th>
                                            <th style="color: #fff;">Nome Completo</th>
                                            <th style="color: #fff;">Sigla</th>
                                            <th style="color: #fff; width:50px;">Agenda</th>
                                            <th style="color: #fff; width:50px;">Banner</th>
                                            <th style="color: #fff; width:50px;">Opções</th>
                                            <?php $count = 1 ?>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">

                                        @foreach ($data as $item)
                                        <tr class="text-center text-dark">
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $item->identitynumber }} </td>
                                            <td>{{ $item->fullname }} </td>
                                            <td>{{ $item->nickname }} </td>
                                            <td>
                                                <a href="{{ url("admin/custom/contact/{$item->id}") }}"><i class="bx bxs-contact" data-toggle="tooltip" data-placement="top" title="Agende aqui..."></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ url("admin/custom/banner/show/{$item->id}") }}"><i class='bx bx-slideshow' data-toggle="tooltip" data-placement="top" title="Anuncie aqui..."></i></a>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url("admin/custom/show/{$item->id}") }}"><i class="bx bx-detail"></i> Detalhe</a>
                                                        <a class="dropdown-item" href="{{ url("admin/custom/edit/{$item->id}") }}"><i class="bx bx-edit-alt me-1"></i> Editar</a>
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