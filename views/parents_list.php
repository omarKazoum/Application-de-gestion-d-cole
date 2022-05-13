<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom copmlet</th>
      <th scope="col">Matricule</th>
      <th scope="col">test</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($data as $p){?>
    <tr>
      <th scope="row"><?php echo $p['id'];?></th>
      <td><?php echo $p['name'];?></td>
      <td></td>
      <td>@mdo</td>
      <td><a href="#" class="btn btn-danger">delete</a>
        <a href="#" class="btn btn-success">edit</a>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>