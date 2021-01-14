@extends('layouts.master')

@section('content')

<!-- Error Message -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Sorry !</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Input Your
                        <small>Description</small>
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" </button> </div>
                            <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <form action=" {{route('view.index')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pad">
                            <div class="mb-3">
                                <div class="card-body">
                                    <!-- Title -->
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter title">
                                    </div>
                                    <!-- End Title -->
                                    <!-- File -->
                                    <div class="form-group">
                                        <label for="image">File</label>
                                        <input type="file" name="image[]" class="form-control" accept="image/*"
                                            multiple>
                                    </div>
                                    <!-- End File -->
                                </div>
                            </div>
                        </div>
                        <!-- Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </div>
                        <!-- End Submit -->
                    </form>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
</section>

@push('addScript')
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });
    });
</script>
@endpush
@endsection
