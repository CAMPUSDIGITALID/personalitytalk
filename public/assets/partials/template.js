// navbar
//
$(function () {
    var bar = '';
    bar += '<header>';
        bar += '<nav class="navbar navbar-expand-lg navbar-light py-2 fixed-top bg-white shadow-sm">';
            bar += '<div class="container">';
                bar += '<a class="navbar-brand mb-0" href="https://belajar.psikologanda.com"><img src="https://belajar.psikologanda.com/assets/images/logo/2025-01-07-08-32-29.png" alt="Logo PsikologAnda">'; bar += '</a>';
                bar += '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>';
                bar += '<div class="collapse navbar-collapse" id="navbarResponsive">';
                    bar += '<div class="header-right ms-auto">';
                       bar += '<ul class="navbar-nav align-items-lg-center n-log">';
                            bar += '<li style="margin-left: 15px" class="nav-item">';  bar += '<a class="nav-link" href="https://psikologanda.com/" target="_blank">Beranda</a>'; bar += '</li>';
                            bar += '<li style="margin-left: 15px" class="nav-item">';  bar += '<a class="nav-link" href="https://psikologanda.com/tentang-kami/" target="_blank">Tentang Kami</a>'; bar += '</li>';
                            bar += '<li style="margin-left: 15px" class="nav-item">';  bar += '<a class="nav-link" href="https://psikologanda.com/layanan/" target="_blank">Layanan</a>'; bar += '</li>';
                            bar += '<li style="margin-left: 15px" class="nav-item">';  bar += '<a class="nav-link" href="https://psikologanda.com/psikolog/" target="_blank">Psikolog</a>'; bar += '</li>';
                            bar += '<li style="margin-left: 15px" class="nav-item">';  bar += '<a class="nav-link" href="https://psikologanda.com/#" target="_blank">Artikel</a>'; bar += '</li>';
                            bar += '<li style="margin-left: 15px" class="nav-item">';  bar += '<a class="nav-link" href="https://belajar.psikologanda.com/" target="_blank">Belajar</a>'; bar += '</li>';
                            bar += '<li style="margin-left: 15px" class="nav-item">';  bar += '<a class="nav-link" href="https://karir.psikologanda.com/login" target="_blank">BK/HRD</a>'; bar += '</li>';
                            bar += '<li class="nav-item">';  bar += '<a class="btn btn-primary ms-0 ms-lg-2 px-3 mb-2 mb-lg-0 d-grid" href="https://tes.psikologanda.com/login" target="_blank">Tes&nbsp;Online</a>'; bar += '</li>';
                        bar += '</ul>';
                    bar += '</div>';
                bar += '</div>';
            bar += '</div>';
        bar += '</nav>';
    bar += '</header>';
    bar += '<div style="height: 4.5em;">';
    bar += '</div>';
 
    $("#navbar-main").html(bar);
 
});


//footer
$(function () {
    var bar = '';
    bar += '<footer class="page-footer text-white pt-5 pb-4">';
        bar += '<div class="container">';
            bar += '<div class="row">';
                bar += '<div class="col-lg-4">';
                    bar += '<h5>Tentang</h5>';
                    bar += '<div class="row">';
                        bar += '<div class="col-12 col-md-6 d-flex justify-content-between">';
                            bar += '<ul class="list-unstyled">';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="https://belajar.psikologanda.com/tentang-kami">Tentang PsikologAnda</a>'; bar += '</li>';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="#">Kontak Kami</a>'; bar += '</li>';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="https://belajar.psikologanda.com/karir">Karir</a>'; bar += '</li>';
                            bar += '</ul>';
                        bar += '</div>';
                        bar += '<div class="col-12 col-md-6 d-flex justify-content-between">';
                            bar += '<ul class="list-unstyled">';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="https://karir.psikologanda.com">Psikolog</a>'; bar += '</li>';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="https://tes.psikologanda.com">Tes Online</a>'; bar += '</li>';
                            bar += '</ul>';
                        bar += '</div>';
                    bar += '</div>';
                bar += '</div>';
                bar += '<div class="col-lg-4">';
                    bar += '<h5>Lainnya</h5>';
                    bar += '<div class="row">';
                        bar += '<div class="col-12 col-md-6 d-flex justify-content-between">';
                            bar += '<ul class="list-unstyled">';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="#">Syarat & Ketentuan</a>'; bar += '</li>';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="#">Kebijakan Privasi</a>'; bar += '</li>';
                            bar += '</ul>';
                        bar += '</div>';
                        bar += '<div class="col-12 col-md-6 d-flex justify-content-between">';
                            bar += '<ul class="list-unstyled">';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="#">Bantuan</a>'; bar += '</li>';
                                bar += '<li>'; bar += '<a class="text-white text-decoration-none" href="#">Yang Kamu Dapat</a>'; bar += '</li>';
                            bar += '</ul>';
                        bar += '</div>';
                    bar += '</div>';
                bar += '</div>';
                bar += '<div class="col-lg-4">';
                    bar += '<ul class="list-unstyled social-media d-flex justify-content-lg-end">';
                        bar += '<li class="mx-0 mx-lg-3 me-3">'; bar += '<a class="text-white text-decoration-none" href="#" target="_blank">'; bar += '<i class="bi bi-facebook">'; bar += '</i>'; bar += '</a>'; bar += '</li>';
                        bar += '<li class="mx-3">'; bar += '<a class="text-white text-decoration-none" href="#" target="_blank">'; bar += '<i class="bi bi-instagram">'; bar += '</i>'; bar += '</a>'; bar += '</li>';
                        bar += '<li class="mx-3">'; bar += '<a class="text-white text-decoration-none" href="#" target="_blank">'; bar += '<i class="bi bi-youtube">'; bar += '</i>'; bar += '</a>'; bar += '</li>';
                    bar += '</ul>';
                bar += '</div>';
            bar += '</div>';
            bar += '<div class="bg-white my-2" style="height:2px">'; bar += '</div>';
            bar += '<div class="footer-copyright">PersonalityTalk © 2021. All rights reserved.'; bar += '</div>';
        bar += '</div>';
    bar += '</footer>';
 
    $("#footer-main").html(bar);
 
});


//============================================================================

// Button toggle password
$(document).on("click", ".btn-toggle-password", function(e){
    e.preventDefault();
    if(!$(this).hasClass("show")){
        $(this).parents(".input-group").find("input").attr("type","text");
        $(this).find(".bi").removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
        $(this).addClass("show");
    }
    else{
        $(this).parents(".input-group").find("input").attr("type","password");
        $(this).find(".bi").removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
        $(this).removeClass("show");
    }
});