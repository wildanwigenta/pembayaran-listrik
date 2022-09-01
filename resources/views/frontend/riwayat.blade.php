<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
            *{
            margin: 0;
            box-sizing: border-box;
            -webkit-print-color-adjust: exact;
            }
            body{
            background: #E0E0E0;
            font-family: 'Roboto', sans-serif;
            }
            ::selection {background: #f31544; color: #FFF;}
            ::moz-selection {background: #f31544; color: #FFF;}
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }
            .col-left {
                float: left;
            }
            .col-right {
                float: right;
            }
            h1{
            font-size: 1.5em;
            color: #444;
            }
            h2{font-size: .9em;}
            h3{
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
            }
            p{
            font-size: .75em;
            color: #666;
            line-height: 1.2em;
            }
            a {
                text-decoration: none;
                color: #00a63f;
            }

            #invoiceholder{
            width:100%;
            height: 100%;
            padding: 50px 0;
            }
            #invoice{
            position: relative;
            margin: 0 auto;
            width: 700px;
            background: #FFF;
            }

            [id*='invoice-']{ /* Targets all id with 'col-' */
            /*  border-bottom: 1px solid #EEE;*/
            padding: 20px;
            }

            #invoice-top{border-bottom: 2px solid #00a63f;}
            #invoice-mid{min-height: 110px;}
            #invoice-bot{ min-height: 240px;}

            .logo{
                display: inline-block;
                vertical-align: middle;
                width: 110px;
                overflow: hidden;
            }
            .info{
                display: inline-block;
                vertical-align: middle;
                margin-left: 20px;
            }
            .logo img,
            .clientlogo img {
                width: 100%;
            }
            .clientlogo{
                display: inline-block;
                vertical-align: middle;
                width: 50px;
            }
            .clientinfo {
                display: inline-block;
                vertical-align: middle;
                margin-left: 20px
            }
            .title{
            float: right;
            }
            .title p{text-align: right;}
            #message{margin-bottom: 30px; display: block;}
            h2 {
                margin-bottom: 5px;
                color: #444;
            }
            .col-right td {
                color: #666;
                padding: 5px 8px;
                border: 0;
                font-size: 0.75em;
                border-bottom: 1px solid #eeeeee;
            }
            .col-right td label {
                margin-left: 5px;
                font-weight: 600;
                color: #444;
            }
            .cta-group a {
                display: inline-block;
                padding: 7px;
                border-radius: 4px;
                background: rgb(196, 57, 10);
                margin-right: 10px;
                min-width: 100px;
                text-align: center;
                color: #fff;
                font-size: 0.75em;
            }
            .cta-group .btn-primary {
                background: #00a63f;
            }
            .cta-group.mobile-btn-group {
                display: none;
            }
            table{
            width: 100%;
            border-collapse: collapse;
            }
            td{
                padding: 10px;
                border-bottom: 1px solid #cccaca;
                font-size: 0.70em;
                text-align: left;
            }

            .tabletitle th {
            border-bottom: 2px solid #ddd;
            text-align: right;
            }
            .tabletitle th:nth-child(2) {
                text-align: left;
            }
            th {
                font-size: 0.7em;
                text-align: left;
                padding: 5px 10px;
            }
            .item{width: 50%;}
            .list-item td {
                text-align: right;
            }
            .list-item td:nth-child(2) {
                text-align: left;
            }
            .total-row th,
            .total-row td {
                text-align: right;
                font-weight: 700;
                font-size: .75em;
                border: 0 none;
            }
            .table-main {
                
            }
            footer {
                border-top: 1px solid #eeeeee;;
                padding: 15px 20px;
            }
            .effect2
            {
            position: relative;
            }
            .effect2:before, .effect2:after
            {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 15px;
            left: 10px;
            width: 50%;
            top: 80%;
            max-width:300px;
            background: #777;
            -webkit-box-shadow: 0 15px 10px #777;
            -moz-box-shadow: 0 15px 10px #777;
            box-shadow: 0 15px 10px #777;
            -webkit-transform: rotate(-3deg);
            -moz-transform: rotate(-3deg);
            -o-transform: rotate(-3deg);
            -ms-transform: rotate(-3deg);
            transform: rotate(-3deg);
            }
            .effect2:after
            {
            -webkit-transform: rotate(3deg);
            -moz-transform: rotate(3deg);
            -o-transform: rotate(3deg);
            -ms-transform: rotate(3deg);
            transform: rotate(3deg);
            right: 10px;
            left: auto;
            }
            @media screen and (max-width: 767px) {
                h1 {
                    font-size: .9em;
                }
                #invoice {
                    width: 100%;
                }
                #message {
                    margin-bottom: 20px;
                }
                [id*='invoice-'] {
                    padding: 20px 10px;
                }
                .logo {
                    width: 140px;
                }
                .title {
                    float: none;
                    display: inline-block;
                    vertical-align: middle;
                    margin-left: 40px;
                }
                .title p {
                    text-align: left;
                }
                .col-left,
                .col-right {
                    width: 100%;
                }
                .table {
                    margin-top: 20px;
                }
                #table {
                    white-space: nowrap;
                    overflow: auto;
                }
                td {
                    white-space: normal;
                }
                .cta-group {
                    text-align: center;
                }
                .cta-group.mobile-btn-group {
                    display: block;
                    margin-bottom: 20px;
                }
                /*==================== Table ====================*/
                .table-main {
                    border: 0 none;
                }  
                .table-main thead {
                    border: none;
                    clip: rect(0 0 0 0);
                    height: 1px;
                    margin: -1px;
                    overflow: hidden;
                    padding: 0;
                    position: absolute;
                    width: 1px;
                }
                .table-main tr {
                    border-bottom: 2px solid #eee;
                    display: block;
                    margin-bottom: 20px;
                }
                .table-main td {
                    font-weight: 700;
                    display: block;
                    padding-left: 40%;
                    max-width: none;
                    position: relative;
                    border: 1px solid #cccaca;
                    text-align: left;
                }
                .table-main td:before {
                    /*
                    * aria-label has no advantage, it won't be read inside a table
                    content: attr(aria-label);
                    */
                    content: attr(data-label);
                    position: absolute;
                    left: 10px;
                    font-weight: normal;
                    text-transform: uppercase;
                }
                .total-row th {
                    display: none;
                }
                .total-row td {
                    text-align: left;
                }
                footer {text-align: center;}
            }
    </style>
