
Stripe.setPublishableKey('pk_test_51Mf73PHhvvyAd0XVEELLX7lcRmXpIr8EJ0RFU0FD3kXZPDtb7ftgh2JDQlp1HvqUmiGxNcnEVgNSiEDwwIX2hwy800i2NtcxE3');

var $form = $('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('#btn_sold').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);
    return false;   
});

function stripeResponseHandler(status, response){
    if (response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('#btn_sold').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken"/>').val(token));        
        
        // submit the form:
        $form.get(0).submit();
        
    }
}

