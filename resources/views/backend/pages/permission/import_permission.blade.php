@extends('admin.admin_dashboard')

@section('admin')
<!-- JavaScript Link CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    
    <nav class="page-breadcrumb">
            <ol class="breadcrumb">
            <a href="{{route('add.permission')}}" class="btn btn-inverse-danger"> Download Xlsx </a>

            </ol>
    </nav>
    <div class="row profile-body">
    
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Import Permission</h6>

                        <form id="myForm" method="POST" action="{{route('store.permission')}}" class="forms-sample">
                            @csrf
                                        
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail" class="from-label">Xlsx Impoert</label>
                                <input type="file" name="import_file" class="form-control ">
                            </div>
                            <button type="submit" class="btn btn-inverse-warning">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection