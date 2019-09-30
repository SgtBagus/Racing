<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">General Elements</h3>
        </div>
        <div class="box-body">
          <form role="form">
            <div class="form-group">
              <label>Text</label>
              <input type="text" class="form-control" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label>Textarea</label>
              <textarea class="form-control" rows="5" placeholder="Enter ..."></textarea>
            </div>
            <div class="form-group">
              <label>File Preview</label>
              <div class="input-group" id="preview_image">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-danger" id="btnFile">Pilih Gambar</button>
                </div>
                <input type="text" class="form-control" readonly>
                <input type="file" class="file" id="imageFile" style="display: none;" name="file" accept="image/x-png,image/jpeg,image/jpg" />
              </div>
              <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
            </div>
            <div class="form-group">
              <label>Textarea</label>
              <input type="text"class="form-control" id="datepicker" placeholder="Masukan Tanggal Lahir">
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Checkbox 1
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Checkbox 2
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                  Option one is this and that—be sure to include why it's great
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Option two can be something else and selecting it will deselect option one
                </label>
              </div>
            </div>
            <div class="form-group">
              <label>Select</label>
              <select class="form-control">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-md btn-block btn-primary">
                <i class="fa fa-send"></i> Submit
              </button>
              <p class="help-block pull-right">Sudah Punya Akun ? <a href="<?= base_url('login') ?>">Login Disini </a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>