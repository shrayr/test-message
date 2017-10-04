@extends('layouts.app')

@section('content')
    <h1 class="col-sm-12">Create a new message</h1>
    <form action="{{ route('messages.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                       value="{{ old('subject') }}" required>
            </div>

            <!-- Message Form Input -->
            <div class="form-group message-block">
                <label class="control-label">Message</label>
                <textarea rows="5" name="message" class="form-control message-area" required>{{ old('message') }}</textarea>
                <label for="upload-file-input">
                    <span class="fa fa-paperclip file-attach" aria-hidden="true"></span>
                    <input type="file" id="upload-file-input" name="file" style="display:none">
                </label>
            </div>
            <p class="attached-file-area"></p>
            @if($users->count() > 0)
                <div class="form-group">
                    <label class="control-label">Participants</label>
                <select class="form-control select-2" name="recipients[]" multiple="multiple">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{!!$user->name!!}</option>
                   @endforeach
                </select>
                </div>
                @endif
                        <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
        </div>
    </form>
@stop