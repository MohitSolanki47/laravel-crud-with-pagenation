<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
  .w-5{
    width:30;
  }
</style>
<br><br><br>


  <div class="container">
  <a href="/">Insert Data </a><br><br>
    <table class="table table-borderd shadow text-center">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">Mobile No</th>
          <th scope="col">email</th>
          <th scope="col">Edit</th>
          <th scope="col">Detele</th>
        </tr>
      </thead>
      <?php foreach ($User_data as $val) {?>
      <tbody>
        <tr>
          <th scope="row">{{ $val->id }}</th>
          <td>{{ $val->name }}</td>
          <td>{{ $val->Mobile_No }}</td>
          <td>{{ $val->email }}</td>
          <td><a href="{{ url('edit/'.$val->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
          <td><a href="{{ url('delete/'.$val->id) }}" class="btn btn-primary btn-sm">Delete</a></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <ul class="pagination">
        <li class="page-item">{{$User_data->links()}}</li>
    </ul>
  </div>