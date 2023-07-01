<!-- Button trigger modal -->

<nav class="navbar ">
  <form class="form-inline" action="#" method="post">
    <input class="form-control mr-sm-2" type="search"  id="search" placeholder="Search" autocomplete="off">
  </form>
<button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#model">
    Add Record
</button>
</nav>


<script>

$(document).on('keyup', function(e) {
        var search = $('#search').val();
    $.ajax({
        url: "search.php",
        type: "POST",
        data: {search},
        success: function(data) {
            $('#display_record').html(data);
        }
    })
});


</script>

<!-- Modal -->
<div class="modal fade" id="model" tabindex="-1" aria-labelledby="add_emp" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="add_emp">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="add_form">

                    <div class="form-group">
                        <label for="First Name">First name</label>
                        <input type="text" class="form-control" id="name" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="First Name">Address</label>
                        <input type="text" class="form-control" id="address" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="First Name">Salary</label>
                        <input type="text" class="form-control" id="salary" value="" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save_record">Save</button>
            </div>
        </div>
    </div>
</div>