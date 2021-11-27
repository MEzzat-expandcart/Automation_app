<!DOCTYPE html>
<html lang="en">
<head>
  <title>Automation Apps Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Automation Apps Process Configurations</h2>

    <div class="col-lg-12">
        <h4>Upload App Folder's Logos</h4>
    </div>
    <div class="form-group">
        <form style="padding-left:80px" class="form-horizontal" action="./run_bash.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                Type Folder Name Here :  <input type="text" name="folderName" />
            </div>
            <div class="form-group">
                Select Logo Zip Folder to Upload:  <input type="file" name="files" id="files"/>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="Submit" value="Upload" name="upload" />
            </div>
        </form>
    </div>
    <div class="col-lg-12">
        <h4></h4>
    </div>

    <form  id = "mainForm" class="form-horizontal" method="POST" action="./run_bash.php"  enctype="multipart/form-data">
    <div class="col-lg-12">
          <h4>General Config</h4>
      </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="storeName">Store Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="storeName" name="storeName" placeholder="Store Name" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="storeUsername">StoreUsername:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="storeUsername" name="storeUsername" placeholder="Store Username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="storePassword">StorePassword:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="storePassword" name="storePassword" placeholder="Store Password">
      </div>
    </div>
    <div class="form-group">
          <label class="control-label col-sm-2" for="storeCode">Store Code:</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="storeCode" name="storeCode" placeholder="Store Code" >
          </div>
      </div>
    <div class="col-lg-12">
          <h4>Android App Config</h4>
    </div>
    <div class="form-group">
          <label class="control-label col-sm-2" for="storePackage">Store Package:</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="storePackage" name="storePackage" placeholder="Store Package" >
          </div>
    </div>
    <div class="form-group">
          <label class="control-label col-sm-2" for="storeEnName">Store En-Name:</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="storeEnName" name="storeEnName" placeholder="Store En-Name">
          </div>
      </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="storeArName">Store Ar-Name:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="storeArName" name="storeArName" placeholder="Store Ar-Name">
      </div>
  </div>
    <div class="col-lg-12">
      <h4>IOS App Config</h4>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="IOSName">IOS Name:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="IOSName" name="IOSName" placeholder="IOS Name">
      </div>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="IOSBundle">IOS Bundle:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="IOSBundle" name="IOSBundle" placeholder="IOS Bundle">
      </div>
  </div>
    <div class="form-group">
  </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </div>
    </div>
  </form>

    <div id = "downloadArea" style="display: none; padding-bottom: 30px">
        <div class="alert alert-success" role="alert">
            Package Has Been Build Successfully
        </div>
        <button type="button" id = "downloadBtn" class="btn btn-primary btn-lg btn-block" >
            <a  style="color: #ffffff;" href="run_bash.php?path=img/rsz_21.jpg">Download Package File Now</a>
        </button>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {

        $("#mainForm").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data); // show response from the php script.
                    $("#downloadArea").show();
                }
            });


        });
    });
</script>
</body>
</html>

