{{-- Iklan --}}
    <img src="assets/iklan/iklanbawah1.png" alt="" style="width: 1000%">
<!-- Footer
============================================= -->
<footer id="footer" class="dark bg-blue-visit">

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
        <div class="container">
            <p class="text-center">
                <b class="h3">{{ getOption('slogan') }}</b>
                <br>
                with <span class='text-warning'>visitcirebon.id</span>
                <br>
                <a href="{{ getOption('fb_link') }}" target="_blank" class="h5">
                    <i class='uil-facebook-f'></i>
                </a>
                <a href="{{ getOption('ig_link') }}" target="_blank" class="h5">
                    <i class='uil-instagram'></i>
                </a>
                <a href="{{ getOption('tiktok_link') }}" target="_blank" class="h5">
                    <i class='fa-brands fa-tiktok'></i>
                </a>
                <a href="{{ getOption('youtube_link') }}" target="_blank" class="h5">
                    <i class='uil-youtube'></i>
                </a>
                <br><br>
                <?php
                if(date("Y") > config("app.year_made")){
                    $footer_year = config("app.year_made");
                }else{
                    $footer_year = config("app.year_made")." - ".date("Y");
                }
                ?>
                <b class="text-warning">Copyright &copy; {{ config("app.year_made") }}</b>
            </p>
        </div>
    </div><!-- #copyrights end -->
</footer><!-- #footer end -->
