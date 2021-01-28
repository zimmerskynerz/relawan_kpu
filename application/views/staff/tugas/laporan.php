<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Laporan Tugas Relawan</h3>
            </div>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table id="style-3" class="table style-3  table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> No </th>
                                        <th class="text-center">Tanggal Laporan</th>
                                        <th class="text-center">Link Laporan</th>
                                        <th class="text-center">Komentar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_laporan as $Data_laporan) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td><?= date('d F Y', strtotime($Data_laporan->tgl_laporan)) ?></td>
                                            <td><a href="<?= base_url('assets/berkas_tugas/' . $Data_laporan->link_laporan . '') ?>" target="_BLANK">Link Berkas</a></td>
                                            <td><?= $Data_laporan->komentar ?></td>
                                            <td class="text-center">
                                            <?php
                                                if ($Data_laporan->status == 'SELESAI') : ?>
                                                    <span class="shadow-none badge badge-success">DITERIMA</span>
                                                <?php elseif ($Data_laporan->status == 'REVISI') : ?>
                                                    <span class="shadow-none badge badge-warning">REVISI</span>
                                                <?php else : ?>
                                                    <a id="detail_absensi" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" 
                                                    data-target="#absensi_detail" data-placement="top" title="" data-original-title="Detail" 
                                                    data-id_relawan_tugas="<?= $Data_laporan->id_relawan_tugas ?>" 
                                                    data-link_laporan_lama="<?= $Data_laporan->link_laporan ?>"
                                                    data-tgl_laporan="<?= $Data_laporan->tgl_laporan ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                        </svg>
                                                    </a>
                                                <?php endif;  ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('staff/include/copyright') ?>
    </div>
</div>
<!-- Detail Tugas Laporan -->
<div class="modal fade" id="absensi_detail" tabindex="-1" role="dialog" aria-labelledby="absensi_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="absensi_detailLabel">Revisi Tugas Relawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('staff/relawan/crudtugas'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <input type="text" class="form-control" hidden id="id_relawan_tugas" name="id_relawan_tugas" required placeholder="Nama Staff KPU">
                    <input type="text" class="form-control" required hidden id="link_laporan_lama" name="link_laporan_lama" required placeholder="Laporan Tugas">
                    <input type="date" class="form-control" required hidden id="tgl_laporan" name="tgl_laporan" required placeholder="Laporan Tugas">
                    <textarea type="text" id="komentar" name="komentar" class="form-control" placeholder="Komentar Laporan Tugas"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-warning" id="revisi_laporan" name="revisi_laporan">Revisi</button>
                <button type="submit" class="btn btn-success" id="terima_laporan" name="terima_laporan">Terima</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_absensi", function() {
        var link_laporan_lama = $(this).data('link_laporan_lama');
        var id_relawan_tugas = $(this).data('id_relawan_tugas');
        var tgl_laporan = $(this).data('tgl_laporan');
        $(".modal-body#detail_body #link_laporan_lama").val(link_laporan_lama);
        $(".modal-body#detail_body #id_relawan_tugas").val(id_relawan_tugas);
        $(".modal-body#detail_body #tgl_laporan").val(tgl_laporan);
    })
</script>