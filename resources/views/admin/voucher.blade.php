<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="m-4">

        <table style="width: 100%;" class="header">
          <tr>
            <td style="width: 70%;">
              <img src="{{ asset('custom/img/logo.png') }}" alt="" style="width: 250px;">
            </td>
            <td class="">
              <div class="d-inline">Invoice# </div><br>
              <div class=" d-inline">Date: </div>
            </td>
          </tr>
          <tr>
            <td class="text-left">
              Customer Name: <br>
              Phone: <br>
              Email: <br>
            </td>
            <td class="" style="height: 90px;">
              Shipping Address<br>
              <hr>
              <div class="" style="height: 90px;">Address:</div>
            </td>
          </tr>

        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Product Name</th>
              <th>Product Quantity</th>
              <th>Unit Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>

            <?php for($i=1; $i<16; $i++) { ?>
              <tr>
                <td>{{ $i }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            <?php } ?>
            <tr>
              <td colspan="4" class="text-right"> <b>Total</b> </td>
              <td></td>
            </tr>
          </tbody>

        </table>
        <div class="" style="overflow: hidden;">
          <div class="mt-5 px-5 text-center mr-2" style="border-top: 1px dashed black; float: right;"> Vendor Signature</div>
        </div>

    </div>



  </body>
</html>
