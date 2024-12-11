<?= $this->extend('Admin/others/email-templates/layout-email/master') ?>

<?= $this->section('style') ?>
<style type="text/css">
    body {
        text-align: center;
        margin: 0 auto;
        width: 650px;
        font-family: work-Sans, sans-serif;
        background-color: #f6f7fb;
        display: block;
    }

    ul {
        margin: 0;
        padding: 0;
    }

    li {
        display: inline-block;
        text-decoration: unset;
    }

    a {
        text-decoration: none;
    }

    p {
        margin: 15px 0;
    }

    h5 {
        color: #444;
        text-align: left;
        font-weight: 400;
    }

    .text-center {
        text-align: center
    }

    .main-bg-light {
        background-color: #fafafa;
        box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
    }

    .title {
        color: #444444;
        font-size: 22px;
        font-weight: bold;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-bottom: 0;
        text-transform: uppercase;
        display: inline-block;
        line-height: 1;
    }

    table {
        margin-top: 30px
    }

    table.top-0 {
        margin-top: 0;
    }

    table.order-detail,
    .order-detail th,
    .order-detail td {
        border: 1px solid #ddd;
        border-collapse: collapse;
    }

    .order-detail th {
        font-size: 16px;
        padding: 15px;
        text-align: center;
    }

    .footer-social-icon tr td img {
        margin-left: 5px;
        margin-right: 5px;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('email-content') ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
    <tbody>
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td><img src="<?=base_url()?>/assets/images/email-template/delivery.png" alt="" style=";margin-bottom: 30px;"></td>
                        </tr>
                        <tr>
                            <td><img src="<?=base_url()?>/assets/images/email-template/success.png" alt=""></td>
                        </tr>
                        <tr>
                            <td>
                                <h2 class="title">thank you</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Payment Is Successfully Processsed And Your Order Is On The Way</p>
                                <p>Transaction ID:267676GHERT105467</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="border-top:1px solid #777;height:1px;margin-top: 30px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="<?=base_url()?>/assets/images/email-template/order-success.png" alt="" style="margin-top: 30px;"></td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                                <h2 class="title">YOUR ORDER DETAILS</h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left">
                    <tbody>
                        <tr align="left">
                            <th>PRODUCT</th>
                            <th style="padding-left: 15px;">DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th>PRICE </th>
                        </tr>
                        <tr>
                            <td><img src="<?=base_url()?>/assets/images/email-template/4.png" alt="" width="130"></td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="margin-top: 15px;">Three seater Wood Style sofa for Leavingroom </h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top:15px;    margin-bottom: 0px;">Size : <span> L</span></h5>
                                <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$500</b></h5>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="<?=base_url()?>/assets/images/email-template/1.png" alt="" width="130"></td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="margin-top: 15px;">Three seater Wood Style sofa for Leavingroom </h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top:15px;    margin-bottom: 0px;">Size : <span> L</span></h5>
                                <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$500</b></h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Products:</td>
                            <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>$2600.00</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Discount :</td>
                            <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>$10</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="line-height: 49px;font-family: Arial;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Gift Wripping: </td>
                            <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>$2600</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">Shipping :</td>
                            <td class="price" colspan="3" style="                  line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>$30</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">TOTAL PAID :</td>
                            <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>$2600</b></td>
                        </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                                <h5 style="font-size: 16px; font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">DILIVERY ADDRESS</h5>
                                <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">268 Cambridge Lane New Albany,<br> IN 47150268 Cambridge Lane <br>New Albany, IN 47150</p>
                            </td>
                            <td class="user-info" width="57" height="25"><img src="<?=base_url()?>/assets/images/email-template/space.jpg" alt=" " height="25" width="57"></td>
                            <td class="user-info" style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                                <h5 style="font-size: 16px;font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">SHIPPING ADDRESS</h5>
                                <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">268 Cambridge Lane New Albany,<br> IN 47150268 Cambridge Lane <br>New Albany, IN 47150</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr>
            <td style="padding: 30px;">
                <div>
                    <h4 class="title" style="margin:0;text-align: center;">Follow us</h4>
                </div>
                <table class="footer-social-icon" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:20px;">
                    <tbody>
                        <tr>
                            <td><a href="#"><img src="<?=base_url()?>/assets/images/email-template/facebook.png" alt=""></a></td>
                            <td><a href="#"><img src="<?=base_url()?>/assets/images/email-template/youtube.png" alt=""></a></td>
                            <td><a href="#"><img src="<?=base_url()?>/assets/images/email-template/twitter.png" alt=""></a></td>
                            <td><a href="#"><img src="<?=base_url()?>/assets/images/email-template/gplus.png" alt=""></a></td>
                            <td><a href="#"><img src="<?=base_url()?>/assets/images/email-template/linkedin.png" alt=""></a></td>
                            <td><a href="#"><img src="<?=base_url()?>/assets/images/email-template/pinterest.png" alt=""></a></td>
                        </tr>
                    </tbody>
                </table>
                <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                    <tbody>
                        <tr>
                            <td><a href="#" style="font-size:13px">Want to change how you receive these emails?</a></td>
                        </tr>
                        <tr>
                            <td>
                                <p style="font-size:13px; margin:0;">2018 - 19 Copy Right by Themeforest powerd by Pixel Strap</p>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#" style="font-size:13px; margin:0;text-decoration: underline;">Unsubscribe</a></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

<?= $this->endSection() ?>