<?php
echo "<p class='sidebar-title'> Pendaftaran Members</p>
<div class='alert alert-info'><b>PENTING!</b> - Contact information </div>
<br>";
$attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
echo form_open_multipart('auth/register',$attributes); 
  echo "<div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Nama Lengkap</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-12'>
                <input type='text' class='required form-control' name='c'>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>No Telpon/Hp</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type='number' class='required number form-control' name='j'  minlength='10'>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputPassword3' class='col-sm-3 control-label'>Alamat</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-lg-12'>
                <input type='text' class='required form-control' name='e'>
            </div></div>
        </div>

        <div class='form-group'>
            <label for='inputPassword3' class='col-sm-3 control-label'>Kota</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-lg-12'>
                <select class='form-control select2' name='h' required>
                    <option value=''>- Pilih -</option>";
                    foreach ($kota as $rows) {
                        echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                    }
                echo "</select>
            </div></div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Email</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-12'>
                <input type='email' class='required email form-control' name='d'>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Username</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type='text' class='required form-control' name='a' onkeyup=\"nospaces(this)\" required>
            </div>
            </div>
        </div>


        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Password</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type='password' class='required form-control' onkeyup=\"nospaces(this)\" name='b' required>
            </div>
            </div>
        </div>

        <br>
        <div class='form-group'>
            <div class='col-sm-offset-2'>
                <button type='submit' name='submit' class='btn btn-primary'>Daftar</button>
                <a  class='btn btn-default' href='".base_url()."auth/login'>Sudah Punya Akun?</a>
            </div>
        </div>
    </form>";
