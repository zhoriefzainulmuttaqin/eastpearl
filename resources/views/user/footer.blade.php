<!-- Footer
============================================= -->
<footer id="footer" class="dark " style="background-color: #ba1918">

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
        <div class="container">
            <p class="text-center">
                <b class="h3">Preferred Partner For Travel</b>
                <br>
                with <span class='text-white'>eastpearl.id</span>
                <br>
                <a href="https://www.facebook.com/profile.php?id=61558959234440" target="_blank" class="h5"
                    aria-label="facebook">
                    <i class='uil-facebook-f'></i>
                </a>
                <a href="https://www.instagram.com/eastpearl.id/" target="_blank" class="h5" aria-label="instagram">
                    <i class='uil-instagram'></i>
                </a>
                <a href="https://www.tiktok.com/@east.pearl" target="_blank" class="h5" aria-label="tiktok">
                    <i class='fa-brands fa-tiktok'></i>
                </a>
                <a href="https://www.youtube.com/channel/UCCkb7FZj67-WU3JBBok3v6w" target="_blank" class="h5"
                    aria-label="youtube">
                    <i class='uil-youtube'></i>
                </a>
                <br><br>
                <?php
                if (date('Y') > config('app.year_made')) {
                    $footer_year = config('app.year_made');
                } else {
                    $footer_year = config('app.year_made') . ' - ' . date('Y');
                }
                ?>
                <b class="text-white">Copyright &copy; {{ config('app.year_made') }}</b>
            </p>
        </div>
    </div><!-- #copyrights end -->
</footer><!-- #footer end -->
