(function ($) {
    'use strict';
    /*==================================================================
    /*[ Select 2 Config ]
        ===========================================================*/

    try {
        var selectSimple = $('.js-select-simple');

        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });

    } catch (error) {
        console.log(error);
    }

    try {
        $(document).ready(function () {
            // ambil data kabupaten/kota ketika data memilih provinsi
            $('body').on("change", "#form_prov", function () {
                var id = $(this).val();
                var data = "id=" + id + "&data=kabupaten";
                $.ajax({
                    type: 'POST',
                    url: "function/get_daerah.php",
                    data: data,
                    success: function (hasil) {
                        $("#form_kab").html(hasil);
                    }
                });
            });

            // ambil data kecamatan ketika data memilih kabupaten/kota
            $('body').on("change", "#form_kab", function () {
                var id = $(this).val();
                var data = "id=" + id + "&data=kecamatan";
                $.ajax({
                    type: 'POST',
                    url: "function/get_daerah.php",
                    data: data,
                    success: function (hasil) {
                        $("#form_kec").html(hasil);
                    }
                });
            });

            // ambil data desa ketika data memilih kecamatan
            $('body').on("change", "#form_kec", function () {
                var id = $(this).val();
                var data = "id=" + id + "&data=desa";
                $.ajax({
                    type: 'POST',
                    url: "function/get_daerah.php",
                    data: data,
                    success: function (hasil) {
                        $("#form_des").html(hasil);
                    }
                });
            });

        });
    } catch (error) {
        console.log(error);
    }


})(jQuery);