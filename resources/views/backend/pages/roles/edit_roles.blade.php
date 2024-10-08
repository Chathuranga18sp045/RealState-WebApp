@extends('admin.admin_dashboard')

@section('admin')
<!-- JavaScript Link CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="row profile-body">
  
  <!-- middle wrapper start -->
  <div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
           <div class="card">
              <div class="card-body">

								<h6 class="card-title">Add Permission</h6>

                            <form id="myForm" method="POST" action="{{route('update.roles')}}" class="forms-sample">
                             @csrf
                                <input type="hidden" name="id" value="{{ $roles->id }}">
                                <div class="mb-3 form-group">
                                   <label for="exampleInputEmail" class="from-label">Roles Name</label>
                                   <input type="text" name="name" class="form-control " value="{{ $roles->name}}">
                                                
                                </div>
                                
								<button type="submit" class="btn btn-primary me-2">Save Changes</button>

                            </form>

              </div>
        </div>
    </div>
  </div>
</div>

@endsection