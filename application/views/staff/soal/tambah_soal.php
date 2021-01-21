<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart('staff/bank_soal/jawabansoal'); ?>
                            <div class="card-header py-3">
                                <h6>Tulis Soal Disini!</h6>
                            </div>
                            <div class="card-body" height="10px">
                                <textarea class="tinymce" id="textarea" name="mytextarea" style="height: 390px;"></textarea>
                                <input type="text" class="form-control" id="id_ujian" name="id_ujian" value="<?= $id_ujian ?>" hidden required>
                            </div>
                            <div class="card-header py-3">
                                <h6>Tulis Jawaban Disini! (Cek Jawaban Yang Benar)</h6>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="n-chk align-self-end">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                    <input type="checkbox" class="new-control-input" id="jwbA" name="jwbA" onclick="jawabA()">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban A" id="jawabanA" name="jawabanA" aria-label="checkbox" required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="n-chk align-self-end">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                    <input type="checkbox" class="new-control-input" id="jwbB" name="jwbB" onclick="jawabB()">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban B" id="jawabanB" name="jawabanB" aria-label="checkbox" required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="n-chk align-self-end">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                    <input type="checkbox" class="new-control-input" id="jwbC" name="jwbC" onclick="jawabC()">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban C" id="jawabanC" name="jawabanC" aria-label="checkbox" required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="n-chk align-self-end">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                    <input type="checkbox" class="new-control-input" id="jwbD" name="jwbD" onclick="jawabD()">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban D" id="jawabanD" name="jawabanD" aria-label="checkbox" required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="n-chk align-self-end">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                    <input type="checkbox" class="new-control-input" id="jwbE" name="jwbE" onclick="jawabE()">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban E" id="jawabanE" name="jawabanE" aria-label="checkbox" required>
                                </div>
                            </div><br>
                            <input type="text" class="form-control" hidden placeholder="Jawaban Benar" id="jawaban_benar" name="jawaban_benar" aria-label="radio">
                            <button type="submit" id="tambah_soal" name="tambah_soal" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">Simpan Soal</span>
                            </button>
                            <?php echo form_close(); ?>
                            <!---Container Fluid-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function jawabA() {
        if ($('#jwbA').prop('checked', true)) {
            $('#jwbB').prop('checked', false);
            $('#jwbC').prop('checked', false);
            $('#jwbD').prop('checked', false);
            $('#jwbE').prop('checked', false);
            $('#jawaban_benar').val('A');
        }
    }

    function jawabB() {
        if ($('#jwbB').prop('checked', true)) {
            $('#jwbA').prop('checked', false);
            $('#jwbC').prop('checked', false);
            $('#jwbD').prop('checked', false);
            $('#jwbE').prop('checked', false);
            $('#jawaban_benar').val('B');
        }
    }

    function jawabC() {
        if ($('#jwbC').prop('checked', true)) {
            $('#jwbB').prop('checked', false);
            $('#jwbA').prop('checked', false);
            $('#jwbE').prop('checked', false);
            $('#jwbD').prop('checked', false);
            $('#jawaban_benar').val('C');
        }
    }

    function jawabD() {
        if ($('#jwbD').prop('checked', true)) {
            $('#jwbB').prop('checked', false);
            $('#jwbC').prop('checked', false);
            $('#jwbE').prop('checked', false);
            $('#jwbA').prop('checked', false);
            $('#jawaban_benar').val('D');
        }
    }

    function jawabE() {
        if ($('#jwbD').prop('checked', false)) {
            $('#jwbB').prop('checked', false);
            $('#jwbC').prop('checked', false);
            $('#jwbE').prop('checked', true);
            $('#jwbA').prop('checked', false);
            $('#jawaban_benar').val('E');
        }
    }
</script>