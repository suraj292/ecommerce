<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
      #background{
          position:absolute;
          z-index:0;
      }
      #bg-text
      {
          color:lightgrey;
          font-size:250px;
          transform:rotate(300deg);
          -webkit-transform:rotate(310deg);
      }
    </style>
  </head>
  <body>
    <header>

      <div>
      <h2 class="mx-auto" style="border-bottom: black 2px solid; width: 170px;">Tax Invoice</h2>
      </div>

      <!-- SELLER ONFORMATION -->
      <div class="row mt-4" style="border-bottom: black 2px solid;">
        <div class="col-8">
          <h6 class="font-weight-bold">HOUSE OF BHAVANA</h6>
          <p>
            <b>Ship from Address:</b>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore consectetur officia a facere, eligendi quis provident officiis est autem incidunt.
            <br>
            <b>GSTIN:</b> 06FSWPS2032H1ZB
          </p>
        </div>
        <div class="col-4">
          <div class="p-1 mr-3" style="border: 1px dotted black;">
              <b>Invoice Number #</b> 7418529630123456
          </div>
        </div>
      </div>
      <!-- user address -->
      <div class="row mt-2">
        <div class="col-4">
          <b>Order ID: OD221773083319252000</b>
          <br>
          <b>Order Date:</b> 16-11-2021
          <br>
          <b>Invoice Date</b> 16-11-2021
        </div>
        <div class="col-4">
          <b>Ship To {Name}</b> 
          <br>
          <b>Address: </b>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, laborum.
          <br>
          <b>Phone: </b> xxxxxxxxxx
        </div>
        <div class="col-4">
          *Keep this invoice and manufacturer box for warranty purposes.
        </div>
      </div>
    </header>

    <!-- Ordered Product -->
    <div class="mt-5">
      <table class="table">
        <!-- <thead> -->
          <tr style="border-top: 2px solid black; border-bottom: 2px solid black;">
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Qty</th>
            <th scope="col">Gross Amount</th>
            <th scope="col">Discount</th>
            <th scope="col">GST</th>
            <th scope="col">Total</th>
          </tr>
        <!-- </thead> -->
        <!-- <tbody> -->
          <tr style="border-bottom: 1px solid rgb(128, 128, 128);">
            <th scope="row">1</th>
            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea, debitis!</td>
            <td>2</td>
            <td>&#8377; 3000</td>
            <td>&#8377; 1000</td>
            <td>&#8377; 56</td>
            <td>&#8377; 2500</td>
          </tr>

          <tr>
            <th scope="row"></th>
            <th class="text-right" style="border-top: 1px solid;">Total</th>
            <th style="border-top: 1px solid;"></th>
            <th style="border-top: 1px solid;">&#8377; 3000</th>
            <th style="border-top: 1px solid;">&#8377; 1000</th>
            <th style="border-top: 1px solid;">&#8377; 56</th>
            <th style="border-top: 1px solid;">&#8377; 2500</th>
          </tr>
        <!-- </tbody> -->
      </table>
    </div>
    
    <div>
      <div style="border-bottom: 1px solid; margin-top: 100px;"></div>
      <p class="text-center">This is a computer generated invoice. No signature required.</p>
    </div>

    <footer class="fixed-bottom mb-3">
      <p>
        <b>Returns Policy: </b>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque quod laborum, soluta cum voluptates magni quis molestias error quasi atque.
      </p>
      <div style="border-bottom: 1px black dotted;">
        <strong>
          Contact : 9876543210 || www.houseofbhavana.in/support
        </strong>
      </div>
    </footer>

    <div id="background">
      <p id="bg-text">CANCELED</p>
    </div>

  </body>
</html>
