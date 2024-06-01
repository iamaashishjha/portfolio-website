
function initiatePaymentTransaction(submitButtonId) {
    $('#' + submitButtonId).click(function (e) {
        e.preventDefault();
        const paymentGatewayId = parseInt($("input[name='payment_gateway_id']:checked").val());
        const amount = parseInt($('#payment_amount').val());
        fetchAndProcessPaymentConfig(paymentGatewayId, amount);
    });
}

function createAndSubmitEsewaForm(formSubmitUrl, params) {
    const form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", formSubmitUrl);
    for (const key in params) {
        const hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);
        form.appendChild(hiddenField);
    }
    document.body.appendChild(form);
    form.submit();
}

function fetchAndProcessPaymentConfig(id, amount) {
    const memberId = $('#hidden-member-id').val();
    const url = `/payment-gateway/get-payment-gateway-config/${id}/${memberId}?amount=${amount}`;
    let response = null;
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data, status) {
            data = data.data;
            // console.log("Khalti Success Response => ", data);
            // console.log("Khalti Success Response METHOD => ", 'payment-method' in data);
            // console.log("Khalti Success Response URL => ", 'url' in data);
            // console.log("ESEWA Success Response PARAMS => ", 'params' in data);
            // console.log("Khalti Success Response BOTH => ", 'payment-method' in data && 'url' in data);
            if ('payment-method' in data) {
                window.location.href = data.url;
                // const $a = $('<a>', {href: data.url});
                // // Programmatically click the anchor tag
                // $a[0].click();
                // Redirect to a new URL
            } else if ('params' in data) {
                const params = data.params;
                const formSubmitUrl = data.url;
                createAndSubmitEsewaForm(formSubmitUrl, params);
            }
            console.log("Payment Config Success Response => ", data);
            debugger;
        }, error: function (xhr, status, error) {
            if (xhr.responseJSON.errors) {
                const errors = xhr.responseJSON.errors
                $.map(errors, function (value, index) {
                    new Noty({
                        type: 'error'
                        , text: value[0]
                    }).show();
                });
            } else if (xhr.responseJSON.error) {
                new Noty({
                    type: 'error'
                    , text: error
                }).show();
            }
            console.error('Error fetching payment config:', error);
        }
    });
    // console.log("Resposne after get => " + response);
    // return response;
}

function fillInputAmount(inputAmountClass, inputAmountId) {
    $('.' + inputAmountClass).click(function (e) {
        const value = $(this).val();
        $('#' + inputAmountId).val(value);
    });
}


function testScriptLoaded() {
    alert('OK TEST SCRIPT LOADED');
}