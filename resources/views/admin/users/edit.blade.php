@extends('layouts.admin')
@section('title', 'Members of the group')
@section('description', 'Empowering and growing your networks with influencers and by mentors')
@section('admin')
<div id="content" class="flex">
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title text-md">Edit User</div> 
                    </div>
                    <div class="modal-body p-4">
                        <form action="{{ route('users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group"><label>Firstname</label><input type="text" id="name" value="{{ $user->name }}" name="name" class="form-control" placeholder="Enter Firstname"></div>
                            <div class="form-group"><label>Last name</label><input type="text" id="last_name" value="{{ $user->last_name }}" name="last_name" class="form-control" placeholder="Enter Lastname"></div>
                            <div class="form-group"><label>Email</label><input type="email" id="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="Enter email"></div>
                            <div class="form-group"><label>Password</label><input type="password" id="password" name="password" class="form-control" placeholder="Password"> </div>
                            <div class="form-group shadow-sm"><select class="form-control" name="role">
                          @if($user->community)  <option value="{{ $user->community->id }}">{{ $user->community->name }}</option>@endif
                                @foreach($communities as $community)
                            <option value="{{ $community->id }}">{{ $community->name }}</option> 
                            @endforeach
                        </select></div>  <button type="submit" class="btn btn-primary mb-4">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection