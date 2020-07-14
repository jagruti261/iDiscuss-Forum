 

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">Signup for an iDiscuss Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/iDiscuss/partial/_handlesignup.php" method="POST">
      <div class="modal-body">
            <div class="form-group">
                <label for="signupemail">Username</label>
                <input type="text" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirmpassword"> Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
     </form>
    </div>
  </div>
</div>