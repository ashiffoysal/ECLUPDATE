@if($data->childCareFees=='on')
<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

      
        tr:nth-child(even) {
    background-color: #ffffff;
}
    </style>
</head>

<body style="margin: 0px; padding: 0px;font-family:serif;">
    <div class="print_page" style="background-color: #ffffff;padding: 5px 10px;margin-top:100px">
        <div class="header">
            <style>
                .print_page {
                    width: 900px;
                    margin: 0px auto;
                    position: relative;
                    top: 60px;
                    border-radius: 10px;
                    border: 1px solid #c3c3c3;
                }

                .header {
                    width: 100%;
                    display: flex;
                }

                .logo {
                    width: 20%;
                    text-align: left;
                }

                .recpt {
                    width: 60%;
                    text-align: center;
                }

                .recpt h5 {
                    background-color: red;
                    /* padding: 15px 90px; */
                    border-radius: 50px;
                    width: 230px;
                    height: 50px;
                    font-size: 20px;
                    line-height: 50px;
                    color: #fff;
                    display: inline-block;
                }

                .code {
                    width: 20%;
                    text-align: right;
                }

                .code h5 {
                    border: 1px solid #acacac;
                    border-radius: 50px;
                    display: inline-block;
                    width: 100px;
                    height: 30px;
                    line-height: 30px;
                    font-size: 16px;
                    position: relative;
                    top: 15px;

                }

                .logo img {
                    width: 200px;
                    height: auto;
                    position: relative;
                    top: 8px;
                    right: 10px;
                }
            </style>
            <div class="logo" style="text-align: center;">
                <img src="https://merittutors.co.uk/uploads/logo/logo_1648033550.png" alt="">
            </div>
            <div class="recpt">
                <h5 style="text-align: center;">Receipt</h5>
            </div>
            <div class="code">
                <h5 style="text-align: center;">No: {{ $data->receiptNumber}}</h5>
            </div>
        </div>
        <style>
            .bor {
                width: 100%;
                border: 1px solid #e1e1e1;
                margin-bottom: 18px;
            }
        </style>
        <div class="bor"></div>
        <div class="payment">
            <style>
                .payment {
                    width: 100%;
                    display: inline-flex;
                }

                .type {
                    width: 70%;

                }

                .date {
                    width: 28%;
                }
            </style>
            <div class="type">
                      <style>
                    .cash {
                        display: inline-block;
                        font-weight: 600;
                        width: 18px;
                        height: 18px;
                        border: 1px solid #acacac;
                        border-radius: 4px;
                        position: relative;
                        bottom: 2px;
                    }

                    .date {
                        position: relative;
                        left: 15px;
                        height: 36px;
                        border: 1px solid #acacac;
                        border-radius: 7px;
                    }

                    .date h5 {
                        position: relative;
                        bottom: 17px;
                        left: 10px;
                        font-size: 16px;
                    }

                    .pm_typ h5 {
                        display: inline-block;
                        position: relative;
                        bottom: 7px;
                        font-size: 16px;
                    }



                    .pm_typ {
                        width: 100%;
                        height: 36px;
                        border: 1px solid #acacac;
                        border-radius: 7px;
                    }

                    .pm_typ2 {
                        position: relative;
                        bottom: 12px;
                        left: 10px;
                    }
                </style>
                <div class="pm_typ">
                    <div class="pm_typ2">
                        <h5>Payment Type:</h5>

                        <span class="chk">
                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Cash" name="Cash" value="Cash" @if($data->paymentType=='Cash') checked @endif>
                                <label for="Cash"><b>Cash</b></label>
                            </span>

                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Card" name="Card" value="Card" @if($data->paymentType=='Card') checked @endif>
                                <label for="Card"><b>Card</b></label>
                            </span>
                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Bacs" name="Bacs" value="Bacs" @if($data->paymentType=='Bacs') checked @endif>
                                <label for="Bacs"><b>Bacs</b></label>
                            </span>

                        </span>

                    </div>
                </div>


            </div>
            <div class="date">
                <h5>Date: {{ Carbon\Carbon::parse($data->date)->format('d/m/Y'); }}</h5>
            </div>
        </div>
        <div class="name">
            <style>
                .name {
                    display: inline-flex;
                    width: 100%;
                }

                .nm {
                    width: 70%;
                    border: 1px solid #acacac;
                    height: 36px;
                    border-radius: 7px;
                }

                .dt {
                    width: 28%;
                    border: 1px solid #acacac;
                    height: 36px;
                    border-radius: 7px;
                    position: relative;
                    left: 13px;
                }

                .nm h5 {
                    position: relative;
                    bottom: 17px;
                    left: 10px;
                    font-size: 16px;
                }

                .dt h5 {
                    position: relative;
                    bottom: 17px;
                    left: 10px;
                    font-size: 16px;
                }
            </style>
            <div class="nm">
                <h5>Name:{{ $data->student_name }}</h5>
            </div>
            <div class="dt">
                <h5>ID/Year: {{ $data->yearId }}</h5>

            </div>
        </div>
        <div class="tbl">
            <style>
                .tbl {
                    margin-top: 20px;
                    width: 100%;
                    display: inline-flex;
                }

                .dtls {
                    width: 10%;
                }

                .tble {
                    width: 80%;
                }

                .amnt {
                    width: 10%;
                }

                .box2 {
                    display: inline-block;
                    font-weight: 600;
                    width: 18px;
                    height: 18px;
                    border: 1px solid #acacac;
                    border-radius: 4px;
                    position: relative;
                    top: 2px;
                }


                .tble b {
                    position: relative;
                    bottom: 2px;
                    left: 5px;
                }

                .dtls h5 {
                    font-size: 18px;
                    background: red;
                    color: #fff;
                    width: 200ox;
                    width: 100px;
                    height: 40px;
                    line-height: 40px;
                    text-align: center;
                    border-radius: 50px;
                    transform: rotate(-90deg);
                    position: relative;
                    top: -8px;
                    right: 19px;
                }

                .amnt h5 {
                    font-size: 18px;
                    background: #00b305;
                    color: #fff;
                    width: 200ox;
                    width: 100px;
                    height: 40px;
                    line-height: 40px;
                    text-align: center;
                    border-radius: 50px;
                    transform: rotate(-90deg);
                    position: relative;
                    top: -13px;
                    right: -8px;
                }
            </style>
            <div class="dtls">
                <h5>Details</h5>
            </div>
            <div class="tble">
                <table>


                    <tr>
                        <td>

                            <input type="checkbox" id="Care" name="Care" value="Care" @if($data->childCareFees=='on') checked @endif>
                            <label for="Care"><b>Child Care Fees</b></label>
                        </td>
                       
                        <td>{{ Carbon\Carbon::parse($data->childcareFromdate)->format('d/m/Y') }} to {{ Carbon\Carbon::parse($data->childcareTodate)->format('d/m/Y') }}</td>
                        <td> £ {{ $data->childCareFeesAmount }}</td>
                    </tr>

                    <td>
                        <div class="box2"></div> <b>Total</b>
                    </td>
                    <td></td>
                    <td>{{ $data->totalAmount }}</td>
                    </tr>
                </table>
            </div>
            <div class="amnt">
                <h5>Amount</h5>
            </div>
        </div>
        <div class="rcsub">
            <style>
                .rcsub {
                    width: 100%;
                    display: inline-flex;
                    position: relative;
                    bottom: 7px;
                }

                .rcvd {
                    width: 50%;
                }

                .rcvd h5 {
                    font-size: 16px;
                }

                .dot {
                    display: inline-flex;
                    width: 337px;
                    border: 1px dotted #777777;
                    border-radius: 40px;
                    position: relative;
                    top: 8px;
                }

                .sbmt {
                    width: 50%;
                }

                .sbmt h5 {
                    font-size: 16px;
                }
            </style>
            <div class="rcvd">
                <h5>Recieved By: {{ $data->receivedBy  }}
                </h5>
            </div>
            <div class="sbmt">
                <h5>Signature: <div class="dot"></div>
                </h5>
            </div>
        </div>
        <div class="addres">
            <style>
                .footer {
                    width: 100%;
                    display: inline-flex;
                    margin-top: 10px;
                }

                .loc {
                    width: 27%;
                }

                .loc span {
                    font-size: 16px;

                }

                .phn {
                    width: 25%;
                }

                .phn span {
                    font-size: 16px;
                    margin-left:10px;

                }

                .web {
                    width: 25%;
                }

                .web span {
                    font-size: 16px;

                }

                .mail {
                    width: 23%;
                }

                .mail span {
                    font-size: 16px;

                }

                span img {
                    width: 13px;
                    height: 13px;
                }
            </style>
            <div class="footer">
                     @if($data->branch==1)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">54 Upton Lane, London E7 9LN</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 616 2526</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
                @if($data->branch==2)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">269 Ilford Lane Ilford IG1 2SD</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 478 9988</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
                @if($data->branch==3)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">2-4 Cumberland Road London E13 8NH</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 157 9926</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
            </div>
        </div>
    </div>

