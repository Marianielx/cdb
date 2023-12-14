@extends('layouts.merge.dashboard')

@section('title', 'Listar Anúncio Plano')

@section('content')

{{-- Add Modal --}}
<div class="modal fade" id="AddPlanModal" tabindex="-1" aria-labelledby="AddPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddPlanModalLabel">Adicionar Plano</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="form-group mb-3">
                    <label for="">Tipo</label>
                    <input type="text" required class="name form-control">
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Prazo</label>
                            <input type="number" required class="deadline form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <input type="text" required class="description form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="">Estado</label>
                    <input type="text" required class="state form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary add_plan">Salvar</button>
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
                <h5 class="modal-title" id="editModalLabel">Editar & Alterar Plano</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="plan_id" />

                <div class="form-group mb-3">
                    <label for="">Tipo</label>
                    <input type="text" id="name" required class="form-control">
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Prazo</label>
                            <input type="number" id="deadline" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <input type="text" id="description" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="">Estado</label>
                    <input type="text" id="state" required class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary update_plan">Alterar</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Excluir Plano</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Excluir Plano?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary delete_plan">Sim Excluir</button>
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
                                        Plano de Anúncio
                                        <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#AddPlanModal"><i class='bx bxs-plus-circle'></i></button>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table class="table datatables table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:10px">Nº</th>
                                                <th style="width:50px">Tipo</th>
                                                <th style="width:50px">Prazo</th>
                                                <th>Descrição</th>
                                                <th style="width:50px">Estado</th>
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

        fetchplan();
        var count = 1;

        function fetchplan() {
            $.ajax({
                type: "GET",
                url: "/fetch-plans",
                dataType: "json",
                success: function(response) {
                    $('tbody').html("");
                    $.each(response.plans, function(key, item) {
                        $('tbody').append('<tr>\
                            <td>' + count++ + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.deadline + '</td>\
                            <td>' + item.description + '</td>\
                            <td>' + item.state + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Editar</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Excluir</button></td>\
                        \</tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_plan', function(e) {
            e.preventDefault();

            $(this).text('Enviando..');

            var data = {
                'name': $('.name').val(),
                'description': $('.description').val(),
                'deadline': $('.deadline').val(),
                'state': $('.state').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/admin/custom/plan/store",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_plan').text('Salvar');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        fetchplan();
                        $('#AddPlanModal').find('input').val('');
                        $('.add_plan').text('Salvar');
                        $('#AddPlanModal').modal('hide');
                    }
                }
            });

        });

        $(document).on('click', '.editbtn', function(e) {
            e.preventDefault();
            var plan_id = $(this).val();

            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/custom/plan/edit-plan/" + plan_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        $('#name').val(response.plans.name);
                        $('#description').val(response.plans.description);
                        $('#deadline').val(response.plans.deadline);
                        $('#state').val(response.plans.state);
                        $('#plan_id').val(plan_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_plan', function(e) {
            e.preventDefault();

            $(this).text('Alterando..');
            var id = $('#plan_id').val();

            var data = {
                'name': $('#name').val(),
                'description': $('#description').val(),
                'deadline': $('#deadline').val(),
                'state': $('#state').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/admin/custom/plan/update-plan/" + id,
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
                        $('.update_plan').text('Alterar');
                    } else {
                        $('#update_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('.update_plan').text('Alterar');
                        $('#editModal').modal('hide');
                        fetchplan();
                    }
                }
            });
        });

        $(document).on('click', '.deletebtn', function() {
            var plan_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(plan_id);
        });

        $(document).on('click', '.delete_plan', function(e) {
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
                url: "/admin/custom/plan/delete-plan/" + id,
                dataType: "json",
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_plan').text('Sim Excluir');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_plan').text('Sim Excluir');
                        $('#DeleteModal').modal('hide');
                        fetchplan();
                    }
                }
            });
        });
    });
</script>

@endsection