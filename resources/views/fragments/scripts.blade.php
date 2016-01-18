<script src="//code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{ asset('assets/js/plugins/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/additional-methods.min.js') }}"></script>

<script src="{{ asset('assets/js/warisan.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Warisan.init();
    });

    $(document).on('submit', '#search-form', function(e) {
        e.preventDefault();
        var searchTerm = $('#search-input').val(), url = '{{ baseUrl() }}/products-search/';
        searchTerm = searchTerm.replace(/\s/g, "-");
        window.location = url + searchTerm;
    });

    $(function() {
        var availableTags = {!! json_encode($searchTerms) !!};

        $("#search-input").autocomplete({

            source: availableTags,

            appendTo: '.search__inner',

            select: function(event, ui) {

                searchTerm = ui.item.value;

                searchTerm = searchTerm.replace(/\s/g, "-");

                window.location = '{{ baseUrl() }}/products-search/' + searchTerm;
            }
        });
    });

    $(document).on('click', '.child-category > li > a.expand', function(e) {

        e.preventDefault();

        if($(this).parent('li').hasClass('active')) {

            $(this).parent('li').removeClass('active');

            return false;
        }

        $(this).parent().siblings().removeClass('active');

        $(this).parent('li').addClass('active');
    });
</script>
