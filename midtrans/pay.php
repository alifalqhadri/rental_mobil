<?php
require_once '../vendor/autoload.php';
require_once '../koneksi.php';
require_once __DIR__ . '/config.php';

$id_user = $_GET['id_user']; // Ensure to sanitize and validate this input
$id_pembayaran = $_GET['id_pembayaran']; // Ensure to sanitize and validate this input

if (!$conn) {
    echo "
    <script>
    alert('Terima kasih sudah Booking');
    window.location = '../';
    </script>
    ";
    exit();
}

\Midtrans\Config::$serverKey = MIDTRANS_SERVER_KEY;
\Midtrans\Config::$isProduction = false; // Change to true for production
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => $id_pembayaran, // Ensure this is unique for each transaction
        'gross_amount' => 10000, // Example amount
    ),
    'customer_details' => array(
        'first_name' => 'Budi', // Replace with actual customer details
        'last_name' => 'Utomo',
        'email' => 'budi.utomo@example.com',
        'phone' => '08111222333',
    ),
);

try {
    $snapToken = \Midtrans\Snap::getSnapToken($params);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?=MIDTRANS_CLIENT_KEY?>"></script>
  <!-- Replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>
  <button id="pay-button">Pay!</button>
  <div id="snap-container"></div>

  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('<?=$snapToken?>', {
        embedId: 'snap-container',
        onSuccess: function (result) {
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    });
  </script>
</body>

</html>
