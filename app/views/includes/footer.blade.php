<div class="footer">
    <div class="well well-sm">
        {{-- <div class="pull-left">
             <ul class="nav nav-pills">
                 <li><a href="addClassified.html"><span class="glyphicon glyphicon-plus"></span> Add classified</a></li>
             </ul>
         </div>--}}
        <div class="pull-right">
            <ul class="nav nav-pills">
                <li><a href="help.html">Help</a></li>
                {{-- <li><a href="contact.html">Contact</a></li>--}}
                <li><a href="conditions.html">Rules & conditions</a></li>
            </ul>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <div class="pull-right">
        <p class="text-muted"><small>Copyright &copy; 2015, <a href="http://wivert.co.uk/" target="_blank">WiVert limited</a> - All Rights Reserved.</small></p>
    </div>
</div>
</div>
<!-- JS -->

<script src="/js/bootstrap.min.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/jquery.slides.min.js"></script>
<script src="/js/custom.js"></script>
@yield('scripts')
<script>
    $( document ).ready(function() {
        // Drop down menu handler
        $('.dropdown-menu').find('form').click(function (e) {
            e.stopPropagation();
        });
    });
</script>
<!-- /JS -->
</body>
</html>