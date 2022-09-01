
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Invoice</title>
  <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
    *{
      margin: 0;
      box-sizing: border-box;

    }
    body{
      background: #E0E0E0;
      font-family: 'Roboto', sans-serif;
      background-image: url('');
      background-repeat: repeat-y;
      background-size: 100%;
    }
    ::selection {background: #f31544; color: #FFF;}
    ::moz-selection {background: #f31544; color: #FFF;}
    h1{
      font-size: 1.5em;
      color: #222;
    }
    h2{font-size: .9em;}
    h3{
      font-size: 1.2em;
      font-weight: 300;
      line-height: 2em;
    }
    p{
      font-size: .7em;
      color: #666;
      line-height: 1.2em;
    }

    #invoiceholder{
      width:100%;
      hieght: 100%;
      padding-top: 50px;
    }
    #headerimage{
      z-index:-1;
      position:relative;
      top: -50px;
      height: 350px;
      background-image: url('http://michaeltruong.ca/images/invoicebg.jpg');

      -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
      -moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
      box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
      overflow:hidden;
      background-attachment: fixed;
      background-size: 1920px 80%;
      background-position: 50% -90%;
    }
    #invoice{
      position: relative;
      top: -290px;
      margin: 0 auto;
      width: 700px;
      background: #FFF;
    }

    [id*='invoice-']{ /* Targets all id with 'col-' */
      border-bottom: 1px solid #EEE;
      padding: 30px;
    }

    #invoice-top{min-height: 120px;}
    #invoice-mid{min-height: 120px;}
    #invoice-bot{ min-height: 270px;}

    .logo{
      float: left;
      height: 60px;
      width: 60px;
      background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
      background-size: 60px 60px;
    }
    .clientlogo{
      float: left;
      height: 60px;
      width: 60px;
      background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
      background-size: 60px 60px;
      border-radius: 50px;
    }
    .info{
      display: block;
      float:left;
      margin-left: 20px;
    }
    .title{
      float: right;
    }
    .title p{text-align: right;}
    #project{margin-left: 52%;}
    table{
      width: 100%;
      border-collapse: collapse;
    }
    td{
      padding: 5px 0 5px 15px;
      border: 1px solid #EEE
    }
    .tabletitle{
      padding: 5px;
      background: #EEE;
    }
    .service{border: 1px solid #EEE;}
    .item{width: 50%;}
    .itemtext{font-size: .9em;}

    #legalcopy{
      margin-top: 30px;
    }
    form{
      float:right;
      margin-top: 30px;
      text-align: right;
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



    .legal{
      width:70%;
    }
  </style>
</head>
<body>
  <div id="invoiceholder">

    <div id="headerimage"></div>
    <div id="invoice" class="effect2">
      
      <div id="invoice-top">
        <div class="logo"></div>
        <div class="info">
          <h2>BayarListrik</h2>
          <p> bayarlistrik@gmail.com </br>
              1111 2222 3333
          </p>
        </div><!--End Info-->
        <div class="title">
          <h1>Invoice # {{ $invoice->id_tagihan }}</h1>
          </p>
        </div><!--End Title-->
      </div><!--End InvoiceTop-->
  
  
      
      <div id="invoice-mid">
        
        <div class="clientlogo"></div>
        <div class="info">
          <h2>{{ Auth::user()->name }}</h2>
          <p>{{ Auth::user()->email }}</br>
        </div>  
  
      </div><!--End Invoice Mid-->
      
      <div id="invoice-bot">
        
        <div id="table">
          <table>
            <tr class="tabletitle">
              <td class="item"><h2>Jumlah Meter</h2></td>
              <td class="bulan"><h2>Bulan</h2></td>
              <td class="tahun"><h2>Tahun</h2></td>
              <td class="subtotal"><h2>Sub-total</h2></td>
            </tr>
            
            <tr class="service">
              <td class="tableitem"><p class="itemtext">{{ $invoice->jumlah_meter }} KWH</p></td>
              <td class="tableitem"><p class="itemtext">{{ $invoice->bulan }}</p></td>
              <td class="tableitem"><p class="itemtext">{{ $invoice->tahun }}</p></td>
              <td class="tableitem"><p class="itemtext">Rp.{{ number_format($invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467),0,',','.') }}</p></td>
            </tr>
              
            <tr class="tabletitle">
              <td></td>
              <td></td>
              <td class="Rate"><h2>Biaya Admin</h2></td>
              <td class="payment"><h2>Rp.{{ number_format((5/100) * $invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467) >= 30000 ? 30000 : ((5/100) * $invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467) <= 5000 ? 5000 : (5/100) * $invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467))) }}</h2></td>
            </tr>
            <tr class="tabletitle">
              <td></td>
              <td></td>
              <td class="Rate"><h2>Total</h2></td>
              <td class="payment"><h2>Rp.{{ number_format(((5/100) * $invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467) >= 30000 ? 30000 : ((5/100) * $invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467) <= 5000 ? 5000 : (5/100) * $invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467))) + ($invoice->jumlah_meter * ($invoice->kode_tarif == 1 ? 1352 : 1467))) }}</h2></td>
            </tr>
            
          </table>
        </div><!--End Table-->
        
        {{-- <form action="#" method="post">
          @csrf
          <p>Masukan Nomor Rekening Anda</p>
          <input type="number" name="no_rekening" value="" placeholder="0000-0000-0000" required><br>
          <button type="submit" class="" style="  
          background-color: #4CAF50; 
          border: none;
          color: white;
          margin-top:10px;
          padding: 10px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 10px;">Bayar</button>
        </form> --}}
        <form action="/pembayaran/{{ $invoice->id_tagihan }}" method="post" target="_blank">
          @csrf
          <p>Masukan Nomor Rekening Anda</p>
          <input type="number" name="rekening" value="" placeholder="0000-0000-0000" maxlength="12"
          oninput="javascript: if(this.value.length > this.maxLength)
          this.value = this.value.slice(0, this.maxLength);" 
          required><br>
          <button type="submit" class="" style="  
          background-color: #4CAF50; 
          border: none;
          color: white;
          margin-top:10px;
          padding: 10px 20px;   
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 10px;">Bayar</button>
        </form>

        <div id="legalcopy">
          <p class="legal">
            <strong>Biaya Admin dipotong 5% Up to 30k</strong>
          </p>
        </div>
        
      </div><!--End InvoiceBot-->
    </div><!--End Invoice-->
  </div>
</body>
</html>