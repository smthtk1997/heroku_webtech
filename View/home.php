<?php
include ('header.php')
?>
<body>
<div class="container">
    <div class="">
        <div class="headerText">
            <h1>EXPENSE CALCULATE</h1>
        </div>
        <form method="post" action="../Controller/controller.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="upload-file">First Name</label>
                    <input type="text" class="form-control" placeholder="First name" id="fname" name="fname" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="upload-file">Last Name</label>
                    <input type="text" class="form-control" placeholder="Last name" id="lname" name="lname" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="userDate">Email</label>
                    <input type="email" class="form-control" id="userMail" name="userMail" placeholder="E-Mail" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="upload-file">File Upload</label>
                    <div class="custom-file">
                        <input type="file" required class="custom-file-input" name="filepath" id="filepath " data-toggle="tooltip" data-placement="bottom" title="*File name must not contain special character." onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                        <label class="custom-file-label" for="filepath" style="font-weight: normal">Choose File</label>
                    </div>
                    <small id="passwordHelpInline" class="text-muted">
                        <span style="-webkit-text-fill-color: red">*.csv file only</span>
                    </small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-4 float-left">
                    <a href="#" id="cancelbtn"> <span class="btn btn-danger btn-lg float-left">RESET</span></a>
                </div>
                <div class="form-group col-4 text-center" style="margin-top: -35px">
                    <img class="loading text-center" style="display: none;margin-top: 10px" id="loading" src="../imgs/Magnify.svg" alt="" height="120px">
                </div>
                <div class="form-group col-4 float-right">
                    <input type="submit" class="btn btn-primary btn-lg float-right" value="Submit" id="btnSubmit">
                </div>
            </div>
        </form>
    </div>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#cancelbtn').click(function () {
            location.reload();
        });
        // $("#userDate").flatpickr({
        //     defaultDate: new Date(),
        //     locale: 'en',
        //     enableTime: false,
        //     time_24hr: true,
        //     dateFormat: "Y-m-d"
        // });

        $('form').on('submit',function () {
            $('#loading').show();
        });
    });

</script>

