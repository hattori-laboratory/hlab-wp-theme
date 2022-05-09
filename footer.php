        <footer>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" class="wavify_wave">
                <path id="wave_footer" d=""/>
            </svg>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
            <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/85188/jquery.wavify.js"></script>
            <script>
                // Main背景用
                $('#wave_main').wavify({
                    height: 60,
                    bones: 4,
                    amplitude: 40,
                    color: '#82D5FA',
                    speed: .15
                });

                // Footer用
                $('#wave_footer').wavify({
                    height: 60,
                    bones: 4,
                    amplitude: 40,
                    color: '#82D5FA',
                    speed: .15
                });
            </script>
            
            <div class="copyright">
                Copyright © 2022 Hattori-Lab. All Rights Reserved.
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>