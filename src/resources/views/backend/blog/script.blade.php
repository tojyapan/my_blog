@section('script')
    <script type="text/javascript">
      $('ul.pagination').addClass('no-margin pagination-sm');

      $('#title').on('blur', function() {
        let theTitle = this.value.toLowerCase().trim();
        let slugInput = $('#slug');
        let theSlug = theTitle.replace(/&/g, '-and-')
                              .replace(/[^ぁ-んァ-ン０-９a-zA-Z0-9\-]+/g, '-')
                              .replace(/\s/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
      });

      var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
      var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

      $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        showClear: true
      });

      $('#draft-btn').click(function(e) {
        e.preventDefault();
        $('#published_at').val("");
        $('#post-form').submit();
      })
    </script>
@endsection