<div class="print_page" style="background-color: #ffffff;padding: 5px 10px;margin-top:150px">
        <div class="header">
            <style>
                .print_page {
                    width: 900px;
                    margin: 0px auto;
                    position: relative;
                    top: 60px;
                    border-radius: 10px;
                    border: 1px solid #c3c3c3;
                }

                .header {
                    width: 100%;
                    display: flex;
                }

                .logo {
                    width: 20%;
                    text-align: left;
                }

                .recpt {
                    width: 60%;
                    text-align: center;
                }

                .recpt h5 {
                    background-color: red;
                    /* padding: 15px 90px; */
                    border-radius: 50px;
                    width: 230px;
                    height: 50px;
                    font-size: 20px;
                    line-height: 50px;
                    color: #fff;
                    display: inline-block;
                }

                .code {
                    width: 20%;
                    text-align: right;
                }

                .code h5 {
                    border: 1px solid #acacac;
                    border-radius: 50px;
                    display: inline-block;
                    width: 100px;
                    height: 30px;
                    line-height: 30px;
                    font-size: 16px;
                    position: relative;
                    top: 15px;

                }

                .logo img {
                    width: 200px;
                    height: auto;
                    position: relative;
                    top: 8px;
                    right: 10px;
                }
            </style>
            <div class="logo" style="text-align: center;">
                <img src="https://merittutors.co.uk/uploads/logo/logo_1648033550.png" alt="">
            </div>
            <div class="recpt">
                <h5 style="text-align: center;">Receipt</h5>
            </div>
            <div class="code">
                <h5 style="text-align: center;">No: {{ $data->receiptNumber}}</h5>
            </div>
        </div>
        <style>
            .bor {
                width: 100%;
                border: 1px solid #e1e1e1;
                margin-bottom: 18px;
            }
        </style>
        <div class="bor"></div>
        <div class="payment">
            <style>
                .payment {
                    width: 100%;
                    display: inline-flex;
                }

                .type {
                    width: 70%;

                }

                .date {
                    width: 28%;
                }
            </style>
            <div class="type">
                      <style>
                    .cash {
                        display: inline-block;
                        font-weight: 600;
                        width: 18px;
                        height: 18px;
                        border: 1px solid #acacac;
                        border-radius: 4px;
                        position: relative;
                        bottom: 2px;
                    }

                    .date {
                        position: relative;
                        left: 15px;
                        height: 36px;
                        border: 1px solid #acacac;
                        border-radius: 7px;
                    }

                    .date h5 {
                        position: relative;
                        bottom: 17px;
                        left: 10px;
                        font-size: 16px;
                    }

                    .pm_typ h5 {
                        display: inline-block;
                        position: relative;
                        bottom: 7px;
                        font-size: 16px;
                    }



                    .pm_typ {
                        width: 100%;
                        height: 36px;
                        border: 1px solid #acacac;
                        border-radius: 7px;
                    }

                    .pm_typ2 {
                        position: relative;
                        bottom: 12px;
                        left: 10px;
                    }
                </style>
                <div class="pm_typ">
                    <div class="pm_typ2">
                        <h5>Payment Type:</h5>

                        <span class="chk">
                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Cash" name="Cash" value="Cash" @if($data->paymentType=='Cash') checked @endif>
                                <label for="Cash"><b>Cash</b></label>
                            </span>

                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Card" name="Card" value="Card" @if($data->paymentType=='Card') checked @endif>
                                <label for="Card"><b>Card</b></label>
                            </span>
                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Bacs" name="Bacs" value="Bacs" @if($data->paymentType=='Bacs') checked @endif>
                                <label for="Bacs"><b>Bacs</b></label>
                            </span>

                        </span>

                    </div>
                </div>


            </div>
            <div class="date">
                <h5>Date: {{ Carbon\Carbon::parse($data->date)->format('d/m/Y'); }}</h5>
            </div>
        </div>
        <div class="name">
            <style>
                .name {
                    display: inline-flex;
                    width: 100%;
                }

                .nm {
                    width: 70%;
                    border: 1px solid #acacac;
                    height: 36px;
                    border-radius: 7px;
                }

                .dt {
                    width: 28%;
                    border: 1px solid #acacac;
                    height: 36px;
                    border-radius: 7px;
                    position: relative;
                    left: 13px;
                }

                .nm h5 {
                    position: relative;
                    bottom: 17px;
                    left: 10px;
                    font-size: 16px;
                }

                .dt h5 {
                    position: relative;
                    bottom: 17px;
                    left: 10px;
                    font-size: 16px;
                }
            </style>
            <div class="nm">
                <h5>Name:{{ $data->student_name }}</h5>
            </div>
            <div class="dt">
                <h5>ID/Year: {{ $data->yearId }}</h5>

            </div>
        </div>
        <div class="tbl">
            <style>
                .tbl {
                    margin-top: 20px;
                    width: 100%;
                    display: inline-flex;
                }

                .dtls {
                    width: 10%;
                }

                .tble {
                    width: 80%;
                }

                .amnt {
                    width: 10%;
                }

                .box2 {
                    display: inline-block;
                    font-weight: 600;
                    width: 18px;
                    height: 18px;
                    border: 1px solid #acacac;
                    border-radius: 4px;
                    position: relative;
                    top: 2px;
                }


                .tble b {
                    position: relative;
                    bottom: 2px;
                    left: 5px;
                }

                .dtls h5 {
                    font-size: 18px;
                    background: red;
                    color: #fff;
                    width: 200ox;
                    width: 100px;
                    height: 40px;
                    line-height: 40px;
                    text-align: center;
                    border-radius: 50px;
                    transform: rotate(-90deg);
                    position: relative;
                    top: -8px;
                    right: 19px;
                }

                .amnt h5 {
                    font-size: 18px;
                    background: #00b305;
                    color: #fff;
                    width: 200ox;
                    width: 100px;
                    height: 40px;
                    line-height: 40px;
                    text-align: center;
                    border-radius: 50px;
                    transform: rotate(-90deg);
                    position: relative;
                    top: -13px;
                    right: -8px;
                }
            </style>
            <div class="dtls">
                <h5>Details</h5>
            </div>
            <div class="tble">
                <table>


                    <tr>
                       <td>

                            <input type="checkbox" id="Care" name="Care" value="Care" @if($data->childCareFees=='on') checked @endif>
                            <label for="Care"><b>Child Care Fees</b></label>
                        </td>
                        <td>{{ Carbon\Carbon::parse($data->childcareFromdate)->format('d/m/Y') }} to {{ Carbon\Carbon::parse($data->childcareTodate)->format('d/m/Y') }}</td>
                        <td> £ {{ $data->childCareFeesAmount }}</td>
                    </tr>

                    <td>
                        <div class="box2"></div> <b>Total</b>
                    </td>
                    <td></td>
                    <td>{{ $data->totalAmount }}</td>
                    </tr>
                </table>
            </div>
            <div class="amnt">
                <h5>Amount</h5>
            </div>
        </div>
        <div class="rcsub">
            <style>
                .rcsub {
                    width: 100%;
                    display: inline-flex;
                    position: relative;
                    bottom: 7px;
                }

                .rcvd {
                    width: 50%;
                }

                .rcvd h5 {
                    font-size: 16px;
                }

                .dot {
                    display: inline-flex;
                    width: 337px;
                    border: 1px dotted #777777;
                    border-radius: 40px;
                    position: relative;
                    top: 8px;
                }

                .sbmt {
                    width: 50%;
                }

                .sbmt h5 {
                    font-size: 16px;
                }
            </style>
            <div class="rcvd">
                <h5>Recieved By: {{ $data->receivedBy  }}
                </h5>
            </div>
            <div class="sbmt">
                <h5>Signature: <div class="dot"></div>
                </h5>
            </div>
        </div>
        <div class="addres">
            <style>
                .footer {
                    width: 100%;
                    display: inline-flex;
                    margin-top: 10px;
                }

                .loc {
                    width: 27%;
                }

                .loc span {
                    font-size: 16px;

                }

                .phn {
                    width: 25%;
                }

                .phn span {
                    font-size: 16px;

                }

                .web {
                    width: 25%;
                }

                .web span {
                    font-size: 16px;

                }

                .mail {
                    width: 23%;
                }

                .mail span {
                    font-size: 16px;

                }

                span img {
                    width: 13px;
                    height: 13px;
                }
            </style>
            <div class="footer">
                      @if($data->branch==1)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">54 Upton Lane, London E7 9LN</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 616 2526</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
                @if($data->branch==2)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">269 Ilford Lane Ilford IG1 2SD</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 478 9988</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
                @if($data->branch==3)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">2-4 Cumberland Road London E13 8NH</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 157 9926</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
            </div>
        </div>
    </div>

