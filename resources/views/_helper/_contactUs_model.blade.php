
<!-- Modal -->
<div class="modal fade " id="contactus-modal"  role="dialog" aria-labelledby="contactusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content secondaryBGColor">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("تواصل معنا")}}</h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form id="contactus-form" action="{{route('contactus')}}" method="post" >
                        @csrf
                        @method("post")
                        @include('_forms/_contactUs_form')
                    </form>

            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-danger mx-3" data-dismiss="modal">{{__("اغلاق")}}</button>
                <button type="submit" onclick="$('#contactus-form').submit()" class="btn btn-outline-light mx-3">{{__("إرسال")}}</button>
            </div>
        </div>
    </div>
</div>
