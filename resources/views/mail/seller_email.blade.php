<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Order Received</title>
</head>

<body style="margin:0; padding:0; background-color:#f3f4f6; font-family: Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center" style="padding:40px 20px;">

<table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background:#ffffff; border-radius:6px;">

<!-- Header -->
<tr>
<td style="padding:30px 30px 20px 30px; text-align:center;">
<h1 style="margin:0; font-size:20px; color:#111827; font-weight:600;">
{{ $app_name ?? 'Your Marketplace' }}
</h1>
</td>
</tr>

<!-- Main Message -->
<tr>
<td style="padding:10px 30px 20px 30px; color:#374151; font-size:16px; line-height:24px;">

<p style="margin:0 0 10px 0;">
Hello {{ $seller_name ?? 'Seller' }},
</p>

<p style="margin:0 0 15px 0;">
You’ve received a <strong>new order</strong>.
</p>

<p style="margin:0 0 20px 0;">
Order ID: <strong>#{{ $order_id ?? '000123' }}</strong>
</p>

</td>
</tr>

<!-- Order Summary Box -->
<tr>
<td style="padding:0 30px 20px 30px;">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:6px;">
<tr>
<td style="padding:20px; font-size:14px; color:#374151; line-height:22px;">

<strong>Customer:</strong> {{ $customer_name ?? 'John Doe' }}<br>
<strong>Product:</strong> {{ $product_name ?? 'Product Name' }}<br>
<strong>Quantity:</strong> {{ $quantity ?? '1' }}<br>
<strong>Total:</strong> ${{ $total_amount ?? '00.00' }}<br>
<strong>Payment Status:</strong> {{ $payment_status ?? 'Paid' }}

</td>
</tr>
</table>
</td>
</tr>

<!-- CTA -->
<tr>
<td align="center" style="padding:10px 30px 30px 30px;">
<a href="{{ $order_link ?? '#' }}" 
style="background-color:#16a34a; color:#ffffff; text-decoration:none; padding:14px 28px; font-size:15px; font-weight:bold; border-radius:5px; display:inline-block;">
View Order Details
</a>
</td>
</tr>

<!-- Footer -->
<tr>
<td style="padding:20px 30px 30px 30px; text-align:center; font-size:12px; color:#9ca3af; line-height:18px;">
Please process this order as soon as possible.<br><br>
© {{ date('Y') }} {{ $app_name ?? 'Your Marketplace' }}. All rights reserved.
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
