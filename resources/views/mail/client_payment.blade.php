<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmed</title>
</head>

<body style="margin:0; padding:0; background-color:#f5f7fa; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f5f7fa;">
    <tr>
        <td align="center" style="padding:40px 20px;">

            <!-- Main Container -->
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background:#ffffff; border-radius:8px;">

                <!-- Top Accent Bar -->
                <tr>
                    <td style="height:4px; background-color:#2563eb;"></td>
                </tr>

                <!-- Header -->
                <tr>
                    <td style="padding:30px 40px 10px 40px;">
                        <h2 style="margin:0; font-size:18px; font-weight:600; color:#111827;">
                            {{ $app_name ?? 'Your Store' }}
                        </h2>
                    </td>
                </tr>

                <!-- Title -->
                <tr>
                    <td style="padding:10px 40px 0 40px;">
                        <h1 style="margin:0; font-size:22px; font-weight:600; color:#111827;">
                            Payment confirmed
                        </h1>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding:20px 40px; font-size:15px; line-height:24px; color:#374151;">

                        <p style="margin:0 0 12px 0;">
                            Hi {{ $customer_name ?? 'Customer' }},
                        </p>

                        <p style="margin:0 0 16px 0;">
                            We’ve successfully received your payment. Your order is now being processed.
                        </p>

                    </td>
                </tr>

                <!-- Order Summary Box -->
                <tr>
                    <td style="padding:0 40px 20px 40px;">
                        <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e5e7eb; border-radius:6px;">
                            <tr>
                                <td style="padding:20px; font-size:14px; line-height:22px; color:#374151;">

                                    <strong>Order ID</strong><br>
                                    #{{ $order_id }}<br><br>

                                    <strong>Total Paid</strong><br>
                                    ${{ $total_amount }}<br><br>

                                    <strong>Payment Method</strong><br>
                                    {{ $payment_method }}

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td align="left" style="padding:10px 40px 30px 40px;">
                        <a href="{{ $order_link ?? '#' }}"
                           style="background-color:#2563eb; color:#ffffff; text-decoration:none; padding:12px 22px; font-size:14px; font-weight:600; border-radius:6px; display:inline-block;">
                            View order
                        </a>
                    </td>
                </tr>

                <!-- Divider -->
                <tr>
                    <td style="padding:0 40px;">
                        <hr style="border:none; border-top:1px solid #e5e7eb;">
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:20px 40px 40px 40px; font-size:12px; line-height:18px; color:#6b7280;">
                        If you have any questions, contact us at
                        <a href="mailto:{{ $support_email ?? 'support@example.com' }}" style="color:#2563eb; text-decoration:none;">
                            {{ $support_email ?? 'support@example.com' }}
                        </a>.<br><br>

                        © {{ date('Y') }} vortex Your Store All rights reserved.
                    </td>
                </tr>

            </table>
            <!-- End Container -->

        </td>
    </tr>
</table>

</body>
</html>
