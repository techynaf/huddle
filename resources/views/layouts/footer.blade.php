<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                Copyright 2018 @ <a href="https://techynaf.com/" class="copyright-color" target="_blank">Techynaf</a>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if(typeof(Storage) !== 'undefined') {
        // See if there is a scroll pos and go there.
        var lastYPos = +localStorage.getItem('scrollYPos');
        if (lastYPos) {
            console.log('Setting scroll pos to:', lastYPos);
            window.scrollTo(0, lastYPos);
        }

        // On navigating away first save the position.
        var anchors = document.querySelectorAll('article a');

        var onNavClick = function() {
            console.log('Saving scroll pos to:', window.scrollY);
            localStorage.setItem('scrollYPos', window.scrollY);
        };

        for (var i = 0; i < anchors.length; i++) {
            anchors[i].addEventListener('click', onNavClick);
        }
    }
});
</script>

@include('layouts.scripts')