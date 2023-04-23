$(document).ready(function() {
    var jqOld = jQuery.noConflict();
    jqOld(function() {
        jqOld(".nepalidatepicker").nepaliDatePicker();
    });
    // $('.nepalidatepicker').nepaliDatePicker();

    createMemberPageLoad();
    getProvince();
    getDistrict();
    getLocalLevel();
    getLocalLevelType();
    sameAddress();
    copyMetaData();
    // dataTable();
    convertToDataTable();

    $("#btnDiv").show();

    // $("#documents-button").click(function (e) {
    //     e.preventDefault();
    //     $("#btnDiv").show();
    // });
});

function copyMetaData() {
    $("#description").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, " ");
        $("#meta_description").val(Text);
    });
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, " ");
        $("#meta_title").val(Text + " || Nagrik Unmukti Party");
    });
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, "-");
        $("#slug").val(Text);
    });
    $("#description").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, ",");
        $("#keywords").val(Text);
    });
}

function createMemberPageLoad() {
    $("#citizenship-content").show();
    $("#personal-content").hide();
    $("#property-content").hide();
    $("#old-membership-content").hide();
    $("#documents-content").hide();
    $("#remarks-content").hide();
    $("#btnDiv").hide();
    $(this).addClass("bg-theme-9 text-white");
    $(this).removeClass("bg-gray-200");

    $("#personal-button").click(function() {
        $("#personal-content").show();
        $("#citizenship-content").hide();
        $("#property-content").hide();
        $("#old-membership-content").hide();
        $("#documents-content").hide();
        $("#remarks-content").hide();
        $("#btnDiv").hide();
    });

    $("#citizenship-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").show();
        $("#property-content").hide();
        $("#old-membership-content").hide();
        $("#documents-content").hide();
        $("#remarks-content").hide();
        $("#btnDiv").hide();
    });

    $("#property-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").hide();
        $("#property-content").show();
        $("#old-membership-content").hide();
        $("#documents-content").hide();
        $("#remarks-content").hide();
        $("#btnDiv").hide();
    });

    $("#old-membership-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").hide();
        $("#property-content").hide();
        $("#old-membership-content").show();
        $("#documents-content").hide();
        $("#remarks-content").hide();
        $("#btnDiv").hide();
    });

    $("#documents-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").hide();
        $("#property-content").hide();
        $("#old-membership-content").hide();
        $("#documents-content").show();
        $("#remarks-content").hide();
        $("#btnDiv").show();
    });

    $("#remarks-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").hide();
        $("#property-content").hide();
        $("#old-membership-content").hide();
        $("#documents-content").hide();
        $("#remarks-content").show();
    });
}

function getProvince(value) {
    $.ajax({
        url: "/getProvince/",
        type: "GET",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function(data) {
            if (data) {
                $('select[name="' + value + '_province_id"]').empty();
                $('select[name="' + value + '_province_id"]').append(
                    "<option hidden> प्रदेश छान्नुहोस् |</option>"
                );
                $.each(data, function(key, province) {
                    $('select[name="' + value + '_province_id"]').append(
                        '<option value="' +
                        province.id +
                        '">' +
                        province.code +
                        " - " +
                        province.name_en +
                        " (" +
                        province.name_lc +
                        ")" +
                        "</option>"
                    );
                });
            } else {
                $('select[name="' + value + '_province_id"]').append(
                    "<option hidden> प्रदेश छान्नुहोस् </option>"
                );
            }
        },
    });
}

function getDistrict(value) {
    var provinceId = $('select[name="' + value + '_province_id"]').val();
    if (provinceId) {
        $.ajax({
            url: "/getDistrict/" + provinceId,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function(data) {
                if (data) {
                    $('select[name="' + value + '_district_id"]').empty();
                    $('select[name="' + value + '_district_id"]').append(
                        "<option hidden> जिल्ला छान्नुहोस् |</option>"
                    );
                    $.each(data, function(key, district) {
                        $('select[name="' + value + '_district_id"]').append(
                            '<option value="' +
                            district.id +
                            '">' +
                            district.code +
                            " - " +
                            district.name_en +
                            " (" +
                            district.name_lc +
                            ")" +
                            "</option>"
                        );
                    });
                } else {
                    $('select[name="' + value + '_district_id"]').append(
                        "<option hidden> पहिला प्रदेश छान्नुहोस् |</option>"
                    );
                }
            },
        });
    } else {
        $('select[name="' + value + '_province_id"]').append(
            "<option hidden> प्रदेश छान्नुहोस् |</option>"
        );
    }
}

