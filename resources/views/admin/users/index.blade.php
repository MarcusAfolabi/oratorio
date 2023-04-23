@extends('layouts.admin')
@section('title', 'Members of the group')
@section('description', 'Empowering and growing your networks with influencers and by mentors')
@section('admin')
<div id="content" class="flex">
    <div class="page-hero page-container" id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight">Community Members </h2><small class="text-muted">You can search for members from here</small>
            </div>
            <div class="flex"></div>
            <div><button class="btn btn-white mb-2" data-toggle="modal" data-target="#newUser"><i data-feather="user-plus"></i> &nbsp; New member</button>
            </div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="mb-5">
                <div class="toolbar">
                    <form method="GET" action="{{ route('users.index') }}" class="flex">
                        <div class="input-group"><input type="text" name="search" class="form-control form-control-theme form-control-sm search" placeholder="Search" required> <span class="input-group-append"><button class="btn btn-white no-border btn-sm" type="button"><span class="d-flex text-muted"><i data-feather="search"></i></span></button></span></div>
                    </form>
                </div>
                <div class="table-responsive">
                    @if ($users->isEmpty()) <div class="alert alert-info"> No users found. </div>@endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul> @foreach ($errors->all() as $error) <li><i data-feather="alert-triangle"></i> {{ $error }}</li> @endforeach </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert"><i data-feather="check"></i> {{ session('status') }} </div>
                    @endif
                    <table class="table table-theme table-row v-middle">
                        <thead>
                            <tr>
                                <th class="text-muted">S/N</th>
                                <th class="text-muted sortable" data-toggle-class="asc">Image</th>
                                <th class="text-muted"><span class="d-none d-sm-block">Name</span></th>
                                <th class="text-muted"><span class="d-none d-sm-block">Edit</span></th>
                                <th class="text-muted"><span class="d-none d-sm-block">Delete</span></th>
                                <th class="text-muted"><span class="d-none d-sm-block">View</span></th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr class="v-middle">
                                <td> <label>{{ $user->id }}</label> </td>
                                <td>
                                    <div class="avatar-group"><a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="{{ $user->name }}"><img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"></a></div>
                                </td>
                                <td class="flex"><a href="#" class="item-title text-color">{{ $user->name }} {{ $user->last_name }}
                                    </a>
                                    <div class="item-except text-muted text-sm h-1x">{{ $user->email }} || @if($user->community) {{ $user->community->name }}@endif
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="edit-user">
                                        <span title="Edit" class="item-amount text-sm"><i data-feather="edit"></i> </span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Hey, Are you sure about this?')) { document.querySelector('#delete-user-{{ $user->id }}').submit(); }">
                                        <span title="Delete User" class="item-amount d-none d-sm-block text-sm">
                                            <i data-feather="trash-2"></i>
                                        </span>
                                    </a>
                                    <form id="delete-user-{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>

                                <td> Check Profile </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="newUser" class="modal fade" data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-md">Add new member</div><button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group"><label>Firstname</label><input type="text" id="name" name="name" class="form-control" placeholder="Enter Firstname"></div>
                    <div class="form-group"><label>Last name</label><input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Lastname"></div>
                    <div class="form-group"><label>Email</label><input type="email" id="email" name="email" class="form-control" placeholder="Enter email"></div>
                    <div class="form-group"><label>Password</label><input type="password" id="password" name="password" class="form-control" placeholder="Password"> </div>
                    <div class="form-group shadow-sm"><select class="form-control" name="role">
                            <option value="member">Member</option>
                            <option value="influencer">Influencer</option>
                            <option value="admin">Admin</option>
                        </select></div>
                        <div class="form-group shadow-sm"><label>Chapter</label><select class="form-control" name="community_id">
                                @foreach($communities as $community)
                            <option value="{{ $community->id }}">{{ $community->name }}</option> 
                            @endforeach
                        </select></div>
                    <button type="submit" class="btn btn-primary mb-4">Pre-register</button>
                </form>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button> </div>
        </div>
    </div>
</div>

@endsection