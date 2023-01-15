@extends('layouts.app')

@section('content')

    <h3>
        {{$note->title}}
    </h3>


    <div class="form-group">
        {!! $note->data !!}
    </div>



<div class="bottom-panel">
    <div>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-key"></i> Password
        </button>
        <button type="button" class="btn btn-primary btn-sm copyToClipboard" data-toggle="tooltip" data-placement="top" title="Copy link to clipboard">
            <i class="fa fa-copy"></i> <span class="d-none d-md-inline">Copy link to clipboard</span>
        </button>

        <button type="button" class="btn btn-warning btn-sm copyToClipboard" data-toggle="tooltip" data-placement="top" title="Copy Article link">
            <i class="fa fa-copy"></i> <span class="d-none d-md-inline">Copy Article link</span>
        </button>
    </div>
</div>


<input type="text" id="myInput">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ url()->current() }}" method="post" id="note-form">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Give a password" value="{{ $note->password }}">
                    </div>

                    <button type="submit" name="update-password" class="btn btn-warning">Add or Update Password
                    </button>
                    <button type="submit" name="delete-password" class="btn btn-success">Remove Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {

        $('.copyToClipboard').click(function() {
            let text = window.location.href;

            const copyTextInput = $("#myInput");
            copyTextInput.show();
            copyTextInput.val(text);
            copyTextInput.select();
            document.execCommand("copy");
            copyTextInput.hide();

            $(this).attr('data-original-title', 'Link is copied to clipboard').tooltip('show');

            $(this).attr('data-original-title', 'Copy link to clipboard');
        })

    });
</script>
@endsection