</body>

</html>


@else
<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>

<body style="margin: 0px; padding: 0px;font-family:serif;">
    <div class="print_page" style="background-color: #ffffff;padding: 5px 10px">
        <div class="header">
            <style>
                .print_page {
                    width: 900px;
                    margin: 0px auto;
                    position: relative;
                    top: 60px;
                    border-radius: 10px;
                    border: 1px solid #c3c3c3;
                }

                .header {
                    width: 100%;
                    display: flex;
                }

                .logo {
                    width: 20%;
                    text-align: left;
                }

                .recpt {
                    width: 60%;
                    text-align: center;
                }

                .recpt h5 {
                    background-color: red;
                    /* padding: 15px 90px; */
                    border-radius: 50px;
                    width: 230px;
                    height: 50px;
                    font-size: 20px;
                    line-height: 50px;
                    color: #fff;
                    display: inline-block;
                }

                .code {
                    width: 20%;
                    text-align: right;
                }

                .code h5 {
                    border: 1px solid #acacac;
                    border-radius: 50px;
                    display: inline-block;
                    width: 100px;
                    height: 30px;
                    line-height: 30px;
                    font-size: 16px;
                    position: relative;
                    top: 15px;

                }

                .logo img {
                    width: 200px;
                    height: auto;
                    position: relative;
                    top: 8px;
                    right: 10px;
                }
            </style>
            <div class="logo" style="text-align: center;">
                <img src="https://merittutors.co.uk/uploads/logo/logo_1648033550.png" alt="">
            </div>
            <div class="recpt">
                <h5 style="text-align: center;">Receipt</h5>
            </div>
            <div class="code">
                <h5 style="text-align: center;">No: {{ $data->receiptNumber }}</h5>
            </div>
        </div>
        <style>
            .bor {
                width: 100%;
                border: 1px solid #e1e1e1;
                margin-bottom: 18px;
            }
        </style>
        <div class="bor"></div>
        <div class="payment">
            <style>
                .payment {
                    width: 100%;
                    display: inline-flex;
                }

                .type {
                    width: 70%;

                }

                .date {
                    width: 28%;
                }
            </style>
            <div class="type">
                <style>
                    .cash {
                        display: inline-block;
                        font-weight: 600;
                        width: 18px;
                        height: 18px;
                        border: 1px solid #acacac;
                        border-radius: 4px;
                        position: relative;
                        bottom: 2px;
                    }

                    .date {
                        position: relative;
                        left: 15px;
                        height: 36px;
                        border: 1px solid #acacac;
                        border-radius: 7px;
                    }

                    .date h5 {
                        position: relative;
                        bottom: 17px;
                        left: 10px;
                        font-size: 16px;
                    }

                    .pm_typ h5 {
                        display: inline-block;
                        position: relative;
                        bottom: 7px;
                        font-size: 16px;
                    }



                    .pm_typ {
                        width: 100%;
                        height: 36px;
                        border: 1px solid #acacac;
                        border-radius: 7px;
                    }

                    .pm_typ2 {
                        position: relative;
                        bottom: 12px;
                        left: 10px;
                    }
                </style>
                <div class="pm_typ">
                    <div class="pm_typ2">
                        <h5>Payment Type:</h5>

                        <span class="chk">
                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Cash" name="Cash" value="Cash" @if($data->paymentType=='Cash') checked @endif>
                                <label for="Cash"><b>Cash</b></label>
                            </span>

                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Card" name="Card" value="Card" @if($data->paymentType=='Card') checked @endif>
                                <label for="Card"><b>Card</b></label>
                            </span>
                            <span style="position: relative;
                            bottom: 2px;
                            left: 10px;
                            margin: 26px;"><input type="checkbox" id="Bacs" name="Bacs" value="Bacs" @if($data->paymentType=='Bacs') checked @endif>
                                <label for="Bacs"><b>Bacs</b></label>
                            </span>

                        </span>

                    </div>
                </div>


            </div>
            <div class="date">
                <h5>Date: {{ Carbon\Carbon::parse($data->created_at)->format('d/m/Y'); }}</h5>
            </div>
        </div>
        <div class="name">
            <style>
                .name {
                    display: inline-flex;
                    width: 100%;
                }

                .nm {
                    width: 70%;
                    border: 1px solid #acacac;
                    height: 36px;
                    border-radius: 7px;
                }

                .dt {
                    width: 28%;
                    border: 1px solid #acacac;
                    height: 36px;
                    border-radius: 7px;
                    position: relative;
                    left: 13px;
                }

                .nm h5 {
                    position: relative;
                    bottom: 17px;
                    left: 10px;
                    font-size: 16px;
                }

                .dt h5 {
                    position: relative;
                    bottom: 17px;
                    left: 10px;
                    font-size: 16px;
                }
            </style>
            <div class="nm">
                <h5>Name: {{ $data->student_name }}</h5>
            </div>
            <div class="dt">
                <h5>ID/Year: {{ $data->yearId }}</h5>

            </div>
        </div>
        <div class="tbl">
            <style>
                .tbl {
                    margin-top: 20px;
                    width: 100%;
                    display: inline-flex;
                }

                .dtls {
                    width: 10%;
                }

                .tble {
                    width: 80%;
                }

                .amnt {
                    width: 10%;
                }

                .box2 {
                    display: inline-block;
                    font-weight: 600;
                    width: 18px;
                    height: 18px;
                    border: 1px solid #acacac;
                    border-radius: 4px;
                    position: relative;
                    top: 2px;
                }


                .tble b {
                    position: relative;
                    bottom: 2px;
                    left: 5px;
                }

                .dtls h5 {
                    font-size: 20px;
                    background: red;
                    color: #fff;
                    width: 200ox;
                    width: 288px;
                    height: 60px;
                    line-height: 60px;
                    text-align: center;
                    border-radius: 50px;
                    transform: rotate(-90deg);
                    position: relative;
                    top: 80px;
                    right: 112px;
                }

                .amnt h5 {
                    font-size: 20px;
                    background: #00b305;
                    color: #fff;
                    width: 200ox;
                    width: 288px;
                    height: 60px;
                    line-height: 60px;
                    text-align: center;
                    border-radius: 50px;
                    transform: rotate(-90deg);
                    position: relative;
                    top: 79px;
                    right: 87px;
                }
            </style>
            <div class="dtls">
                <h5>Details</h5>
            </div>
            <div class="tble">
                <table>

                    <tr>
                        <td style="width: 300px;">

                            <input type="checkbox" id="tution" name="tution" value="Bike" @if($data->tuitionFees=='on') checked @endif>
                            <label for="tution"><b>Tuition Fees</b></label>
                        </td>
                        <td>{{ $data->tuitionfeeDetails }}</td>
                        <td>@if($data->tuitionFeesAmount !=null) £ {{ $data->tuitionFeesAmount }} @endif</td>
                    </tr>
                    <tr>
                        <td>

                            <input type="checkbox" id="Admission" name="Admission" value="Admission" @if($data->admissionFees=='on') checked @endif>
                            <label for="Admission"><b>Admission Fees</b></label>
                        </td>
                        <td></td>
                        <td>@if($data->admissionFeesAmount !=null)£ {{ $data->admissionFeesAmount }} @endif</td>
                    </tr>
                    <tr>
                        <td>

                            <input type="checkbox" id="Care" name="Care" value="Care" @if($data->childCareFees=='on') checked @endif>
                            <label for="Care"><b>Child Care Fees</b></label>
                        </td>
                        <td></td>
                        <td>@if($data->childCareFeesAmount !=null)£ {{ $data->childCareFeesAmount }} @endif</td>
                    </tr>
                    <tr>
                        <td>

                            <input type="checkbox" id="exfees" name="exfees" value="exfees"  @if($data->examFees=='on') checked @endif>
                            <label for="exfees"><b>Examination Fees</b></label>
                        </td>
                        <td></td>
                        <td>@if($data->examFeesAmount !=null)£ {{ $data->examFeesAmount }} @endif</td>
                    </tr>
                    <tr>
                        <td>

                            <input type="checkbox" id="refund" name="refund" value="refund"  @if($data->deposit=='on') checked @endif>
                            <label for="refund"><b>Refundable Deposite</b></label>
                        </td>
                        <td></td>
                        <td>@if($data->depositAmount !=null)£ {{ $data->depositAmount }} @endif</td>
                    </tr>
                    <tr>
                        <td>

                            <input type="checkbox" id="resource" name="resource" value="resource" @if($data->resources=='on') checked @endif>
                            <label for="resource"><b>Resouces</b></label>
                        </td>
                        <td>{{ $data->resourcesFeesDetails }}</td>
                        <td>@if($data->resourcesAmount !=null)£{{ $data->resourcesAmount }} @endif</td>
                    </tr>
                    <tr>
                        <td>

                            <input type="checkbox" id="total" name="total" value="total">
                            <label for="total"><b>Total</b></label>
                        </td>
                        <td></td>
                        <td>{{ $data->totalAmount }}</td>
                    </tr>
                </table>
            </div>
            <div class="amnt">
                <h5>Amount</h5>
            </div>
        </div>
        <div class="rcsub">
            <style>
                .rcsub {
                    width: 100%;
                    display: inline-flex;
                    margin-top: 30px;
                }


                .rcvd {
                    width: 50%;
                }

                .rcvd h5 {
                    font-size: 16px;
                }

                .dot {
                    display: inline-flex;
                    width: 337px;
                    border: 1px dotted #777777;
                    border-radius: 40px;
                    position: relative;
                    top: 8px;
                }

                .sbmt {
                    width: 50%;
                }

                .sbmt h5 {
                    font-size: 16px;
                }
            </style>
            <div class="rcvd">
                <h5>Recieved By: {{ $data->receivedBy  }}
                </h5>
            </div>
            <div class="sbmt">
                <h5>Signature: <div class="dot"></div>
                </h5>
            </div>
        </div>
        <div class="addres">
            <style>
                .footer {
                    width: 100%;
                    display: inline-flex;
                    margin-top: 10px;
                }

                .loc {
                    width: 27%;
                }

                .loc span {
                    font-size: 16px;

                }

                .phn {
                    width: 25%;
                }

                .phn span {
                    font-size: 16px;

                }

                .web {
                    width: 25%;
                }

                .web span {
                    font-size: 16px;

                }

                .mail {
                    width: 23%;
                }

                .mail span {
                    font-size: 16px;

                }

                span img {
                    width: 13px;
                    height: 13px;
                }
            </style>
            <div class="footer">
                 @if($data->branch==1)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">54 Upton Lane, London E7 9LN</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 616 2526</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
                @if($data->branch==2)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">269 Ilford Lane Ilford IG1 2SD</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 478 9988</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
                @if($data->branch==3)
                <div class="loc">
                    <span> <img src="{{ asset('frontend/invoice/location.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 5px;
                    font-size: 16px;">2-4 Cumberland Road London E13 8NH</span>

                </div>
                <div class="phn">
                    <span> <img src="{{ asset('frontend/invoice/call.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 2px;
                    left: 0px;
                    font-size: 16px;">0208 157 9926</span>
                </div>
                <div class="web">
                    <span><img src="{{ asset('frontend/invoice/web.jpeg') }}" alt=""></span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">www.merittutors.co.uk</span>
                </div>
                <div class="mail">
                    <span><img src="{{ asset('frontend/invoice/mail.jpeg') }}" alt=""> </span> <span style="position: relative;
                    bottom: 4px;
                    left: 5px;
                    font-size: 16px;">info@merittutors.co.uk</span>
                </div>
                @endif
            </div>
        </div>
    </div>
    
<script>
    // Print the invoice
    window.onload = function() {
        window.print();
    };
</script>
</body>

</html>
@endif

