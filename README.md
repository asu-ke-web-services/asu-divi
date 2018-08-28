# ASU Divi

A child theme of Divi, by Elegant Themes. Originally a fork from KED at ASU. (Last update from original was 1.0.14.)

## Description

A theme for use with Arizona State University websites. The Divi theme, by Elegant Themes, allows you to create websites without knowing any code. This child theme is customized to approximate the design patters found with the ASU Web Standards guidelines. This child theme includes the following assets.

- ASU Header and Footer, version 4.6
- Font Awesome Pro, version 5.2
- Google Font "Roboto", part of the ASU Web Standards.

## Requirements

The parent theme for ASU Divi is the excellent [Divi Theme from Elegant Themes](http://www.elegantthemes.com/gallery/divi/). If you intend to use the theme to build your own WordPress site, a separate license for the Divi Theme is necessary.

Please also note that this repository contains a child theme and not a stand-alone theme designed for use with [The Divi Builder](http://www.elegantthemes.com/plugins/divi-builder/) plugin also from Elegant Themes.

This child theme is also featured in a distributed WordPress installation within ASU's preferred web host Pantheon. To build a site using Pantheon and ASU Divi please contact the Marketing and Communications team within the Fulton Schools of Engineering.

![Sparky's Trident](https://brandguide.asu.edu/sites/default/files/styles/panopoly_image_original/public/asu_brandhq_images_master_pitchfork_0.png?itok=CdnAzLZW)

## Enhancements

### Version 2.0

The newest version of the ASU Divi theme makes some significant changes in the provided CSS with the intent to avoid scripting Divi module values as much as possible. Moving forward, we would prefer that "Divi be Divi" and that the child theme generally stays out of its way. Users of the theme are expected to know how to use the theme's options to deliver a result that aligns with the general principals of the ASU Brand Standard.

Eliminated CSS rules include:

- **Button Module:** The general settings for "light" and "dark" now default to the theme's settings. Use the detailed settings panel to style buttons appropriately.
- **Navigation:** Color choices now driven by the Divi customizer settings. Items in a drop down menu are no longer bold. Added additional styles for the `.mega-menu` feature of Divi.
- **Main Content:** Dotted underline enforced on all links within normal paragraphs.
- **Dotted underlines:** Added where appropriate and colored to match the expected background color of the area. Underlines will be maroon for the `#main-content` area and white for the `#footer-widget` area by default.
- **Utility Classes:** `.asu-sidebar-col` and `.directory-section` utility classes were added to the CSS. This eliminates the need to add these elements to the Custom CSS field in the Theme Options panel. (Or a similar location within the theme.)

This version of the ASU Divi theme also restores much of the disabled functionality of the widgetized footer area. Previous versions of the child theme used the customzizer to build the branding elements of the ASU Footer. This proved disruptive to the normal practice of adding widgets to the established widget areas in the footer. The customizer options also overrode attempts to use the Divi Footer layouts from the parent theme.

Instead, two widgets were built and distributed with the theme which allow for quick addition of ASU branding elements to the super footer.

- The **ASU Endorsed Logo Widget** displays the endorsed logo as well as the text, phone number and contact information for the site.
- The **ASU Social Media Icons Widget** displays the row of social media icons that traditionally falls below the information under the endorsed logo.

Other improvements include:

- Upgrading the Font Awesome library in use for the project to Font Awesome 5 to address accessibility concerns pertaining to icons within the site.

## Older Version Notes

### Version 1.1

- Addressed small bug concerning home page icon active state in the main navigation.
- Refactored child theme CSS to perform better with `.mega-menu` class.
- Fixed problem with included widgets in the branded area of the footer.