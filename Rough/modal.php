<!-- Add new Record modal -->
<div id="addmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="addmodalLabel">Add New Record</h4>

                    <div class="modal-body">
                        <form class="container" style="margin-top: 1vw;" method="POST" action="">
                            <span id="formErr" style="color:red"></span>
                            <div class="row container">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" style="width:48%" />
                                    <span id="nameErr" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        style="width:48%" />
                                    <span id="emailErr" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" id="phone" class="form-control" style="width:48%"
                                        maxlength="11" />
                                    <span id="phoneErr" style="color:red"></span>
                                </div>
                                <div class="form-group" style="width:48%">
                                    <label for="sel1">Select Country</label>
                                    <select class="form-control" id="sel1" name="country" id="country">
                                        <option value=""></option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Srilanka">Srilanka</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary submitbutton" type="button" id="submitBtn">Submit</button>
                            <button class="btn btn-danger" data-dismiss="modal" id="cancel">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- //  ajax -->



<script>
    $("#submitBtn").click(function () {
        $.ajax({
            url:"insert.php";
            method:"POST";
            data:$("#add_form").serialize(),
            success:function(data){
                alert(data);
                if(data=="submitted"){

                }
            }
        })
    })
</script>