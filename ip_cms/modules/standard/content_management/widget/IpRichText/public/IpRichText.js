/**
 * @package ImpressPages
 * @copyright Copyright (C) 2011 ImpressPages LTD.
 * @license see ip_license.html
 */

function IpWidget_IpRichText(widgetObject) {
    this.widgetObject = widgetObject;

    this.manageInit = manageInit;
    this.prepareData = prepareData;


    function manageInit() {
        var instanceData = this.widgetObject.data('ipWidget');
        this.widgetObject.find('textarea').tinymce(ipTinyMceConfigMax);
    }

    function prepareData() {

        var data = Object();

        data.text = this.widgetObject.find('textarea').html();
        $(this.widgetObject).trigger('preparedWidgetData.ipWidget', [ data ]);
    }

    

};

      

