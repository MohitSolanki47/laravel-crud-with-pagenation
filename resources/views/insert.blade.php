
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<html>
    <div class="container" >
        <h1 class="text-center"> Add Data</h1>
        <form method="POST" action="/insert" > 
        @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name_user">Name</label>
                    <input type="text" class="form-control" name="name_user" id="name_user" placeholder="Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Mobile_No">Mobile No</label>
                    <input type="text" class="form-control" name="Mobile_No" id="Mobile_No" placeholder="Mobile No ...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" name="inputEmail4" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>
</html>


