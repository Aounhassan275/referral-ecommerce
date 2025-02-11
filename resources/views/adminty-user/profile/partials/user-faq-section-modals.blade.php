
<div id="create-user-faq-section-modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('user.user_faq.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">User FAQ Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label>Question</label>
                        <textarea name="question" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <textarea name="answer" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="edit_user_faq_section_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateUserFaqSectionForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update User Faq Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">  
                    
                    <div class="form-group">
                        <label>Question</label>
                        <textarea name="question" id="user_faq_section_question" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <textarea name="answer" id="user_faq_section_answer" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>