<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-12">
                <!-- <a href="{{ route('site.home') }}" class="logo d-flex align-items-center">
                    <img src="/site/img/mono-logo.svg" alt="logo" class=" ank" height="45">
                </a> -->
                <p>Portal Central da Banda</p>
                <div class="social-links d-flex mt-4">
                    <a target="_blank" href="https://www.facebook.com/HCKMariano" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/in/mariano-vunge-24033a23b/" class="linkedin "><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <h4>EXTRA</h4>
            </div>
            <div class="col-lg-3 col-md-4 col-6 footer-links">
                <h4>Informações</h4>
            </div>

            <div class="col-lg-3 col-md-4 footer-contact text-center text-md-start">
                <h4>Links Úteis</h4>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="copyright">
            <strong>Portal Central Da Banda</strong> - {{ date('Y') }} &copy; Todos Direitos Reservados <br>
            <a href="{{ route('site.terms') }}" target="_blank" class="text-white-50 ank">Politícas de Privacidade &
                Termos de Uso</a>
        </div>
    </div>

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div class="preloader-wrapper">
    <div class="preloader-wrapper">
        <div class="spinner-grow circle-infosi"></div>
    </div>
</div>
<!-- Vendor JS Files -->
<script src="/site/js/googleapis.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
<script src="/site/js/jquery-3.6.0.min.js"></script>
<script src="/site/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/site/vendor/aos/aos.js"></script>
<script src="/site/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/site/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/site/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/site/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/site/vendor/php-email-form/validate.js"></script>
<script src="/js/sweetalert2.all.min.js"></script>

@yield('scriptsupdate')

<!-- Template Main JS File -->
<script src="/site/js/main.js"></script>

@yield('scripts')

@if (session('helpCreate'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Mensagem enviada com sucesso!',
        text: 'Obrigado por nos contactar!',
        showConfirmButton: true
    })
</script>
@elseif (session('create'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registrado com sucesso!',
        text: '',
        showConfirmButton: true
    })
</script>
@elseif (session('create_image'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registrado com sucesso!',
        text: 'Imagens anexadas',
        showConfirmButton: true
    })
</script>
@elseif (session('edit'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Editado com successo!',
        text: '',
        showConfirmButton: true
    })
</script>
@elseif (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Atenção',
        text: 'Tente novamente ou contacte a área de suporte',
        showConfirmButton: true
    })
</script>
@elseif (session('search'))
<script>
    Swal.fire({
        icon: 'error',
        title: '',
        text: 'Pesquisa Inválida',
        showConfirmButton: true
    })
</script>
@endif

@yield('JS')
<script src="/js/4.1.1.bootstrap.min.js"></script>
<script src="/js/2.1.0.sweetalert.min.js"></script>