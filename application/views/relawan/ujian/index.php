<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title d-block mx-auto">
                <h3>Ujian Calon Relawan</h3>
            </div>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="card mb-2">
                    <div class="card-body d-flex justify-content-center">
                        <?php for ($i = 1; $i < $total + 1; $i++) : ?>
                            <div class="box-num" data-num="<?= $i ?>" data-id="<?= $allSoal[$i - 1]->id_soal ?>"><?= $i ?></div>
                        <?php endfor ?>
                    </div>
                </div>
                <div id="loader" style="display:none">
                    <div style="position:absolute;z-index: 1;display: flex;width: 100%;justify-content: center;height: 100%;align-items: center;background: #00000017;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="statbox widget box box-shadow">

                    <div class="widget-header">
                        <div class="d-flex">
                            <div id="number" class="mr-2">1. </div>
                            <div id="soal">
                                <?= $soal['soal'] ?>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="submitJawaban">
                                <input type="hidden" name="id_soal" value="<?= $soal['id_soal']; ?>">
                                <div id="jawaban">
                                    <?php foreach ($soal['jwb'] as $jwb) : ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="jwb_<?= $jwb->jawaban ?>" value="<?= $jwb->jawaban ?>" name="jawaban" class="custom-control-input">
                                            <label class="custom-control-label" for="jwb_<?= $jwb->jawaban ?>"><?= $jwb->ket_jawaban ?></label>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex mt-4 justify-content-center">
                        <button id="prev" style="display:none" class="btn btn-primary mb-2 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>Sebelumnya</button>
                        <button id="next" class="btn btn-primary mb-2 ml-2">Selanjutnya<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg></button>
                    </div>
                    <button id="done" class="btn btn-primary mb-2 float-right" type="button">Selesai</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>assets/plugins/sweetalerts/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        // initialize ajax setup
        $.ajaxSetup({
            beforeSend: function(jqXHR, Obj) {
                var value = "; " + document.cookie;
                var parts = value.split("; csrf_cookie_name=");
                if (parts.length == 2)
                    Obj.data += '&<?= $this->security->get_csrf_token_name(); ?>=' + parts.pop().split(";").shift();
            }
        });

        var link = 2;
        var page_link = "" + '/';
        var prev = link;
        cekPrev(prev - 1);
        cekJwb();
        $('.box-num[data-num="1"]').addClass('active');
        $('.box-num').on('click', function() {
            $('#loader').show();
            link = $(this).data('num');
            cekActive($(this).data('num'));
            $.ajax({
                type: "GET",
                url: window.location.href + '/' + parseInt($(this).data('num')),
                success: function(data) {
                    if (data.length > 0) {
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('#number').html(parseInt(link) - 1 + '. ');
                        $('#soal').html(data[0]?.soal);
                        $('input[name="id_soal"]').val(data[0]?.id_soal);
                        $('#jawaban').html('');
                        let jwb = '';
                        $.each(data[0]?.jwb, function(i, v) {
                            jwb += '<div class="custom-control custom-radio">';
                            jwb += '<input type="radio" id="jwb_' + v.jawaban + '" value="' + v.jawaban + '" name="jawaban" class="custom-control-input">';
                            jwb += '<label class="custom-control-label" style="cursor: pointer;" for="jwb_' + v.jawaban + '">' + v.ket_jawaban + '</label>';
                            jwb += '</div>';
                        });
                        $('#jawaban').html(jwb);
                        $('#loader').hide();
                        cekJwb();
                    }
                }
            });

            cekNext(link);
            link += (link > <?= $total ?> ? 0 : 1);
            prev = link - 1;
            cekPrev(prev);
        });

        $('#next').on('click', function(e) {
            e.preventDefault();
            $('#loader').show();
            $.ajax({
                type: "GET",
                url: window.location.href + '/' + parseInt(link),
                success: function(data) {
                    if (data.length > 0) {
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('#number').html(parseInt(link) - 1 + '. ');
                        $('#soal').html(data[0]?.soal);
                        cekActive(parseInt(link) - 1);
                        $('input[name="id_soal"]').val(data[0]?.id_soal);
                        $('#jawaban').html('');
                        let jwb = '';
                        $.each(data[0]?.jwb, function(i, v) {
                            jwb += '<div class="custom-control custom-radio">';
                            jwb += '<input type="radio" id="jwb_' + v.jawaban + '" value="' + v.jawaban + '" name="jawaban" class="custom-control-input">';
                            jwb += '<label class="custom-control-label" style="cursor: pointer;" for="jwb_' + v.jawaban + '">' + v.ket_jawaban + '</label>';
                            jwb += '</div>';
                        });
                        $('#jawaban').html(jwb);
                        $('#loader').hide();
                        cekJwb();
                    }
                }
            });

            cekNext(link);
            link += (link > <?= $total ?> ? 0 : 1);
            prev = link - 1;
            cekPrev(prev);
        });

        $('#prev').on('click', function(e) {
            e.preventDefault();
            prev = (prev != 1 ? prev - 1 : 1);
            $('#loader').show();
            $.ajax({
                type: "GET",
                url: window.location.href + '/' + parseInt(prev),
                success: function(data) {
                    if (data.length > 0) {
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('#number').html(parseInt(link) - 1 + '. ');
                        cekActive(prev);
                        $('#soal').html(data[0]?.soal);
                        $('input[name="id_soal"]').val(data[0]?.id_soal);
                        $('#jawaban').html('');
                        let jwb = '';
                        $.each(data[0]?.jwb, function(i, v) {
                            jwb += '<div class="custom-control custom-radio">';
                            jwb += '<input type="radio" id="jwb_' + v.jawaban + '" value="' + v.jawaban + '" name="jawaban" class="custom-control-input">';
                            jwb += '<label class="custom-control-label" style="cursor: pointer;" for="jwb_' + v.jawaban + '">' + v.ket_jawaban + '</label>';
                            jwb += '</div>';
                        });
                        $('#jawaban').html(jwb);
                        $('#loader').hide();
                        cekJwb();
                    }
                }
            });

            cekNext(prev);
            link = prev + 1;
            cekPrev(prev);
        });

        $('#done').on('click', function(e) {
            e.preventDefault();
            swal({
                    title: 'Yakin Selesai Ujian?',
                    text: "Klik yakin jika sudah selesai",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Batal',
                    padding: '2em'
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url(); ?>relawan/ujian/selesai_ujian",
                            data: {
                                'id_ujian': <?= $id_ujian; ?>
                            },
                            success: function() {
                                swal({
                                    title: 'Berhasil',
                                    text: "Berhasil menyelesaikan ujian",
                                    type: 'success',
                                    padding: '2em'
                                })
                                window.location.href = "<?= base_url() ?>relawan/beranda";
                            }
                        })
                    }
                });
        });

        $('body').on('change', 'input[name="jawaban"]', function() {
            let id_soal = $('input[name="id_soal"]').val();
            $('#loader').show();
            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>relawan/ujian/store_jawaban",
                data: $('#submitJawaban').serialize(),
                success: function(r) {
                    $('#loader').hide();
                    $('.box-num[data-id="' + id_soal + '"]').addClass('done');
                },
                error: function(e) {
                    console.log('Error: ' + e);
                    $('#loader').hide();
                }
            })
        });

    });

    function cekActive(num) {
        $('.box-num').removeClass('active');
        $('.box-num[data-num="' + num + '"]').addClass('active');
    }

    function cekPrev(prv) {
        if (prv < 2) {
            $('#prev').hide();
        } else {
            $('#prev').show();
        }
    }

    function cekNext(nxt) {
        if (nxt == <?= $total ?>) {
            $('#next').hide();
        } else {
            $('#next').show();
        }
    }

    $.ajax({
        type: "GET",
        url: "<?= base_url(); ?>relawan/ujian/cek_number",
        success: function(r) {
            $.each(r, function(i, v) {
                $('.box-num[data-id="' + v.id_soal + '"]').addClass('done');
            });
        }
    });

    function cekJwb() {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>relawan/ujian/cek_soal",
            data: {
                'id_soal': $('input[name="id_soal"]').val()
            },
            success: function(r) {
                if (r != null) {
                    $('input[name="jawaban"][value="' + r.jawaban + '"]').prop('checked', true);
                }
            }
        });
    }
</script>