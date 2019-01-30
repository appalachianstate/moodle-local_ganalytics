## Google Analytics local plugin for Moodle

### Important! If you plan to use the custom dimension/metric feature...

**You should be more than just familiar with Google Analytics, its configuration, and reporting before you install this plugin. Neither this plugin nor its documentation will provide information or tutorials on using or configuring Google Analytics.**

**If you have no use for custom dimensions or metrics, then you do not need this plugin; instead, place the standard Google generated code snippet in the `Site Administration->Appearance->Additional HTML->Within HEAD` setting.**

### Description

This local plugin generates the JavaScript tracking code snippet for Google Analytics and places it in the `<head>` element for every page. Besides the pageview hit, it also generates the necessary calls to send custom dimensions and metrics. Programming is still required to get the values you wish to send for your dimensions and metrics, however this plugin provides a simple templated drop-in method to send those values.

Included are four custom dimension samples: user role, course (short) name, coded course enrollment size [xs (1-10), sm (11-20), md (21-35), lg (36-50), xl (51+) ], and course category name, associated with custom dimension index slots 1, 2, 3, and 4, respectively. To gather other custom dimension values, edit the code in the custom_dimension_n class to suit your needs. To add another custom dimension, change the plugin settings to indicate how many dimensions should be sent, and then provide the custom_dimension_n class to provide the value; do likewise with custom metrics. If you want to remove a dimension or metric, remove or rename the class file so the class loader does not detect it (likely will require purging all caches).

### Privacy & GDPR

This plugin reports it transmits a user's course role, the course name, course category name, and the coded course enrollment size---the custom dimension sample code as published---to an external service, Google Analytics. If the code is altered, it is the site operator's responsibility to update the Moodle Privacy API calls to reflect which user data is being sent. Sending personally identifiable user information to GA is prohibited by Google (see https://support.google.com/analytics/answer/2795983?hl=en).

### Caching

The plugin creates a session cache, and an application cache so you can store often used but unchanging data when fetching custom dimension and metric values. Examples of this can be seen in _custom_dimension_1_ (user role) and _custom_dimension_3_ (enrollment size). **Keep in mind, this plugin is called for every page request and has the potential to severely degrade site response time. Make every effort to be frugal with the $DB calls too.**

### Configuration

#### Property ID
Enter the Google property ID for this site.

#### API
The plugin can generate code to use either the older Universal Analytics (_analyticsjs_) API, or the newer Global Site Tag (_gtagjs_) API. While the plugin generates calls to send custom dimension and metric values for either API, at the time of this writing, the _gtagjs_ API does not appear to associate the values with the corresponding pageview hit. Unless you are familiar with setting up dimensions and metrics with Google Tag Manager, or have a need to use _gtagjs_, recommend to use the default Universal Analytics (_analyticsjs_).

#### Dimensions and metrics
Indicate the highest index number of each. This tells the plugin how many custom classes for which to look. If you no longer wish to send a particular dimension or metric which is not last in the list (i.e. ordinal lower than the Nth item), you can remove that custom class file so it is not detected by the auto-loader (cache purge required).
