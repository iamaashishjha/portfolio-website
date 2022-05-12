$(document).ready(function() {
    var jqOld = jQuery.noConflict();
    jqOld(function() {
        jqOld(".nepalidatepicker" ).nepaliDatePicker();
    });
    // $('.nepalidatepicker').nepaliDatePicker();

    createMemberPageLoad();
    getProvince();
    getDistrict();
    getLocalLevel();
    getLocalLevelType();
    sameAddress();
    copyMetaData();
});

function copyMetaData() {
    $("#description").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, ' ');
        $("#meta_description").val(Text);
    });
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, ' ');
        $("#meta_title").val(Text + " || Aashish Jha");
    });
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#slug").val(Text);
    });
    $("#description").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, ',');
        $("#keywords").val(Text);
    });
}

function createMemberPageLoad() {
    // debugger;
    $("#citizenship-content").show();
    $("#personal-content").hide();
    $("#property-content").hide();
    $("#old-membership-content").hide();
    $("#documents-content").hide();
    $("#remarks-content").hide();

    $("#personal-button").click(function() {
        $("#personal-content").show();
        $("#citizenship-content").hide();
        $("#property-content").hide();
        $("#old-membership-content").hide();
        $("#documents-content").hide();
        $("#remarks-content").hide();
    });

    $("#citizenship-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").show();
        $("#property-content").hide();
        $("#old-membership-content").hide();
        $("#documents-content").hide();
        $("#remarks-content").hide();
    });

    $("#property-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").hide();
        $("#property-content").show();
        $("#old-membership-content").hide();
        $("#documents-content").hide();
        $("#remarks-content").hide();
    });

    $("#old-membership-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").hide();
        $("#property-content").hide();
        $("#old-membership-content").show();
        $("#documents-content").hide();
        $("#remarks-content").hide();
    });

    $("#documents-button").click(function() {
        $("#personal-content").hide();
        $("#citizenship-content").hide();
        $("#property-content").hide();
        $("#old-membership-content").hide();
        $("#documents-content").show();
        $("#remarks-content").hide();
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
        url: '/getProvince/',
        type: "GET",
        data: {
            "_token": "{{ csrf_token() }}"
        },
        dataType: "json",
        success: function(data) {
            if (data) {
                $('select[name="' + value + '_province_id"]').empty();
                $('select[name="' + value + '_province_id"]').append(
                    '<option hidden> प्रदेश छान्नुहोस् |</option>');
                $.each(data, function(key, province) {
                    $('select[name="' + value + '_province_id"]').append('<option value="' +
                        province.id + '">' + province.code + ' - ' + province.name_en +
                        ' (' + province.name_lc + ')' + '</option>');
                });
            } else {
                $('select[name="' + value + '_province_id"]').append(
                    '<option hidden> प्रदेश छान्नुहोस् </option>'
                );
            }
        }
    });
}

function getDistrict(value) {
    var provinceId = $('select[name="' + value + '_province_id"]').val();
    if (provinceId) {
        $.ajax({
            url: '/getDistrict/' + provinceId,
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(data) {
                if (data) {
                    $('select[name="' + value + '_district_id"]').empty();
                    $('select[name="' + value + '_district_id"]').append(
                        '<option hidden> जिल्ला छान्नुहोस् |</option>');
                    $.each(data, function(key, district) {
                        $('select[name="' + value + '_district_id"]').append('<option value="' +
                            district.id + '">' + district.code + ' - ' + district.name_en +
                            ' (' + district.name_lc + ')' + '</option>');
                    });
                } else {
                    $('select[name="' + value + '_district_id"]').append(
                        '<option hidden> पहिला प्रदेश छान्नुहोस् |</option>'
                    );
                }
            }
        });
    } else {
        $('select[name="' + value + '_province_id"]').append(
            '<option hidden> प्रदेश छान्नुहोस् |</option>');
    }
}

