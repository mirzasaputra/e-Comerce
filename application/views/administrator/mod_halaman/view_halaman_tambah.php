 <div class='col-md-12'>
   <div class='box box-info'>
     <div class='box-header with-border'>
       <h3 class='box-title'>Tambah Halaman Baru</h3>
     </div>
     <div class='box-body'>
       <form action="<?php echo base_url('administrator/tambah_halamanbaru') ?>" method="post" enctype="multipart/form-data">
         <div class='col-md-12'>
           <table class='table table-condensed table-bordered'>
             <tbody>
               <input type='hidden' name='id' value=''>
               <tr>
                 <th width='120px' scope='row'>Judul</th>
                 <td><input type='text' class='form-control' name='a'></td>
               </tr>
               <tr>
                 <th scope='row'>Isi Halaman</th>
                 <td><textarea id='editor1' class='form-control' name='b' style='height:350px'></textarea></td>
               </tr>
               <tr>
                 <th scope='row'>Gambar</th>
                 <td><input type='file' class='form-control' name='c'></td>
               </tr>
             </tbody>
           </table>
         </div>
     </div>
     <div class='box-footer'>
       <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
     </div>
     </form>
   </div>