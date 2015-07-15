
{{ Form::open(array('url'=>'https://www.sandbox.paypal.com/cgi-bin/webscr', 'class'=>'form', 'id'=>'prepayment', 'role'=>'form')) }}
<input type="hidden" name="cmd" value="_xclick">
<!--<input type="hidden" name="business" value="wivert_paypal@wivert.co.uk"> -->
 <input type="hidden" name="at"
        value=" -djd-t8a-Lzw5MzWS8Mg2yUxuhwnPPgj6y9xSxfFHvxwcnpI3gEZ1rz96ei">

<input type="hidden" name="business" value="{{$details['reciever_email']}}">
<input type="hidden" name="item_name" value="{{str_replace('-', ' ',$details['item_name'])}}">
<input type="hidden" name="currency_code" value="{{$details['item_currency']}}">
<input type="hidden" name="amount" value="{{$details['item_price']}}">
<input type="hidden" name="notify_url" value="{{url($details['hotspot'].'/payment/status')}}">
<input type="hidden" name="custom" value="{{$details['sender_email']}},{{$details['template']}},{{$details['pdf']}}">
<input type="hidden" name="return"
       value="{{url($details['hotspot'].'/payment/status')}}">
<input type="hidden" name="cancel_return"
       value="{{url($details['hotspot'].'/payment/status')}}">

{{ Form::close() }}

<script src="/js/jquery-1.10.2.min.js"></script>
<script>
    $( document ).ready(function() {
        // Drop down menu handler
        $('#prepayment').submit();
    });
</script>
