
<!-- Button trigger modal -->
<button id="triggerModalButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" hidden>
   Launch demo modal
</button>
 
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header card-header">
            <h5 class="modal-title" id="editModalLabel">Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            Are you sure update this user's information ?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="acceptModalButton">Accept</button>
         </div>
      </div>
   </div>
</div>