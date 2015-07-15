<?php


class PaypalController extends BaseController
{
    public function prePayment($hotspot){
       // return View::make('payment.prepayment');
        //return Redirect::away('https://www.sandbox.paypal.com/cgi-bin/webscr');
       $item_name = $_POST['item_name'];
       $item_price = $_POST['amount'];
       $item_currency = $_POST['currency_code'];
       $reciever_email = $_POST['business'];
       $sender_email = $_POST['custom'];

       $BUSSINESS_EMAIL = 'robert-bussiness@wivert.co.uk';
       $CURRENCY = 'GBP';
        $error = "";


        $deal = Deal::leftJoin('codes','codes.deal','=','deals.id')
            ->leftJoin('adverts','adverts.id','=','deals.advert')
            ->select('deals.name AS deal', 'codes.code_template AS template', 'codes.code_pdf AS pdf', 'adverts.name AS advert')
            ->where('deals.name','=', str_replace(' ', '-',$item_name))
            ->where('codes.available','=', 1)
            ->first();
            //var_dump($deal);

        if($reciever_email == $BUSSINESS_EMAIL && $item_currency == $CURRENCY ){
            if(!IS_NULL($deal)){

            } else {

                $error = "It seems that the deal is no more available, we apologise for the inconvenience, the payment was canceled ! ";
            }
        } else {
            $error = 'It seems that you tried to mess with some details so we canceled your payment !';

        }
        if($error != ""){
            return Redirect::back()->with('message', $error)->with('errclass', 'alert-danger');
        } else {
            $array = array('item_name' =>  $item_name,
                           'item_price' =>  $item_price,
                           'item_currency' => $item_currency,
                           'reciever_email' => $reciever_email,
                           'sender_email' => $sender_email,
                           'hotspot' => $hotspot,
                           'template' => $deal['template'],
                           'pdf' => $deal['pdf'],
                                           );
            return View::make('payment.prepayment')->with('details', $array);
        }
    }

    public function getPayment($hotspot){
        $date = new \DateTime;
        $hp = Hotspot::where('name', '=', $hotspot)->first();
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }


        //var_dump($_POST);

        // STEP 1: read POST data

// Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
// Instead, read raw POST data from the input stream.
        $raw_post_data = file_get_contents('php://input');
       // var_dump($raw_post_data);
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }


// STEP 2: POST IPN data back to PayPal to validate

        $ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set
// the directory path of the certificate as shown below:
        //var_dump(dirname(__FILE__));
 //curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
       // var_dump( curl_exec($ch));
        //var_dump(curl_error($ch));
        if( !($res = curl_exec($ch)) ) {
             //var_dump("Got " . curl_error($ch) . " when processing IPN data");
            curl_close($ch);
            exit;
        }
        curl_close($ch);


// STEP 3: Inspect IPN validation result and act accordingly

        if (strcmp ($res, "VERIFIED") == 0) {
            // The IPN is verified, process it:
            // check whether the payment_status is Completed
            // check that txn_id has not been previously processed
            // check that receiver_email is your Primary PayPal email
            // check that payment_amount/payment_currency are correct
            // process the notification

            // assign posted variables to local variables
            $item_name = $_POST['item_name'];
            $item_number = $_POST['item_number'];
            $payment_status = $_POST['payment_status'];
            $payment_amount = $_POST['mc_gross'];
            $payment_currency = $_POST['mc_currency'];
            $txn_id = $_POST['txn_id'];
            $receiver_email = $_POST['receiver_email'];
            $payer_email = $_POST['payer_email'];
            $custom = explode(",",$_POST['custom']);
            $sender_email = $custom[0];
            $template = $custom[1];
            $pdf = $custom[2];

            $deal = Deal::leftJoin('codes','codes.deal','=','deals.id')
                ->select('deals.name','codes.code_template AS template', 'codes.code_pdf AS pdf')
                ->where('deals.name','=', str_replace(' ', '-',$item_name))
                ->where('codes.available','=', 1)
                ->where('codes.code_template','=', $template)
                ->where('codes.code_pdf','=', $pdf)
                ->first();
            //var_dump($custom[0]);

            if($payment_status == 'Completed'){
                if(!IS_NULL($deal)){

                $purchase = new Purchase;
                $purchase->email = $sender_email;
                $purchase->code_template = $deal['template'];
                $purchase->code_pdf = $deal['pdf'];
                $purchase->transaction_id = $txn_id;
                $purchase->price = $payment_amount;
                $purchase->created_at = $date;
                $purchase->updated_at = $date;
                $purchase->save();

                $code = Code::where('code_template', '=',$deal['template'])
                              ->where('code_pdf', '=',$deal['pdf'])
                              ->first();
                $code->available = 0;
                $code->updated_at = $date;
                $code->save();
                 Mail::send('emails.deals.promoCode', $data = array('template'=>$deal['template'], 'pdf'=>$deal['pdf'], 'sender'=> $sender_email), function($message) use ($data) {
                     $message->attach('https://arad.wivert.net/emails/'.$data['pdf']);
                     $message->to($data['sender'])->subject('WiVert Coupon');
                 });
                }
                $exp_date = $date->add(new DateInterval("P1M"));
                $exp_date = $exp_date->format('d/m/Y');
               $details = array('txn' => $txn_id,
                                'name' => $item_name,
                                'email' => $sender_email,
                                'price' => $payment_amount,
                                'exp_date' => $exp_date );

            }

            // IPN message values depend upon the type of notification sent.
            // To loop through the &_POST array and print the NV pairs to the screen:
            foreach($_POST as $key => $value) {
               // echo $key." = ". $value."<br>";
            }
        } else if (strcmp ($res, "INVALID") == 0) {
            // IPN invalid, log for manual investigation
           // echo "The response from IPN was: <b>" .$res ."</b>";
        }

        return View::make('payment.status')
            ->with('hotspot',$hotspot)
            ->with('hp', $hp)
            ->with('details', $details);
    }

}