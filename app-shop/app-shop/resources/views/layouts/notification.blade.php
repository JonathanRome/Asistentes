@if (session('notification'))
                        <div class="alert alert-success text-center pb-1 pt-1" style="position:absolute; z-index: 1;  width: 100%; top: 9%;left: 0%;">
                            <a class="py-0 my-0 ">{{ session('notification') }}</a>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
@endif