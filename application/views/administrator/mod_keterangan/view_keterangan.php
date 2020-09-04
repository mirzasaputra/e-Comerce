<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Keterangan</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/keterangan') ?>" method="post">
        <table class='table table-condensed table-bordered'>
          <tbody>
            <input type='hidden' name='id' value=''>
            <tr>
              <th width='120px' scope='row'>Keterangan</th>
              <td><textarea id='editor1' class='form-control' name='a' style='height:220px'><?php echo $record['keterangan'] ?></textarea></td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
  <div class='box-footer'>
    <button type='submit' name='submit' class='btn btn-info'>Update</button>
  </div>
  </form>
  <div class='col-md-12'>
  </div>