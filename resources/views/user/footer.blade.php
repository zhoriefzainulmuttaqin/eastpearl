<!-- Footer
============================================= -->
<footer id="footer" class="dark bg-blue-visit">

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
        <div class="container">
            <p class="text-center">
                <b class="h3">Preferred Partner For Travels</b>
                <br>
                with <span class='text-warning'>eastpearl.id</span>
                <br>
                <a href="{{ getOption('fb_link') }}" target="_blank" class="h5">
                    <i class='uil-facebook-f'></i>
                </a>
                <a href="https://www.instagram.com/visitcirebon.id?igshid=ODA1NTc5OTg5Nw==" target="_blank"
                    class="h5">
                    <i class='uil-instagram'></i>
                </a>
                <a href="https://www.tiktok.com/@visit.cirebon.id?_t=8iKVr2u4Z6e&_r=1" target="_blank" class="h5">
                    <i class='fa-brands fa-tiktok'></i>
                </a>
                <a href="https://youtube.com/@VisitCirebonId?si=AS4mL5Y_ehCoyXBE" target="_blank" class="h5">
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
                <b class="text-warning">Copyright &copy; {{ config('app.year_made') }}</b>
            </p>
        </div>
    </div><!-- #copyrights end -->
</footer><!-- #footer end -->
