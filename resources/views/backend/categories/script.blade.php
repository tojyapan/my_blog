@section('script')
    <script type="text/javascript">
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
    </script>
@endsection