@if (count($notices))
        @push('head')
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        @endpush
        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        @endpush
    @foreach ($notices as $notice)
            {{-- @push('script')
                <script>
                    $('#noticeModal-{{ $loop->iteration }}').modal('show');
                </script>
            @endpush --}}
        <!-- Modal -->
        <div class="modal fade" id="noticeModal-{{ $loop->iteration }}" tabindex="-1" aria-labelledby="noticeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noticeModalLabel">{{ $notice->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($notice->type == 3)
                            {!! $notice->content !!}
                        @else
                            <img src="/storage/{{ $notice->file }}" class="img-thumbnail img-fluid"
                                alt="{{ $notice->title }}">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