function getLocalLevelType(value) {
    var localLevelId = $('select[name="' + value + '_local_level_id"]').val();
    if (localLevelId) {
        $.ajax({
            url: "/getLocalLevelType/" + localLevelId,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function(data) {
                if (data) {
                    $(
                        'select[name="' + value + '_local_level_type_id"]'
                    ).empty();
                    $(
                        'select[name="' + value + '_local_level_type_id"]'
                    ).append(
                        '<option value="' +
                        data.id +
                        '" selected>' +
                        data.code +
                        " - " +
                        data.name_en +
                        " (" +
                        data.name_lc +
                        ")" +
                        "</option>"
                    );
                } else {
                    $(
                        'select[name="' + value + '_local_level_type_id"]'
                    ).append(
                        "<option hidden>---  पहिला स्थानइय तह छान्नुहोस् |  ---</option>"
                    );
                }
            },
        });
    }
}

function getLocalLevel(value) {
    var districtId = $('select[name="' + value + '_district_id"]').val();
    if (districtId) {
        $.ajax({
            url: "/getLocalLevel/" + districtId,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function(data) {
                if (data) {
                    $('select[name="' + value + '_local_level_id"]').empty();
                    $('select[name="' + value + '_local_level_id"]').append(
                        "<option hidden>---  स्थानइय तह छान्नुहोस् |  ---</option>"
                    );
                    $.each(data, function(key, localLevel) {
                        $('select[name="' + value + '_local_level_id"]').append(
                            '<option value="' +
                            localLevel.id +
                            '">' +
                            localLevel.code +
                            " - " +
                            localLevel.name_en +
                            " (" +
                            localLevel.name_lc +
                            ")" +
                            "</option>"
                        );
                    });
                } else {
                    $('select[name="' + value + '_local_level_id"]').append(
                        "<option hidden>---  पहिला जिल्ला छान्नुहोस् |  ---</option>"
                    );
                }
            },
        });
    }
}

function sameAddress() {
    if ($("#perm_temp_address_chk").is(":checked")) {
        var selectedProvinceValue = $(
            'select[name="perm_province_id"] option:selected'
        ).val();
        var selecteProvinceText = $(
            'select[name="perm_province_id"] option:selected'
        ).text();
        var selectedDistrictValue = $(
            'select[name="perm_district_id"] option:selected'
        ).val();
        var selecteDistrictText = $(
            'select[name="perm_district_id"] option:selected'
        ).text();
        var selectedLocalLevelValue = $(
            'select[name="perm_local_level_id"] option:selected'
        ).val();
        var selecteLocalLevelText = $(
            'select[name="perm_local_level_id"] option:selected'
        ).text();
        var selectedLocalLevelTypeValue = $(
            'select[name="perm_local_level_type_id"] option:selected'
        ).val();
        var selecteLocalLevelTypeText = $(
            'select[name="perm_local_level_type_id"] option:selected'
        ).text();
        var selectedWardNumberValue = $("#perm_ward_number").val();
        var selectedToleValue = $("#perm_tole").val();
        $('select[name="temp_province_id"]').empty();
        $('select[name="temp_province_id"]').append(
            '<option value="' +
            selectedProvinceValue +
            '">' +
            selecteProvinceText +
            "</option>"
        );
        $('select[name="temp_district_id"]').empty();
        $('select[name="temp_district_id"]').append(
            '<option value="' +
            selectedDistrictValue +
            '">' +
            selecteDistrictText +
            "</option>"
        );
        $('select[name="temp_local_level_id"]').empty();
        $('select[name="temp_local_level_id"]').append(
            '<option value="' +
            selectedLocalLevelValue +
            '">' +
            selecteLocalLevelText +
            "</option>"
        );
        $('select[name="temp_local_level_type_id"]').empty();
        $('select[name="temp_local_level_type_id"]').append(
            '<option value="' +
            selectedLocalLevelTypeValue +
            '">' +
            selecteLocalLevelTypeText +
            "</option>"
        );
        $("#temp_ward_number").val(selectedWardNumberValue);
        $("#temp_tole").val(selectedToleValue);
    } else {
        getProvince("temp");
        $('select[name="temp_district_id"]').empty();
        $('select[name="temp_district_id"]').val("").change();
        $('select[name="temp_local_level_id"]').empty();
        $('select[name="temp_local_level_id"]').val("").change();
        $('select[name="temp_local_level_type_id"]').empty();
        $('select[name="temp_local_level_type_id"]').val("").change();
        var selectedWardNumberValue = $("#temp_ward_number").val("");
        var selectedToleValue = $("#temp_tole").val("");
    }
}


