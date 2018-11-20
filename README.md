## Google Analytics local plugin for Moodle

### Description

This local plugin generates the JavaScript tracking code snippet for Google Analytics and places it in the <head> element for every page. Besides the pageview hit, it also generates the necessary calls to send custom dimensions and metrics. Programming is still required to get the values you wish to send for your dimensions and metrics, however this plugin provides a simple templated drop-in method to send those values.

Included are four custom dimension samples: user role, course (short) name, enrolment size category (coded sm, md, lg, etc.), and course category name, associated with custom dimension index slots 1, 2, 3, and 4, respectively. To gather other custom dimension values, edit the code in the custom_dimenion_n class to suit your needs. To add another custom dimension, change the plugin settings to indicate how many dimensions should be sent, and then provide the custom_dimension_n class to provide the value; do likewise with custom metrics. If you want to remove a dimension or metric, remove or rename the class file so the class loader does not detect it (likely will require purging all caches).

If you have no use for custom dimensions or metrics, then you do not need this plugin; instead, place the standard Google generated code snippet in the _Site Administration->Appearance->Additional HTML->Within HEAD_ setting.

### Privacy & GDPR

This plugin reports that it does not collect or store any personal information **because it, per se**, does not. It is the site operator's responsibility to inform their users, if it is necessary or appropriate to do so, that data is being sent to Google Analytics.

### Caching

The plugin creates a session cache, and an application cache so you can store often used but unchanging data when fetching custom dimension and metric values. Examples of this can be seen in _custom_dimenion_1_ (user role) and _custom_dimension_3_ (enrolment size). **Keep in mind, this plugin is called for every page request and has the potential to severely degrade site response time. Make every effort to be frugal with the $DB calls too.**

### Configuration

#### Property ID
Enter the Google property ID for this site.

#### API
The plugin can generate code to use either the older Universal Analytics (_analyticsjs_) API, or the newer Global Site Tag (_gtagjs_) API. While the plugin generates calls to send custom dimension and metric values for either API, at the time of this writing, the _gtagjs_ API does not appear to associate the values with the corresponding pageview hit. Unless you are familiar with setting up dimensions and metrics with Google Tag Manager, or have a need to use _gtagjs_, recommend to use the default Universal Analytics (_analyticsjs_).

#### Dimensions and metrics
Indicate the highest index number of each. This tells the plugin how many custom classes for which to look. If you no longer wish to send a particular dimension or metric which is ordinally lower than the Nth item, remove that custom class file.
