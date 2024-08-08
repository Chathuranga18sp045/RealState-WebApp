@extends('admin.admin_dashboard')

@section('admin')
<!-- JavaScript Link CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- form latter make capital -->
<style type="text/css">
    .form-check-label{
        text-transform: capitalize;
    }
</style>

<div class="page-content">
    <div class="row profile-body">
  
  <!-- middle wrapper start -->
  <div class="col-md-8 col-xl-8 middle-wrapper ">
    <div class="row">
           <div class="card">
              <div class="card-body">

								<h6 class="card-title">Add Roles in Permission</h6>

								<form id="myForm" method="POST" action="{{route('role.permission.store')}}" class="forms-sample">
                                      @csrf
							       
									<div class="mb-3 form-group">
                                        <label for="exampleInputEmail" class="from-label">Roles Name</label>
										<select name="role_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Group</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                       
								    </div>
                                    <div class="mb-2 form-check">
                                        <input type="checkbox" class="form-check-input" id="checkDefaultmain">
										<label class="form-check-label" for="checkDefaultmain"> Permission All </label>
									</div>

                            <hr>
                            @foreach($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-2 form-check">
                                            <input type="checkbox" class="form-check-input group-checkbox" id="groupCheck{{ $loop->index }}">
                                            <label class="form-check-label" for="groupCheck{{ $loop->index }}"> {{ $group->group_name }} </label>
                                        </div>                          
                                    </div>

                                    <div class="col-9">
                                        @php 
                                        $permissions = App\Models\User::getPermissionByGroup($group->group_name);
                                        @endphp

                                        @foreach($permissions as $permission)
                                            <div class="mb-2 form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox group-{{ $loop->parent->index }}" name="permission[]" id="checkDefault{{ $permission->name }}" value="{{ $permission->id }}">
                                                
                                                <label class="form-check-label" for="checkDefault{{ $permission->id }}"> {{ $permission->name }} </label>
                                            </div>  
                                        @endforeach
                                        <br>

                                    </div>  
                                </div><!--//End Row -->
                            @endforeach
                                    
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>

								</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // Select all permissions
    $('#checkDefaultmain').click(function(){
        if ($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    });
    //  Select all permissions in a group 
    $('.group-checkbox').click(function() {
        var groupIndex = $(this).attr('id').replace('groupCheck', '');
        if ($(this).is(':checked')) {
            $('.group-' + groupIndex).prop('checked', true);
        } else {
            $('.group-' + groupIndex).prop('checked', false);
        }
    });
</script>

@endsection