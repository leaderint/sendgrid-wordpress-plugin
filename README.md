# Sendgrid Wordpress Plugin
![SG Widget Logo](https://app.sgwidget.com/img/sg-widget-logo.png)

[SG Widget](https://sgwidget.com) is a **Sendgrid Wordpress Plugin** for collecting emails. Just add a shortcode to capture emails and store them in your Sendgrid Account. 

![widget example](7c500d20-6953-4a0b-a5f9-71e627afbc00)

SG Widget is the number 1 Sendgrid Subscription widget since 2018 and has been featured on the official [Sendgrid website](https://sendgrid.com/en-us/blog/building-a-sendgrid-subscription-widget).

## About
The widget is designed specifically for Sendgrid and integrates perfectly with Marketing Campaigns.

After entering their email address, users will receive a double opt in email to confirm their subscription. The email template can be customsed to match your brand and additional form fields can be added that allows more information to be collected.

Simple analytics are provided in SG Widget to track the number of subscribers so you can see which widget is performing best.

**Features:**

1. Designed For SendGrid Marketing Campaigns
2. Double Opt In
3. Customisable
4. Extra Form Fields
5. Welcome Emails
6. Consent Checkbox
7. Analytics
8. Compliant
9. Multilingual
10. Fast

## How It Works Overview:

* Register an [SG Widget](https://app.sgwidget.com/register) account and create a widget
* Enter the widget ID in the shortcode in a wordpress post


## Installation 
**Create an SG Widget account:**
1. Go to [SG Widget](https://app.sgwidget.com/register) and enter your email address
2. Login and connect your account to Sendgrid in the [my account area](https://app.sgwidget.com/my-account) ![connect sendgrid account](https://imagedelivery.net/k0P4EcPiouU_XzyGSmgmUw/91f4838d-a8f8-419d-253e-e5ed5d1ff100/public)
3. Create a widget and copy the ID from the URL ![widget ID](https://imagedelivery.net/k0P4EcPiouU_XzyGSmgmUw/700ebb3a-8a78-4990-ceab-958336b5f300/public)

**Adding the widget to your website:**
1. Go to /wp-admin/plugin-install.php in your wordpress admin panel and click Upload Plugin. ![install plugin](https://imagedelivery.net/k0P4EcPiouU_XzyGSmgmUw/f7aabdd2-d254-46d2-bcb9-e7869618f200/public)
2. Upload the \"SG Widget.zip\" from this repository and click install
3. Activate the plugin and open the plugin settings page and enter your SG Widget API Key ![activate plugin](https://imagedelivery.net/k0P4EcPiouU_XzyGSmgmUw/ab6fa4af-5c49-48c1-5f45-0c46858a9500/public)
4. Place \"[sg_widget id=\"123\"]\" in your template where ID is the ID of a widget from your SG Widget account 
```
[sg_widget id="215"]
```

## Privacy And Security:

SG Widget **does not** store personal data for subscribers that enter their email address.

## Frequently Asked Questions
Q: What PHP versions are supported?  
A: All versions from 5.6 upwards

Q: Will contacts from the widget be uploaded to new or Leagacy Marketing Campaigns?  
A: Contacts can be uploaded to either. It will be determined by the settings of the widget in your Sendgrid account

Q: Can the emails be customised?  
A: Yes. The double opt in and welcome emails can be fully customised and can even use templates from your Sendgrid account

Q: How is the widget added to a page?  
A: After installing the plugin, just add a shortcode to a page where you want a widget to show [sg_widget id=\"123\"]

Q: Can I disable Double opt in?  
A: Yes. Widgets can be single opt in or double opt in


## Changelog
= 1.0 =
* Initial release.