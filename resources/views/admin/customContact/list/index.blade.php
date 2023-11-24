@extends('layouts.merge.dashboard')

@section('title', 'Listar Contacto do Cliente')

@section('content')

<!-- Contact Modal -->

<div class="modal fade" id="AddContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="form-group mb-3">
                    <label for="name">Nome</label>
                    <input type="text" class="custom_charge form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Telefone</label>
                    <input type="text" class="custom_phone form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Email</label>
                    <input type="text" class="custom_gmail form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Facebook</label>
                    <input type="text" class="custom_facebook form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Instragram</label>
                    <input type="text" class="custom_instagram form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Linkedin</label>
                    <input type="text" class="custom_linkedin form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary add_contact">Salvar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Modal -->

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
                    <div id="success_message"></div>
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>Cliente: {{ $custom->fullname }}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddContactModal" class="btn btn-primary float-end btn-sm">Add Contacto</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table datatables table-hover table-bordered" id="dataTable-1">
                                    <thead class="bg-primary ">
                                        <tr class="text-center text-ligth">
                                            <th style="color: #fff;">#</th>
                                            <th style="color: #fff;">Nome Responsável</th>
                                            <th style="color: #fff;">Contacto</th>
                                            <th style="color: #fff;">Email</th>
                                            <th style="color: #fff;">Facebook</th>
                                            <th style="color: #fff;">Instragram</th>
                                            <th style="color: #fff;">Linkedin</th>
                                            <th style="color: #fff;">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($data as $item)
                                        <tr class="text-center text-dark">
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->custom_charge }}</td>
                                            <td>{{ $data->custom_gmail }}</td>
                                            <td>{{ $data->custom_phone }}</td>
                                            <td>{{ $data->custom_facebook }}</td>
                                            <td>{{ $data->custom_instagram }}</td>
                                            <td>{{ $data->custom_linkedin }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><i class="bx bx-detail"></i> Detalhe</a>
                                                        <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Editar</a>
                                                        <a class="dropdown-item" href="#"><i class="bx bxs-contact"></i> Contacto</a>
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

@section('scripts')

<script>

    $(document).ready(function() {

        $(document).on('click', '.add_contact', function(e) {

            e.preventDefault();

            var data = {
                'custom_charge': $('.custom_charge').val(),
                'custom_gmail': $('.custom_gmail').val(),
                'custom_phone': $('.custom_phone').val(),
                'custom_facebook': $('.custom_facebook').val(),
                'custom_instagram': $('.custom_instagram').val(),
                'custom_linkedin': $('.custom_linkedin').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/contacts",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    // if (response.status == 400) {
                    //     $('#save_msgList').html("");
                    //     $('#save_msgList').addClass('alert alert-danger');
                    //     $.each(response.errors, function(key, err_value) {
                    //         $('#save_msgList').append('<li>' + err_value + '</li>');
                    //     });
                    //     $('.add_contact').text('Salvar');
                    // } else {
                    //     $('#save_msgList').html("");
                    //     $('#success_message').addClass('alert alert-success');
                    //     $('#success_message').text(response.message);
                    //     $('#AddContactModal').find('input').val('');
                    //     $('.add_contact').text('Salvar');
                    //     $('#AddContactModal').modal('hide');
                    //     //fetchstudent();
                    // }
                }
            });
        });
    });

</script>

@endsection