//     var t = $("#datatable").DataTable({
//         responsive: true,
//         destroy: true,
//         paging: true,
//         columnDefs: [{
//             searchable: false,
//             orderable: false,
//             targets: 0,
//         }, ],
//         order: [
//             [1, "asc"]
//         ],
//     });

//     t.on("order.dt search.dt", function() {
//         t.column(0, {
//                 search: "applied",
//                 order: "applied",
//             })
//             .nodes()
//             .each(function(cell, i) {
//                 cell.innerHTML = i + 1;
//             });
//     }).draw();
// }

// DataTables Read Record (WIP)
function convertToDataTable(params = "dataTable") {
    const tableId = "#" + params;
    if ($.fn.DataTable.isDataTable(tableId)) {
        // DataTable already initialized on this table
        return;
    }
    $(tableId).DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        searching: true,
        ordering: false,
        columnDefs: [{
            searchable: true,
            orderable: false,
            sortable: false,
        }, ],
        buttons: [{
                extend: "colvis",
                text: '<i class="fas fa-eye"></i>',
                className: "btn btn-sm btn-grey",
                columns: ":gt(0)",
                autoClose: true,
            },
            {
                extend: "copy",
                text: '<i class="fas fa-copy"></i>',
                className: "btn btn-sm btn-grey",
                columns: ":gt(0)",
                autoClose: true,
            },
            {
                extend: "csv",
                text: '<i class="fas fa-file-csv"></i>',
                className: "btn btn-sm btn-grey",
                columns: ":gt(0)",
                autoClose: true,
            },
            {
                extend: "excel",
                text: '<i class="fas fa-file-excel"></i>',
                className: "btn btn-sm btn-grey",
                columns: ":gt(0)",
            },
            {
                extend: "pdf",
                text: '<i class="fas fa-file-pdf"></i>',
                className: "btn btn-sm btn-grey",
                columns: ":gt(0)",
            },
            {
                extend: "print",
                text: '<i class="fas fa-print"></i>',
                className: "btn btn-sm btn-grey",
                columns: ":gt(0)",
                autoClose: true,
            },
        ],
        initComplete: function(settings, json) {
            let table = $(tableId).DataTable();
            table
                .on("order.dt search.dt", function() {
                    table
                        .column(0, {
                            search: "applied",
                            order: "applied",
                        })
                        .nodes()
                        .each(function(cell, i) {
                            cell.innerHTML = i + 1;
                        });
                })
                .draw();
            table
                .buttons()
                .container()
                .appendTo("#dataTables_wrapper .col-md-6:eq(0)");
            $(".dataTable th:first-child").addClass("no-sort-icon");
            $(".dt-buttons").appendTo($("#dataTables_button_stack"));
            $(".dt-buttons")
                .addClass("d-xs-block")
                .addClass("d-sm-inline-block")
                .addClass("d-md-inline-block")
                .addClass("d-lg-inline-block");
        },
    });
}