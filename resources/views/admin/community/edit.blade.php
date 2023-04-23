@extends('layouts.admin')
@section('title', " Editing $community->name ")
@section('description', 'Empowering and growing your networks with influencers and by mentors')
@section('admin')
<div id="content" class="flex">
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title text-md">Edit {{ $community->name }}</div><button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="{{ route('community.update', $community) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group"><label>Name</label><input type="text" id="name" name="name" class="form-control" value="{{ $community->name }} "></div>
                            <div class="form-group"><label>Acronyms</label><input type="text" id="acronyms" name="acronyms" class="form-control" value="{{ $community->acronyms }}"></div>
                            <div class="form-group"><label>Location</label><input type="address" id="location" name="location" class="form-control" value="{{ $community->location }}"></div>
                            <div class="form-group"><label>Phone</label><input type="tel" id="phone" name="phone" class="form-control" value="{{ $community->phone }}"> </div>
                            <div class="form-group shadow-sm"><label>Community Logo</label>
                                <div>
                                    <a href="#" class="avatar ajax w-40" data-toggle="tooltip" title="{{ $community->name }}">
                                        <img src="{{ asset($community->logo) }}" alt="{{ $community->name }}">
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="form-group shadow-sm"><label>Change Logo</label>
                            <input type="file" class="form-control" name="logo">
                            </div>

                            <button type="submit" class="btn btn-primary mb-4">Update Community</button>
                        </form>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection