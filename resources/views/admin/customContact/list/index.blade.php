@extends('layouts.merge.dashboard')

@section('title', 'Listar Cliente Agenda')

@section('content')

{{-- Add Modal --}}
<div class="modal fade" id="AddContactModal" tabindex="-1" aria-labelledby="AddContactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddContactModalLabel">Adicionar Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <input type="hidden" required class="fk_customId form-control" value="{{ $custom->id }}">
                <div class="form-group mb-3">
                    <label for="">Nome Responsávél</label>
                    <input type="text" required class="charge form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Telefone No</label>
                    <input type="text" required class="phone form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">E-mail</label>
                    <input type="text" required class="email form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary add_contact">Salvar</button>
            </div>
        </div>
    </div>
</div>
{{-- Edn- Add Modal --}}

{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar & Alterar Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="contact_id" />

                <div class="form-group mb-3">
                    <label for="">Nome Responsávél</label>
                    <input type="text" id="charge" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Telefone No</label>
                    <input type="text" id="phone" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">E-mail</label>
                    <input type="text" id="email" required class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary update_contact">Alterar</button>
            </div>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}

{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Excluir Registo?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary delete_contact">Sim Excluir</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')
            <div class="container justify-content-center mt-2 mb-5">
                <div class="flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="success_message"></div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Agenda Cliente: {{ $custom->fullname }}
                                        <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#AddContactModal"><i class='bx bxs-plus-circle'></i></button>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table class="table datatables table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:10px">Nº</th>
                                                <th>Responsavél</th>
                                                <th>E-mail</th>
                                                <th style="width:50px">Editar</th>
                                                <th style="width:50px">Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        fetchcontact();
       var count = 1;
        function fetchcontact() {
            $.ajax({
                type: "GET",
                url: "/fetch-contacts/" + $('.fk_customId').val(),
                dataType: "json",
                success: function(response) {
                    $('tbody').html("");
                    $.each(response.contacts, function(key, item) {
                        $('tbody').append('<tr>\
                            <td>' + count++ + '</td>\
                            <td>' + item.charge + '</td>\
                            <td>' + item.email + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Editar</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Excluir</button></td>\
                        \</tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_contact', function(e) {
            e.preventDefault();

            $(this).text('Enviando..');

            var data = {
                'charge': $('.charge').val(),
                'email': $('.email').val(),
                'phone': $('.phone').val(),
                'fk_customId': $('.fk_customId').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/admin/custom/contact/store",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_contact').text('Salvar');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        fetchcontact();
                        $('#AddContactModal').find('input').val('');
                        $('.add_contact').text('Salvar');
                        $('#AddContactModal').modal('hide');
                    }
                }
            });

        });

        $(document).on('click', '.editbtn', function(e) {
            e.preventDefault();
            var contact_id = $(this).val();

            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/custom/contacts/edit-contact/" + contact_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        $('#charge').val(response.contacts.charge);
                        $('#email').val(response.contacts.email);
                        $('#phone').val(response.contacts.phone);
                        $('#contact_id').val(contact_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_contact', function(e) {
            e.preventDefault();

            $(this).text('Alterando..');
            var id = $('#contact_id').val();

            var data = {
                'charge': $('#charge').val(),
                'email': $('#email').val(),
                'phone': $('#phone').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/admin/custom/contacts/update-contacts/" + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_contact').text('Alterar');
                    } else {
                        $('#update_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('.update_contact').text('Alterar');
                        $('#editModal').modal('hide');
                        fetchcontact();
                    }
                }
            });
        });

        $(document).on('click', '.deletebtn', function() {
            var contact_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(contact_id);
        });

        $(document).on('click', '.delete_contact', function(e) {
            e.preventDefault();

            $(this).text('Excluindo..');
            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/admin/custom/contacts/delete-contacts/" + id,
                dataType: "json",
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_contact').text('Sim Excluir');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_contact').text('Sim Excluir');
                        $('#DeleteModal').modal('hide');
                        fetchcontact();
                    }
                }
            });
        });
    });
</script>

@endsection