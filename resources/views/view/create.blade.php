@extends('layouts.master')

@section('content')

<!-- Error Message -->
@if (count($errors)>0)
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
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
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                            data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
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
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="textarea" placeholder="Enter Description" id="description"
                                        name="description"
                                        style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <!-- End Description -->
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
@endsection

@push('addScript')
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
        //Custom File Input
        $(document).ready(function () {
            bsCustomFileInput.init();
        })
    });

</script>
@endpush
