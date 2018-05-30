    <footer class="footer">
        <hr>
        <div class="container">
            <p>© 2017 - {!! date('Y') !!} by PHP-User.</p>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script>
        $(function(){
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>

    <script src="/js/jquery-filestyle.min.js"></script>
    <script src="/js/app-script.js"></script>
</body>
</html>