function getLocalLevelType(value) {
    var localLevelId = $('select[name="' + value + '_local_level_id"]').val();
    if (localLevelId) {
        $.ajax({
            url: '/getLocalLevelType/' + localLevelId,
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(data) {
                if (data) {
                    $('select[name="' + value + '_local_level_type_id"]').empty();
                    $('select[name="' + value + '_local_level_type_id"]').append('<option value="' +
                        data.id + '" selected>' + data.code + ' - ' + data.name_en + ' (' + data
                        .name_lc + ')' + '</option>');
                } else {
                    $('select[name="' + value + '_local_level_type_id"]').append(
                        '<option hidden>---  पहिला स्थानइय तह छान्नुहोस् |  ---</option>');
                }
            }
        });
    }
}

function getLocalLevel(value) {
    var districtId = $('select[name="' + value + '_district_id"]').val();
    if (districtId) {

        $.ajax({
            url: '/getLocalLevel/' + districtId,
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(data) {
                if (data) {
                    $('select[name="' + value + '_local_level_id"]').empty();
                    $('select[name="' + value + '_local_level_id"]').append(
                        '<option hidden>---  स्थानइय तह छान्नुहोस् |  ---</option>');
                    $.each(data, function(key, localLevel) {
                        $('select[name="' + value + '_local_level_id"]').append(
                            '<option value="' + localLevel.id + '">' + localLevel.code +
                            ' - ' + localLevel.name_en + ' (' + localLevel.name_lc + ')' +
                            '</option>');
                    });
                } else {
                    $('select[name="' + value + '_local_level_id"]').append(
                        '<option hidden>---  पहिला जिल्ला छान्नुहोस् |  ---</option>');
                }
            }
        });
    }
}

function sameAddress() {
    if ($('#perm_temp_address_chk').is(':checked')) {
        var selectedProvinceValue = $('select[name="perm_province_id"] option:selected').val();
        var selecteProvinceText = $('select[name="perm_province_id"] option:selected').text();
        var selectedDistrictValue = $('select[name="perm_district_id"] option:selected').val();
        var selecteDistrictText = $('select[name="perm_district_id"] option:selected').text();
        var selectedLocalLevelValue = $('select[name="perm_local_level_id"] option:selected').val();
        var selecteLocalLevelText = $('select[name="perm_local_level_id"] option:selected').text();
        var selectedLocalLevelTypeValue = $('select[name="perm_local_level_type_id"] option:selected').val();
        var selecteLocalLevelTypeText = $('select[name="perm_local_level_type_id"] option:selected').text();
        var selectedWardNumberValue = $('#perm_ward_number').val();
        var selectedToleValue = $('#perm_tole').val();
        $('select[name="temp_province_id"]').empty();
        $('select[name="temp_province_id"]').append(
            '<option value="' + selectedProvinceValue + '">' + selecteProvinceText + '</option>'
            );
        $('select[name="temp_district_id"]').empty();
        $('select[name="temp_district_id"]').append('<option value="' + selectedDistrictValue + '">' +
            selecteDistrictText + '</option>');
        $('select[name="temp_local_level_id"]').empty();
        $('select[name="temp_local_level_id"]').append('<option value="' + selectedLocalLevelValue + '">' +
            selecteLocalLevelText + '</option>');
        $('select[name="temp_local_level_type_id"]').empty();
        $('select[name="temp_local_level_type_id"]').append('<option value="' + selectedLocalLevelTypeValue + '">' +
            selecteLocalLevelTypeText + '</option>');
        $('#temp_ward_number').val(selectedWardNumberValue);
        $('#temp_tole').val(selectedToleValue);
    } else {
        getProvince('temp');
        $('select[name="temp_district_id"]').empty();
        $('select[name="temp_district_id"]').val('').change();
        $('select[name="temp_local_level_id"]').empty();
        $('select[name="temp_local_level_id"]').val('').change();
        $('select[name="temp_local_level_type_id"]').empty();
        $('select[name="temp_local_level_type_id"]').val('').change();
        var selectedWardNumberValue = $('#temp_ward_number').val('');
        var selectedToleValue = $('#temp_tole').val('');
    };
}

