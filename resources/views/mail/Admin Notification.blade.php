<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Submitted</title>
</head>

<body style="margin:0; padding:0; background-color:#f3f4f6; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f3f4f6;">
    <tr>
        <td align="center" style="padding:40px 20px;">

            <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px; width:100%; background:#ffffff; border-radius:8px;">

                <!-- Top Accent -->
                <tr>
                    <td style="height:4px; background-color:#111827;"></td>
                </tr>

                <!-- Header -->
                <tr>
                    <td style="padding:30px 40px 10px 40px;">
                        <h2 style="margin:0; font-size:18px; font-weight:600; color:#111827;">
                            {{ $app_name ?? 'Marketplace Admin' }}
                        </h2>
                    </td>
                </tr>

                <!-- Title -->
                <tr>
                    <td style="padding:10px 40px 0 40px;">
                        <h1 style="margin:0; font-size:20px; font-weight:600; color:#111827;">
                            New Product Submitted
                        </h1>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding:20px 40px; font-size:15px; line-height:24px; color:#374151;">

                        <p style="margin:0 0 16px 0;">
                            A new product has been added and may require review.
                        </p>

                    </td>
                </tr>

                <!-- Info Box -->
                <tr>
                    <td style="padding:0 40px 20px 40px;">
                        <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e5e7eb; border-radius:6px;">
                            <tr>
                                <td style="padding:20px; font-size:14px; line-height:22px; color:#374151;">

                                    <strong>Seller Name</strong><br>
                                    {{ $seller_name }}<br><br>

                                    <strong>Seller ID</strong><br>
                                    #{{ $seller_id }}<br><br>

                                    <strong>Product Name</strong><br>
                                    {{ $product_name }}<br><br>

                                    <strong>Product ID</strong><br>
                                    #{{ $product_id }}<br><br>

                                    <strong>Submitted At</strong><br>
                                    {{ $submitted_at }}

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td align="left" style="padding:10px 40px 30px 40px;">
                        <a href="{{ $review_link ?? '#' }}"
                           style="background-color:#2563eb; color:#ffffff; text-decoration:none; padding:12px 22px; font-size:14px; font-weight:600; border-radius:6px; display:inline-block;">
                            Review Product
                        </a>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:20px 40px 40px 40px; font-size:12px; color:#6b7280;">
                        This is an automated notification from {{ $app_name ?? 'your marketplace system' }}.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
