@section('title', 'Grade Management ')
    @section('content')
<main class="app-content">
    <div class="page-error tile">
      <h1><i class="fa fa-exclamation-circle"></i> Error 404: Page not found</h1>
      <p>The page you have requested is not found.</p>
      <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
    </div>
  </main>

  @endsection
  @section('script')
      @include('backend.partials.js.datatable');
<script>

</script>
@endsection
