@extends('layouts.master')

@if (count($errors)>0)
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
@endif

@if (Session::has('success'))
{{ Session('success') }}
@endif

@section('content')
<div class="col-12 col-md-6 col-lg-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Simple Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href=" {{route('view.create')}} " class="btn btn-primary m-md-3">Create New</a>
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($pdfs as $key => $pdf)
                        <tr>
                            <td> {{$key + 1}} </td>
                            <td> {{$pdf->title}} </td>
                            <td>
                                <form action="{{route('view.destroy', $pdf->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href=" {{route('view.show', $pdf->id)}} " class="btn btn-primary"
                                        target="_blank">View</a>
                                    <a href=" {{ route('exportpdf', $pdf->id) }} " class="btn btn-secondary"
                                        target="_blank">Export
                                        Pdf</a>
                                    <button type="submit" class="btn btn-danger">Move to Trash</button>
                                </form>
                            </td>
                            @empty
                            <td colspan="6" align="center"><b>No List</b></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