</head>
<body>
    <div id="invoiceholder">
        <div id="invoice" class="effect2">
          
          <div id="invoice-top">
            <div class="logo"><img src="{{ asset('image')}}/logo.png" alt="Logo" style="width:50px"/></div>
            {{-- <div class="title">
              <h1>Invoice #<span class="invoiceVal invoice_num"></span></h1>
              <p>Invoice Date: <span id="invoice_date">01 Feb 2018</span><br>
                 GL Date: <span id="gl_date">23 Feb 2018</span>
              </p>
            </div><!--End Title--> --}}
          </div><!--End InvoiceTop-->
      
      
          
          <div id="invoice-mid">   
             <div class="cta-group mobile-btn-group">
                  <a href="javascript:void(0);" class="btn-primary">Approve</a>
                  <a href="javascript:void(0);" class="btn-default">Reject</a>
              </div> 
              <div class="clearfix">
                  <div class="col-left">
                      <div class="clientlogo"><img src="https://cdn3.iconfinder.com/data/icons/daily-sales/512/Sale-card-address-512.png" alt="Sup" /></div>
                      <div class="clientinfo">
                          <h2 id="supplier">{{ Auth::user()->name }}</h2>
                          <p>
                            <span id="address">{{ Auth::user()->email }}</span><br>
                            <span id="tax_num">{{ Auth::user()->nometer }}</span><br>
                          </p>
                      </div>
                  </div>
                  <div class="col-right">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td><span>Invoice Total</span><label id="invoice_total">{{ $riwayat->count() }}</label></td>
                                  <td><td colspan="2"><span>Note</span>#<label id="note">None</label></td></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>       
          </div><!--End Invoice Mid-->
          
          <div id="invoice-bot">
            
            <div id="table">
              <table class="table-main">
                <thead>    
                    <tr class="tabletitle">
                      <th>No Invoice</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Jumlah Meter</th>
                      <th>Total</th>
                    </tr>
                </thead>
                @php
                    $total = 0;
                @endphp
                @foreach ($riwayat as $row)
                    <tr class="list-item">
                        <td data-label="Type" class="tableitem">I{{ $row->id_tagihan }}</td>
                        <td data-label="Description" class="tableitem">{{ $row->bulan }}</td>
                        <td data-label="Quantity" class="tableitem">{{ $row->tahun }}</td>
                        <td data-label="Unit Price" class="tableitem">{{ $row->jumlah_meter }} KWH</td>
                        <td data-label="Taxable Amount" class="tableitem">Rp.{{ number_format($row->jumlah_meter * ($row->kode_tarif == 1 ? 1352 : 1467),0,',','.') }}</td>
                    </tr>
                    @php
                        $total += $row->jumlah_meter * ($row->kode_tarif == 1 ? 1352 : 1467);
                    @endphp
                @endforeach
                
                <tr class="list-item total-row">
                    <th colspan="4" class="tableitem">Grand Total</th>
                    <td data-label="Grand Total" style="float:right">Rp.{{ number_format($total) }}</td>
                </tr>
            </table>

            </div><!--End Table-->
            <div class="cta-group">
              <a href="javascript:void(0);" class="btn-primary" onclick="window.print()">Print</a>
          </div> 
            
          </div><!--End InvoiceBot-->
          <footer>
            <div id="legalcopy" class="clearfix">
              <p class="col-right">Our mailing address is:
                  <span class="email"><a href="mailto:info@lauwba.com">info@lauwba.com</a></span>
              </p>
            </div>
          </footer>
        </div><!--End Invoice-->
      </div><!-- End Invoice Holder-->
</body>
</html>
