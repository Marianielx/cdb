<!-- Footer -->
<footer class="content-footer footer bg-footer-theme  text-center">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="container mt-4">
            <div class="copyright">
                <strong>MVIT SOLS</strong> - {{date('Y')}} &copy; Todos Direitos Reservados | <a href="{{ route('site.terms') }}" target="_blank" class="text-dark-50 ank">Politícas de Privacidade & Termos de Uso</a>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->

@if (session('create'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Cadastrado com sucesso!',
        showConfirmButton: true
    })
</script>
@elseif(session('destroy'))
<script>
    Swal.fire({
        icon: 'info',
        title: 'Eliminado com sucesso!',
        showConfirmButton: true
    })
</script>
@elseif(session('update'))
<script>
    Swal.fire({
        icon: 'info',
        title: 'Atulização realizada com sucesso!',
        showConfirmButton: true
    })
</script>
@elseif(session('edit'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Alterações foram salvas com sucesso!',
        showConfirmButton: true
    })
</script>
@elseif(session('create_image'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Imagens foram salvas com sucesso!',
        showConfirmButton: true
    })
</script>
@elseif(session('NoAuth'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Não tem autorização para visualizar esta página!',
        showConfirmButton: false,
        timer: 2500
    })
</script>
@elseif(session('exists'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Registo Já Existe!',
        showConfirmButton: true
    })
    @elseif(session('exists')) <
        script >
        Swal.fire({
            icon: 'error',
            title: 'Registo Já Existe!',
            showConfirmButton: true
        })
</script>
@elseif(session('catch'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Erro:1364 - Suporte Técnico',
        showConfirmButton: false,
        timer: 2500
    })
</script>
@elseif(session('confirm'))
<script>
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
        }
    })
</script>
@endif

@if (session('create'))
<script>
    Toastify({
        text: 'Salvo com sucesso!',
        duration: 5000,
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)"
        }
    }).showToast();
</script>
@elseif (session('edit'))
<script>
    Toastify({
        text: 'Editado com sucesso!',
        duration: 5000,
        style: {
            background: "linear-gradient(45deg, red, blue)"
        }
    }).showToast();
</script>
@elseif (session('destroy'))
<script>
    Toastify({
        info: 'Excluido com sucesso!',
        duration: 5000,
        style: {
            background: "linear-gradient(45deg, red, blue)"
        }
    }).showToast();
</script>
@elseif (session('exist_email'))
<script>
    Toastify({
        text: 'E-mail já existente!',
        duration: 5000,
        style: {
            background: "linear-gradient(45deg, red, blue)"
        }
    }).showToast();
</script>
@elseif (session('exist_nif'))
<script>
    Toastify({
        text: 'NIF já existente!',
        duration: 5000,
        style: {
            background: "linear-gradient(45deg, red, blue)"
        }
    }).showToast();
</script>
@elseif (session('exists'))
<script>
    Toastify({
        text: 'Informação já existente!',
        duration: 5000,
        style: {
            background: "linear-gradient(45deg, red, blue)"
        }
    }).showToast();
</script>
@endif

<script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
<script src="/js/sweetalert2.all.min.js"></script>
<script src="{{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>
<script src="{{ asset('dashboard/js/buttons.js') }}"></script>
<script src='/dashboard/js/jquery.dataTables.min.js'></script>
<script src='/dashboard/js/dataTables.bootstrap4.min.js'></script>
<script type="text/javascript" src="{{ asset('dashboard/assets/toastr/js/toastify.js') }}"></script>
<script src="/js/jquery-3.6.0.min.js"></script>
@yield('scripts')
<script src='/dashboard/js/jquery.dataTables.min.js'></script>
<script src='/dashboard/js/dataTables.bootstrap4.min.js'></script>
<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [8, 16, 32, -1],
            [8, 16, 32, "All"]
        ],
        "order": [
            [0, 'desc']
        ]
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            language: {
                url: "/dashboard/cdn/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>