@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <form action="{{ route('admin.checklist_groups.checklists.store', $checklistGroup) }}" method="POST">
                        @csrf
                    <div class="card-header">{{ __('New Checklist in') }} {{ $checklistGroup->name }}</div>

                    <div class="card-body">
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput">{{ __('Name') }}</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="{{ __('CheckList Group Name') }}">
                    </div>
                
                    </div>
                    <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">{{ __('Save') }}</button>
                   </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
