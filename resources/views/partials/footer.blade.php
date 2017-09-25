<footer class="content-info">
    <div id="footsies">
        <div id="top-foot" class="clearfix container-fluid">
            <div id="widget-footer" class="clearfix row-fluid">
                @php(dynamic_sidebar('footer-1'))
                    @php(dynamic_sidebar('footer-2'))
                        @php(dynamic_sidebar('footer-3'))
            </div>
        </div>
        <div id="bottom-foot">
            <div class="clearfix container-fluid">
                <p class="copyright pull-left">
                    <a class="pull-left" rel="license" href="https://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a>
                    <small> Except where otherwise noted, content on this site is licensed under a <a rel="license" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</small>
                </p>
                <img class="pull-right" width="131px" height="49px" src="@asset('images/bccampus-logo-sm.png')">
                <div class="footer-links clearfix">
                    @php(dynamic_sidebar('footer_links'))
                </div>
            </div>
        </div>
        <p class="attribution muted">&copy; {{bloginfo('name')}} {{date('Y')}}</p>
    </div>
</footer>
