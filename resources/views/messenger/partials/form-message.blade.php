<h2>Add a new message</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}

            <!-- Message Form Input -->
    <div class="form-group message-block">
        <textarea name="message" rows="5" class="form-control message-area">{{ old('message') }}</textarea>
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
</form>