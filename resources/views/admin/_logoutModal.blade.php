<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  Logout </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body"> <strong> Are you sure you want to logout? </strong> </div>

            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                @method('GET')
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-danger">Logout</button>
                </div>

            </form>

        </div>
    </div>
</div>