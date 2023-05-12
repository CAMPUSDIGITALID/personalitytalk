<footer class="page-footer text-white pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h5>Tentang</h5>
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-between">
                        <ul class="list-unstyled">
                            <li><a class="text-white text-decoration-none" href="{{ route('site.halaman.detail', ['permalink' => 'tentang-kami']) }}">Tentang {{ setting('site.name') }}</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Kontak Kami</a></li>
                            <li><a class="text-white text-decoration-none" href="{{ route('site.karir.index') }}">Karir</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-between">
                        <ul class="list-unstyled">
                            <li><a class="text-white text-decoration-none" href="https://karir.psikologanda.com">Psikolog</a></li>
                            <li><a class="text-white text-decoration-none" href="https://tes.psikologanda.com">Tes Online</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <h5>Lainnya</h5>
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-between">
                        <ul class="list-unstyled">
                            <li><a class="text-white text-decoration-none" href="#">Syarat & Ketentuan</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-between">
                        <ul class="list-unstyled">
                            <li><a class="text-white text-decoration-none" href="#">Bantuan</a></li>
                            <li><a class="text-white text-decoration-none" href="#">Yang Kamu Dapat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <ul class="list-unstyled social-media d-flex justify-content-lg-end">
                    <li class="mx-0 mx-lg-3 me-3"><a class="text-white text-decoration-none" href="#" target="_blank"><i class="bi bi-facebook"></i></a></li>
                    <li class="mx-3"><a class="text-white text-decoration-none" href="#" target="_blank"><i class="bi bi-instagram"></i></a></li>
                    <li class="mx-3"><a class="text-white text-decoration-none" href="#" target="_blank"><i class="bi bi-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="bg-white my-2" style="height:2px"></div>
        <div class="footer-copyright">{{ setting('site.name') }} © {{ date('Y') }}. All rights reserved.</div>
    </div>
</footer>